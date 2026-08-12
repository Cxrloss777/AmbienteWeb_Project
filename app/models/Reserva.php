<?php
require_once '../app/config/database.php';

class Reserva {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT reservas.*,
                         residentes.nombre AS residente_nombre,
                         residentes.correo AS residente_correo,
                         viviendas.identificador AS vivienda_identificador,
                         areas_comunes.nombre AS area_nombre
                  FROM reservas
                  JOIN residentes ON reservas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  JOIN areas_comunes ON reservas.area_id = areas_comunes.id
                  ORDER BY reservas.fecha DESC, reservas.hora_inicio DESC";

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUpcoming() {
        $query = "SELECT reservas.*,
                         residentes.nombre AS residente_nombre,
                         viviendas.identificador AS vivienda_identificador,
                         areas_comunes.nombre AS area_nombre
                  FROM reservas
                  JOIN residentes ON reservas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  JOIN areas_comunes ON reservas.area_id = areas_comunes.id
                  WHERE reservas.fecha >= CURDATE()
                    AND reservas.estado = 'Confirmada'
                  ORDER BY reservas.fecha ASC, reservas.hora_inicio ASC";

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAreasDisponibles() {
        $query = "SELECT * FROM areas_comunes
                  WHERE estado = 'Disponible'
                  ORDER BY nombre ASC";

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAreaById($id) {
        $query = "SELECT * FROM areas_comunes WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function isAvailable($areaId, $fecha, $horaInicio, $horaFin) {
        $query = "SELECT id
                  FROM reservas
                  WHERE area_id = ?
                    AND fecha = ?
                    AND estado = 'Confirmada'
                    AND ? < hora_fin
                    AND ? > hora_inicio
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isss", $areaId, $fecha, $horaInicio, $horaFin);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows === 0;
    }

    public function create($data) {
        $query = "INSERT INTO reservas
                  (residente_id, area_id, fecha, hora_inicio, hora_fin, personas, comentarios, estado)
                  VALUES (?, ?, ?, ?, ?, ?, ?, 'Confirmada')";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "iisssis",
            $data['residente_id'],
            $data['area_id'],
            $data['fecha'],
            $data['hora_inicio'],
            $data['hora_fin'],
            $data['personas'],
            $data['comentarios']
        );

        return $stmt->execute();
    }

    public function countThisMonth() {
        $query = "SELECT COUNT(*) AS total FROM reservas
                  WHERE estado = 'Confirmada'
                    AND YEAR(fecha) = YEAR(CURDATE())
                    AND MONTH(fecha) = MONTH(CURDATE())";
        $result = $this->db->query($query);
        return (int) $result->fetch_assoc()['total'];
    }

    public function countAreas() {
        $query = "SELECT COUNT(*) AS total FROM areas_comunes";
        $result = $this->db->query($query);
        return (int) $result->fetch_assoc()['total'];
    }

    public function cancel($id) {
        $query = "UPDATE reservas SET estado = 'Cancelada' WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
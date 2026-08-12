<?php
require_once '../app/config/database.php';

class Visitante {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getActivos() {
        $query = "SELECT visitantes.*, viviendas.identificador AS apartamento
                  FROM visitantes
                  INNER JOIN viviendas ON visitantes.vivienda_id = viviendas.id
                  WHERE visitantes.estado = 'Dentro'
                  ORDER BY visitantes.id DESC";

        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAll() {
        $query = "SELECT visitantes.*, viviendas.identificador AS apartamento
                  FROM visitantes
                  INNER JOIN viviendas ON visitantes.vivienda_id = viviendas.id
                  ORDER BY visitantes.id DESC";

        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT visitantes.*, viviendas.identificador AS apartamento
                  FROM visitantes
                  INNER JOIN viviendas ON visitantes.vivienda_id = viviendas.id
                  WHERE visitantes.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO visitantes
                  (nombre, cedula, visitado, vivienda_id, fecha, hora, placa, cantidad, motivo, observaciones)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);

        $stmt->bind_param(
            "sssisssiss",
            $data['nombre'],
            $data['cedula'],
            $data['visitado'],
            $data['vivienda_id'],
            $data['fecha'],
            $data['hora'],
            $data['placa'],
            $data['cantidad'],
            $data['motivo'],
            $data['observaciones']
        );

        return $stmt->execute();
    }

    public function registrarSalida($id) {
        $query = "UPDATE visitantes
                  SET hora_salida = CURTIME(), estado = 'Finalizada'
                  WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
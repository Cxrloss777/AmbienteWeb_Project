<?php
require_once '../app/config/database.php';

class Residente {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT residentes.*, viviendas.identificador AS vivienda_identificador
                   FROM residentes
                   JOIN viviendas ON residentes.vivienda_id = viviendas.id
                   ORDER BY residentes.id DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT residentes.*, viviendas.identificador AS vivienda_identificador
                   FROM residentes
                   JOIN viviendas ON residentes.vivienda_id = viviendas.id
                   WHERE residentes.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO residentes (nombre, cedula, vivienda_id, tipo_residente, telefono, correo, fecha_ingreso, estado, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "ssissssss",
            $data['nombre'],
            $data['cedula'],
            $data['vivienda_id'],
            $data['tipo_residente'],
            $data['telefono'],
            $data['correo'],
            $data['fecha_ingreso'],
            $data['estado'],
            $data['observaciones']
        );
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE residentes SET nombre = ?, cedula = ?, vivienda_id = ?, tipo_residente = ?, telefono = ?, correo = ?, fecha_ingreso = ?, estado = ?, observaciones = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "ssissssssi",
            $data['nombre'],
            $data['cedula'],
            $data['vivienda_id'],
            $data['tipo_residente'],
            $data['telefono'],
            $data['correo'],
            $data['fecha_ingreso'],
            $data['estado'],
            $data['observaciones'],
            $id
        );
        return $stmt->execute();
    }

    public function countByEstado($estado) {
    $query = "SELECT COUNT(*) as total FROM residentes WHERE estado = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("s", $estado);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['total'];
}

    public function delete($id) {
        $query = "DELETE FROM residentes WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

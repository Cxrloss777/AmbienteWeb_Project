<?php
require_once '../app/config/database.php';

class Vivienda {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM viviendas ORDER BY id DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM viviendas WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function countByEstado($estado) {
        $query = "SELECT COUNT(*) as total FROM viviendas WHERE estado = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $estado);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }

    public function create($data) {
        $query = "INSERT INTO viviendas (identificador, tipo, propietario, area, num_habitantes, estado, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "sssdiss",
            $data['identificador'],
            $data['tipo'],
            $data['propietario'],
            $data['area'],
            $data['num_habitantes'],
            $data['estado'],
            $data['observaciones']
        );
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE viviendas SET identificador = ?, tipo = ?, propietario = ?, area = ?, num_habitantes = ?, estado = ?, observaciones = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "sssdissi",
            $data['identificador'],
            $data['tipo'],
            $data['propietario'],
            $data['area'],
            $data['num_habitantes'],
            $data['estado'],
            $data['observaciones'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM viviendas WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

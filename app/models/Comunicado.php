<?php
require_once '../app/config/database.php';

class Comunicado {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM comunicados ORDER BY id DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM comunicados WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO comunicados (titulo, contenido, prioridad, fecha, autor, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "ssssss",
            $data['titulo'],
            $data['contenido'],
            $data['prioridad'],
            $data['fecha'],
            $data['autor'],
            $data['estado']
        );
        return $stmt->execute();
    }
}
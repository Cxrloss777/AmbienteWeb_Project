<?php
require_once '../app/config/database.php';

class Mantenimiento {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM mantenimiento ORDER BY id DESC";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM mantenimiento WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO mantenimiento
                  (residente, categoria, prioridad, descripcion, ubicacion, fecha, estado)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);

        $stmt->bind_param(
            "sssssss",
            $data['residente'],
            $data['categoria'],
            $data['prioridad'],
            $data['descripcion'],
            $data['ubicacion'],
            $data['fecha'],
            $data['estado']
        );

        return $stmt->execute();
    }

    public function updateEstado($id, $estado) {
        $query = "UPDATE mantenimiento SET estado = ? WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $estado, $id);

        return $stmt->execute();
    }
}
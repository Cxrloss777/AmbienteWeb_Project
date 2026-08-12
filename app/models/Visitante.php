<?php
require_once '../app/config/database.php';

class Visitante {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getActivos() {
        $query = "SELECT * FROM visitantes
                  WHERE estado = 'Dentro'
                  ORDER BY id DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAll() {
        $query = "SELECT * FROM visitantes
                  ORDER BY id DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM visitantes WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO visitantes (nombre, cedula, visitado, apartamento, fecha, hora, placa, cantidad, motivo, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            "sssssssiss",
            $data['nombre'],
            $data['cedula'],
            $data['visitado'],
            $data['apartamento'],
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
        $query = "UPDATE visitantes SET hora_salida = CURTIME(), estado = 'Finalizada' WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
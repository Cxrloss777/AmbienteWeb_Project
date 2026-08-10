<?php
require_once '../app/config/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByCorreo($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getById($id) {
        $query = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function guardarTokenReset($correo, $token, $expira) {
        $query = "UPDATE usuarios SET reset_token = ?, reset_token_expira = ? WHERE correo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $token, $expira, $correo);
        return $stmt->execute();
    }

    public function getByResetToken($token) {
        $query = "SELECT * FROM usuarios WHERE reset_token = ? AND reset_token_expira > NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarContrasenaPorToken($token, $hashNuevo) {
        $query = "UPDATE usuarios SET contrasena = ?, reset_token = NULL, reset_token_expira = NULL WHERE reset_token = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $hashNuevo, $token);
        return $stmt->execute();
    }
}
<?php
require_once '../app/core/Controller.php';

class PerfilController extends Controller {
    private $usuarioModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->usuarioModel = $this->model('Usuario');
    }

    public function index() {
        $usuario = $this->usuarioModel->getById($_SESSION['user_id']);
        $this->view('pages/profile-v1', ['usuario' => $usuario]);
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';

            if (!empty($nombre) && !empty($correo)) {
                $this->usuarioModel->actualizarPerfil($_SESSION['user_id'], $nombre, $correo);
                $_SESSION['user_name'] = $nombre;
                $_SESSION['flash_success'] = 'Perfil actualizado correctamente';
            } else {
                $_SESSION['flash_error'] = 'Nombre y correo son obligatorios';
            }
        }

        $this->redirect('/perfil/index');
    }

    public function actualizarContrasena() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $actual = $_POST['contrasena_actual'] ?? '';
            $nueva = $_POST['nueva_contrasena'] ?? '';
            $confirmar = $_POST['confirmar_contrasena'] ?? '';

            $usuario = $this->usuarioModel->getById($_SESSION['user_id']);

            if (!password_verify($actual, $usuario['contrasena'])) {
                $_SESSION['flash_error'] = 'La contraseña actual es incorrecta';
            } elseif (strlen($nueva) < 6) {
                $_SESSION['flash_error'] = 'La nueva contraseña debe tener al menos 6 caracteres';
            } elseif ($nueva !== $confirmar) {
                $_SESSION['flash_error'] = 'Las contraseñas no coinciden';
            } else {
                $hash = password_hash($nueva, PASSWORD_DEFAULT);
                $this->usuarioModel->actualizarContrasena($_SESSION['user_id'], $hash);
                $_SESSION['flash_success'] = 'Contraseña actualizada correctamente';
            }
        }

        $this->redirect('/perfil/index');
    }
}
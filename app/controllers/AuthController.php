<?php
require_once '../app/core/Controller.php';

class AuthController extends Controller {
    public function __construct() {
        session_start();
    }

    public function index() {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/dashboard/index');
        }
        $this->view('pages/login-v1');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $usuarioModel = $this->model('Usuario');
            $usuario = $usuarioModel->getByCorreo($correo);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['nombre'];
                $this->redirect('/dashboard/index');
            } else {
                $this->view('pages/login-v1', ['error' => 'Correo o contraseña incorrectos']);
            }
        } else {
            $this->redirect('/auth/index');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/auth/index');
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'] ?? '';
            $usuarioModel = $this->model('Usuario');
            $usuario = $usuarioModel->getByCorreo($correo);

            if ($usuario) {
                $token = bin2hex(random_bytes(32));
                $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));
                $usuarioModel->guardarTokenReset($correo, $token, $expira);

                $enlace = BASE_URL . '/auth/resetPassword/' . $token;
                $this->view('pages/forgot-password-v1', ['enlace' => $enlace]);
            } else {
                $this->view('pages/forgot-password-v1', ['error' => 'No existe una cuenta con ese correo']);
            }
        } else {
            $this->view('pages/forgot-password-v1');
        }
    }

    public function resetPassword($token = null) {
        if (!$token) {
            $this->redirect('/auth/index');
        }

        $usuarioModel = $this->model('Usuario');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nuevaContrasena = $_POST['contrasena'] ?? '';
            $confirmar = $_POST['confirmar_contrasena'] ?? '';

            $usuario = $usuarioModel->getByResetToken($token);

            if (!$usuario) {
                $this->view('pages/forgot-password-v1', ['error' => 'El enlace de recuperación es inválido o expiró']);
                return;
            }

            if (strlen($nuevaContrasena) < 6) {
                $this->view('pages/reset-password-v1', ['token' => $token, 'error' => 'La contraseña debe tener al menos 6 caracteres']);
                return;
            }

            if ($nuevaContrasena !== $confirmar) {
                $this->view('pages/reset-password-v1', ['token' => $token, 'error' => 'Las contraseñas no coinciden']);
                return;
            }

            $hash = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
            $usuarioModel->actualizarContrasenaPorToken($token, $hash);

            $_SESSION['flash_success'] = 'Contraseña actualizada correctamente, ya puedes iniciar sesión';
            $this->redirect('/auth/index');
        } else {
            $usuario = $usuarioModel->getByResetToken($token);
            if (!$usuario) {
                $this->view('pages/forgot-password-v1', ['error' => 'El enlace de recuperación es inválido o expiró']);
                return;
            }
            $this->view('pages/reset-password-v1', ['token' => $token]);
        }
    }
}
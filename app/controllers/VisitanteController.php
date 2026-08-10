<?php
require_once '../app/core/Controller.php';

class VisitanteController extends Controller {
    private $visitanteModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }
        $this->visitanteModel = $this->model('Visitante');
    }

    public function index() {
        $visitantes = $this->visitanteModel->getActivos();
        $this->view('visitantes/index', ['visitantes' => $visitantes]);
    }

    public function historial() {
        $visitantes = $this->visitanteModel->getAll();
        $this->view('visitantes/historial', ['visitantes' => $visitantes]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'cedula' => $_POST['cedula'] ?? '',
                'visitado' => $_POST['visitado'] ?? '',
                'apartamento' => $_POST['apartamento'] ?? '',
                'fecha' => $_POST['fecha'] ?? '',
                'hora' => $_POST['hora'] ?? '',
                'placa' => $_POST['placa'] ?? '',
                'cantidad' => $_POST['cantidad'] ?? 1,
                'motivo' => $_POST['motivo'] ?? '',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (!empty($data['nombre']) && !empty($data['cedula']) && !empty($data['apartamento'])) {
                $this->visitanteModel->create($data);
                $this->redirect('/visitante/index');
            } else {
                $this->view('visitantes/create', ['error' => 'Nombre, cédula y apartamento son obligatorios']);
            }
        } else {
            $this->view('visitantes/create');
        }
    }

    public function salida($id = null) {
        if ($id) {
            $this->visitanteModel->registrarSalida($id);
        }
        $this->redirect('/visitante/index');
    }
}

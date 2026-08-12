<?php
require_once '../app/core/Controller.php';

class VisitanteController extends Controller {
    private $visitanteModel;
    private $viviendaModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->visitanteModel = $this->model('Visitante');
        $this->viviendaModel = $this->model('Vivienda');
    }

    public function index() {
        $visitantes = $this->visitanteModel->getActivos();

        $this->view('visitantes/index', [
            'visitantes' => $visitantes
        ]);
    }

    public function create() {
        $viviendas = $this->viviendaModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'cedula' => $_POST['cedula'] ?? '',
                'visitado' => $_POST['visitado'] ?? '',
                'vivienda_id' => $_POST['vivienda_id'] ?? '',
                'fecha' => $_POST['fecha'] ?? '',
                'hora' => $_POST['hora'] ?? '',
                'placa' => $_POST['placa'] ?? '',
                'cantidad' => $_POST['cantidad'] ?? 1,
                'motivo' => $_POST['motivo'] ?? '',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (
                !empty($data['nombre']) &&
                !empty($data['cedula']) &&
                !empty($data['visitado']) &&
                !empty($data['vivienda_id']) &&
                !empty($data['fecha']) &&
                !empty($data['hora'])
            ) {
                $this->visitanteModel->create($data);
                $this->redirect('/visitante/index');
            } else {
                $this->view('visitantes/create', [
                    'error' => 'Nombre, cédula, persona visitada, vivienda, fecha y hora son obligatorios',
                    'viviendas' => $viviendas
                ]);
            }

        } else {

            $this->view('visitantes/create', [
                'viviendas' => $viviendas
            ]);
        }
    }

    public function historial() {
        $visitantes = $this->visitanteModel->getAll();

        $this->view('visitantes/historial', [
            'visitantes' => $visitantes
        ]);
    }

    public function salida($id = null) {
        if ($id) {
            $this->visitanteModel->registrarSalida($id);
        }

        $this->redirect('/visitante/index');
    }
}
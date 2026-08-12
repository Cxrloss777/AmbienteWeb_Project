<?php
require_once '../app/core/Controller.php';

class MantenimientoController extends Controller {
    private $mantenimientoModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->mantenimientoModel = $this->model('Mantenimiento');
    }

    public function index() {
        $mantenimientos = $this->mantenimientoModel->getAll();

        $this->view('mantenimiento/index', [
            'mantenimientos' => $mantenimientos
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'residente' => $_POST['residente'] ?? '',
                'categoria' => $_POST['categoria'] ?? '',
                'prioridad' => $_POST['prioridad'] ?? 'Media',
                'descripcion' => $_POST['descripcion'] ?? '',
                'ubicacion' => $_POST['ubicacion'] ?? '',
                'fecha' => $_POST['fecha'] ?? '',
                'estado' => $_POST['estado'] ?? 'Pendiente'
            ];

            if (
                !empty($data['residente']) &&
                !empty($data['categoria']) &&
                !empty($data['descripcion']) &&
                !empty($data['fecha'])
            ) {
                $this->mantenimientoModel->create($data);

                $_SESSION['flash_success'] = 'Solicitud de mantenimiento registrada correctamente';

                $this->redirect('/mantenimiento/index');
            } else {
                $this->view('mantenimiento/create', [
                    'error' => 'Residente, categoría, descripción y fecha son obligatorios'
                ]);
            }

        } else {
            $this->view('mantenimiento/create');
        }
    }

    public function seguimiento($id = null) {
        if (!$id) {
            $this->redirect('/mantenimiento/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $estado = $_POST['estado'] ?? 'Pendiente';

            $this->mantenimientoModel->updateEstado($id, $estado);

            $_SESSION['flash_success'] = 'Estado actualizado correctamente';

            $this->redirect('/mantenimiento/index');

        } else {

            $mantenimiento = $this->mantenimientoModel->getById($id);

            if ($mantenimiento) {
                $this->view('mantenimiento/seguimiento', [
                    'mantenimiento' => $mantenimiento
                ]);
            } else {
                $this->redirect('/mantenimiento/index');
            }
        }
    }
}
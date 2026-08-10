<?php
require_once '../app/core/Controller.php';

class ViviendaController extends Controller {
    private $viviendaModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }
        $this->viviendaModel = $this->model('Vivienda');
    }

    public function index() {
        $viviendas = $this->viviendaModel->getAll();
        $stats = [
            'total' => count($viviendas),
            'ocupadas' => $this->viviendaModel->countByEstado('Ocupada'),
            'disponibles' => $this->viviendaModel->countByEstado('Disponible')
        ];
        $this->view('viviendas/index', ['viviendas' => $viviendas, 'stats' => $stats]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'identificador' => $_POST['identificador'] ?? '',
                'tipo' => $_POST['tipo'] ?? '',
                'propietario' => $_POST['propietario'] ?? '',
                'area' => $_POST['area'] ?? 0,
                'num_habitantes' => $_POST['num_habitantes'] ?? 0,
                'estado' => $_POST['estado'] ?? 'Disponible',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (!empty($data['identificador']) && !empty($data['tipo']) && $data['area'] !== '') {
                $this->viviendaModel->create($data);
                $this->redirect('/vivienda/index');
            } else {
                $this->view('viviendas/create', ['error' => 'Identificador, tipo y área son obligatorios']);
            }
        } else {
            $this->view('viviendas/create');
        }
    }

    public function show($id = null) {
        if (!$id) {
            $this->redirect('/vivienda/index');
        }
        $vivienda = $this->viviendaModel->getById($id);
        if ($vivienda) {
            $this->view('viviendas/show', ['vivienda' => $vivienda]);
        } else {
            $this->redirect('/vivienda/index');
        }
    }

    public function edit($id = null) {
        if (!$id) {
            $this->redirect('/vivienda/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'identificador' => $_POST['identificador'] ?? '',
                'tipo' => $_POST['tipo'] ?? '',
                'propietario' => $_POST['propietario'] ?? '',
                'area' => $_POST['area'] ?? 0,
                'num_habitantes' => $_POST['num_habitantes'] ?? 0,
                'estado' => $_POST['estado'] ?? 'Disponible',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (!empty($data['identificador']) && !empty($data['tipo']) && $data['area'] !== '') {
                $this->viviendaModel->update($id, $data);
                $this->redirect('/vivienda/show/' . $id);
            } else {
                $vivienda = $this->viviendaModel->getById($id);
                $this->view('viviendas/edit', [
                    'vivienda' => $vivienda,
                    'error' => 'Identificador, tipo y área son obligatorios'
                ]);
            }
        } else {
            $vivienda = $this->viviendaModel->getById($id);
            if ($vivienda) {
                $this->view('viviendas/edit', ['vivienda' => $vivienda]);
            } else {
                $this->redirect('/vivienda/index');
            }
        }
    }

    public function delete($id = null) {
        if ($id) {
            $this->viviendaModel->delete($id);
        }
        $this->redirect('/vivienda/index');
    }
}

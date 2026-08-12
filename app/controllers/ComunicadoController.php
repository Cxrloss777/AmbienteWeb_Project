<?php
require_once '../app/core/Controller.php';

class ComunicadoController extends Controller {
    private $comunicadoModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->comunicadoModel = $this->model('Comunicado');
    }

    public function index() {
        $comunicados = $this->comunicadoModel->getAll();

        $this->view('comunicados/index', [
            'comunicados' => $comunicados
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'titulo' => $_POST['titulo'] ?? '',
                'contenido' => $_POST['contenido'] ?? '',
                'prioridad' => $_POST['prioridad'] ?? 'Media',
                'fecha' => $_POST['fecha'] ?? '',
                'autor' => $_POST['autor'] ?? 'Administrador',
                'estado' => $_POST['estado'] ?? 'Publicado'
            ];

            if (
                !empty($data['titulo']) &&
                !empty($data['contenido']) &&
                !empty($data['fecha'])
            ) {
                $this->comunicadoModel->create($data);
                $_SESSION['flash_success'] = 'Comunicado registrado correctamente';
                $this->redirect('/comunicado/index');
            } else {
                $this->view('comunicados/create', [
                    'error' => 'Título, contenido y fecha son obligatorios'
                ]);
            }

        } else {
            $this->view('comunicados/create');
        }
    }

    public function show($id = null) {
        if (!$id) {
            $this->redirect('/comunicado/index');
        }

        $comunicado = $this->comunicadoModel->getById($id);

        if ($comunicado) {
            $this->view('comunicados/show', [
                'comunicado' => $comunicado
            ]);
        } else {
            $this->redirect('/comunicado/index');
        }
    }
}
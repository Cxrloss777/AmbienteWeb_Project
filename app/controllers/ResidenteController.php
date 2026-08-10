<?php
require_once '../app/core/Controller.php';

class ResidenteController extends Controller {
    private $residenteModel;
    private $viviendaModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }
        $this->residenteModel = $this->model('Residente');
        $this->viviendaModel = $this->model('Vivienda');
    }

    public function index() {
        $residentes = $this->residenteModel->getAll();
        $this->view('residentes/index', ['residentes' => $residentes]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'cedula' => $_POST['cedula'] ?? '',
                'vivienda_id' => $_POST['vivienda_id'] ?? '',
                'tipo_residente' => $_POST['tipo_residente'] ?? '',
                'telefono' => $_POST['telefono'] ?? '',
                'correo' => $_POST['correo'] ?? '',
                'fecha_ingreso' => $_POST['fecha_ingreso'] ?? '',
                'estado' => $_POST['estado'] ?? 'Activo',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (!empty($data['nombre']) && !empty($data['cedula']) && !empty($data['vivienda_id'])) {
                try {
                    $this->residenteModel->create($data);
                    $_SESSION['flash_success'] = 'Residente registrado correctamente';
                    $this->redirect('/residente/index');
                } catch (mysqli_sql_exception $e) {
                    $viviendas = $this->viviendaModel->getAll();
                    $mensaje = str_contains($e->getMessage(), 'cedula')
                        ? 'Ya existe un residente registrado con esa cédula'
                        : 'Ocurrió un error al guardar el residente';
                    $this->view('residentes/create', [
                        'viviendas' => $viviendas,
                        'error' => $mensaje
                    ]);
                }
            } else {
                $viviendas = $this->viviendaModel->getAll();
                $this->view('residentes/create', [
                    'viviendas' => $viviendas,
                    'error' => 'Nombre, cédula y vivienda son obligatorios'
                ]);
            }
        } else {
            $viviendas = $this->viviendaModel->getAll();
            $this->view('residentes/create', ['viviendas' => $viviendas]);
        }
    }

    public function show($id = null) {
        if (!$id) {
            $this->redirect('/residente/index');
        }
        $residente = $this->residenteModel->getById($id);
        if ($residente) {
            $this->view('residentes/show', ['residente' => $residente]);
        } else {
            $this->redirect('/residente/index');
        }
    }

    public function edit($id = null) {
        if (!$id) {
            $this->redirect('/residente/index');
        }

        $viviendas = $this->viviendaModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'] ?? '',
                'cedula' => $_POST['cedula'] ?? '',
                'vivienda_id' => $_POST['vivienda_id'] ?? '',
                'tipo_residente' => $_POST['tipo_residente'] ?? '',
                'telefono' => $_POST['telefono'] ?? '',
                'correo' => $_POST['correo'] ?? '',
                'fecha_ingreso' => $_POST['fecha_ingreso'] ?? '',
                'estado' => $_POST['estado'] ?? 'Activo',
                'observaciones' => $_POST['observaciones'] ?? ''
            ];

            if (!empty($data['nombre']) && !empty($data['cedula']) && !empty($data['vivienda_id'])) {
                try {
                    $this->residenteModel->update($id, $data);
                    $_SESSION['flash_success'] = 'Residente actualizado correctamente';
                    $this->redirect('/residente/show/' . $id);
                } catch (mysqli_sql_exception $e) {
                    $mensaje = str_contains($e->getMessage(), 'cedula')
                        ? 'Ya existe un residente registrado con esa cédula'
                        : 'Ocurrió un error al guardar el residente';
                    $residente = $data;
                    $residente['id'] = $id;
                    $this->view('residentes/edit', [
                        'residente' => $residente,
                        'viviendas' => $viviendas,
                        'error' => $mensaje
                    ]);
                }
            } else {
                $residente = $this->residenteModel->getById($id);
                $this->view('residentes/edit', [
                    'residente' => $residente,
                    'viviendas' => $viviendas,
                    'error' => 'Nombre, cédula y vivienda son obligatorios'
                ]);
            }
        } else {
            $residente = $this->residenteModel->getById($id);
            if ($residente) {
                $this->view('residentes/edit', ['residente' => $residente, 'viviendas' => $viviendas]);
            } else {
                $this->redirect('/residente/index');
            }
        }
    }

    public function delete($id = null) {
        if ($id) {
            $this->residenteModel->delete($id);
            $_SESSION['flash_success'] = 'Residente eliminado correctamente';
        }
        $this->redirect('/residente/index');
    }
}
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

    private function sincronizarEstadoVivienda($viviendaId) {
        $vivienda = $this->viviendaModel->getById($viviendaId);
        if (!$vivienda) {
            return;
        }
        $totalResidentes = $this->residenteModel->countByVivienda($viviendaId);
        $nuevoEstado = $totalResidentes > 0 ? 'Ocupada' : 'Disponible';
        if ($vivienda['estado'] !== $nuevoEstado) {
            $this->viviendaModel->updateEstado($viviendaId, $nuevoEstado);
        }
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
                $vivienda = $this->viviendaModel->getById($data['vivienda_id']);
                $totalResidentes = $vivienda ? $this->residenteModel->countByVivienda($data['vivienda_id']) : 0;

                if (!$vivienda) {
                    $viviendas = $this->viviendaModel->getAll();
                    $this->view('residentes/create', [
                        'viviendas' => $viviendas,
                        'error' => 'La vivienda seleccionada no existe',
                        'residente' => $data
                    ]);
                    return;
                }

                if ($totalResidentes >= (int) $vivienda['num_habitantes']) {
                    $viviendas = $this->viviendaModel->getAll();
                    $this->view('residentes/create', [
                        'viviendas' => $viviendas,
                        'error' => 'Esta vivienda ya alcanzó su capacidad máxima de habitantes (' . $vivienda['num_habitantes'] . ')',
                        'residente' => $data
                    ]);
                    return;
                }

                try {
                    $this->residenteModel->create($data);
                    $this->sincronizarEstadoVivienda($data['vivienda_id']);
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
        $residenteActual = $this->residenteModel->getById($id);
        $viviendaAnteriorId = $residenteActual['vivienda_id'] ?? null;

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

            $cambioVivienda = $viviendaAnteriorId && $data['vivienda_id'] != $viviendaAnteriorId;

            if (!empty($data['nombre']) && !empty($data['cedula']) && !empty($data['vivienda_id'])) {
                if ($cambioVivienda) {
                    $viviendaNueva = $this->viviendaModel->getById($data['vivienda_id']);
                    $totalResidentes = $viviendaNueva ? $this->residenteModel->countByVivienda($data['vivienda_id']) : 0;

                    if (!$viviendaNueva) {
                        $residente = $data;
                        $residente['id'] = $id;
                        $this->view('residentes/edit', [
                            'residente' => $residente,
                            'viviendas' => $viviendas,
                            'error' => 'La vivienda seleccionada no existe'
                        ]);
                        return;
                    }

                    if ($totalResidentes >= (int) $viviendaNueva['num_habitantes']) {
                        $residente = $data;
                        $residente['id'] = $id;
                        $this->view('residentes/edit', [
                            'residente' => $residente,
                            'viviendas' => $viviendas,
                            'error' => 'Esta vivienda ya alcanzó su capacidad máxima de habitantes (' . $viviendaNueva['num_habitantes'] . ')'
                        ]);
                        return;
                    }
                }

                try {
                    $this->residenteModel->update($id, $data);
                    if ($cambioVivienda) {
                        $this->sincronizarEstadoVivienda($viviendaAnteriorId);
                    }
                    $this->sincronizarEstadoVivienda($data['vivienda_id']);
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
            $residente = $this->residenteModel->getById($id);
            $this->residenteModel->delete($id);
            if ($residente) {
                $this->sincronizarEstadoVivienda($residente['vivienda_id']);
            }
            $_SESSION['flash_success'] = 'Residente eliminado correctamente';
        }
        $this->redirect('/residente/index');
    }
}
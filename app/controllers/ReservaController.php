<?php
require_once '../app/core/Controller.php';

class ReservaController extends Controller {
    private $reservaModel;
    private $residenteModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->reservaModel = $this->model('Reserva');
        $this->residenteModel = $this->model('Residente');
    }

    public function index() {
        $reservas = $this->reservaModel->getAll();
        $areas = $this->reservaModel->getAreasDisponibles();

        $this->view('reservas/index', [
            'reservas' => $reservas,
            'areas' => $areas
        ]);
    }

    public function create() {
        $residentes = $this->residenteModel->getAll();
        $areas = $this->reservaModel->getAreasDisponibles();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'residente_id' => $_POST['residente_id'] ?? '',
                'area_id' => $_POST['area_id'] ?? '',
                'fecha' => $_POST['fecha'] ?? '',
                'personas' => $_POST['personas'] ?? '',
                'hora_inicio' => $_POST['hora_inicio'] ?? '',
                'hora_fin' => $_POST['hora_fin'] ?? '',
                'comentarios' => trim($_POST['comentarios'] ?? '')
            ];

            if (
                empty($data['residente_id']) ||
                empty($data['area_id']) ||
                empty($data['fecha']) ||
                empty($data['personas']) ||
                empty($data['hora_inicio']) ||
                empty($data['hora_fin'])
            ) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'Debe completar todos los campos obligatorios.',
                    'formData' => $data
                ]);
                return;
            }

            if ($data['fecha'] < date('Y-m-d')) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'La fecha de la reserva no puede ser anterior a hoy.',
                    'formData' => $data
                ]);
                return;
            }

            if ($data['hora_fin'] <= $data['hora_inicio']) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'La hora de finalización debe ser posterior a la hora de inicio.',
                    'formData' => $data
                ]);
                return;
            }

            if ((int)$data['personas'] <= 0) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'El número de personas debe ser mayor que cero.',
                    'formData' => $data
                ]);
                return;
            }

            $area = $this->reservaModel->getAreaById($data['area_id']);

            if (!$area || $area['estado'] !== 'Disponible') {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'El área seleccionada no está disponible.',
                    'formData' => $data
                ]);
                return;
            }

            if ((int)$data['personas'] > (int)$area['capacidad']) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'La cantidad de personas supera la capacidad del área seleccionada (' . $area['capacidad'] . ' personas).',
                    'formData' => $data
                ]);
                return;
            }

            $disponible = $this->reservaModel->isAvailable(
                $data['area_id'],
                $data['fecha'],
                $data['hora_inicio'],
                $data['hora_fin']
            );

            if (!$disponible) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'El área ya se encuentra reservada durante ese horario. Seleccione otro horario o fecha.',
                    'formData' => $data
                ]);
                return;
            }

            try {
                $this->reservaModel->create($data);
                $_SESSION['flash_success'] = 'Reserva confirmada correctamente. Se generó la notificación para el residente.';
                $this->redirect('/reserva/index');
            } catch (mysqli_sql_exception $e) {
                $this->view('reservas/create', [
                    'residentes' => $residentes,
                    'areas' => $areas,
                    'error' => 'Ocurrió un error al guardar la reserva.',
                    'formData' => $data
                ]);
            }
        } else {
            $this->view('reservas/create', [
                'residentes' => $residentes,
                'areas' => $areas
            ]);
        }
    }

    public function calendario() {
        $reservas = $this->reservaModel->getUpcoming();
        $this->view('reservas/calendario', ['reservas' => $reservas]);
    }

    public function cancel($id = null) {
        if ($id) {
            $this->reservaModel->cancel($id);
            $_SESSION['flash_success'] = 'La reserva fue cancelada. El horario vuelve a estar disponible.';
        }

        $this->redirect('/reserva/index');
    }
}

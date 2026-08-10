<?php
require_once '../app/core/Controller.php';

class DashboardController extends Controller {
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
        $data = [
            'residentesActivos' => $this->residenteModel->countByEstado('Activo'),
            'unidadesOcupadas' => $this->viviendaModel->countByEstado('Ocupada')
        ];
        $this->view('dashboard/index', $data);
    }
}
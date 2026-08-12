<?php
require_once '../app/core/Controller.php';

class DashboardController extends Controller {
    private $residenteModel;
    private $viviendaModel;
    private $pagoModel;
    private $reservaModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }
        $this->residenteModel = $this->model('Residente');
        $this->viviendaModel = $this->model('Vivienda');
        $this->pagoModel = $this->model('Pago');
        $this->reservaModel = $this->model('Reserva');
    }

    public function index() {
        $resumenPagos = $this->pagoModel->getResumenDashboard();

        $data = [
            'residentesActivos' => $this->residenteModel->countByEstado('Activo'),
            'unidadesOcupadas' => $this->viviendaModel->countByEstado('Ocupada'),
            'cuotasPagadasMes' => $resumenPagos['cuotas_pagadas_mes'],
            'cuotasPendientesMes' => $resumenPagos['cuotas_pendientes_mes'],
            'montoPendienteMes' => $resumenPagos['monto_pendiente_mes'],
            'pagosMes' => $resumenPagos['pagos_mes'],
            'pagosHoy' => $resumenPagos['pagos_hoy'],
            'pagosAnio' => $resumenPagos['pagos_anio'],
            'cuotasAlDia' => $resumenPagos['cuotas_al_dia'],
            'cuotasVencidas' => $resumenPagos['cuotas_vencidas'],
            'pagosRecientes' => $resumenPagos['pagos_recientes'],
            'reservasMes' => $this->reservaModel->countThisMonth(),
            'areasComunes' => $this->reservaModel->countAreas()
        ];
        $this->view('dashboard/index', $data);
    }
}
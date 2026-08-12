<?php
require_once '../app/core/Controller.php';

class PagoController extends Controller {
    private $pagoModel;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/auth/index');
        }

        $this->pagoModel = $this->model('Pago');
    }

    public function index() {
        $cuotas = $this->pagoModel->getCuotas();
        $resumen = $this->pagoModel->getResumen();

        $this->view('pagos/index', [
            'cuotas' => $cuotas,
            'resumen' => $resumen
        ]);
    }

    public function configuracion() {
        $configuracion = $this->pagoModel->getConfiguracion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $accion = $_POST['accion'] ?? '';

            if ($accion === 'guardar') {
                $monto = (float)($_POST['monto_mensual'] ?? 0);
                $diaVencimiento = (int)($_POST['dia_vencimiento'] ?? 0);

                if ($monto <= 0) {
                    $this->view('pagos/configuracion', [
                        'configuracion' => $configuracion,
                        'error' => 'El monto mensual debe ser mayor que cero.'
                    ]);
                    return;
                }

                if ($diaVencimiento < 1 || $diaVencimiento > 28) {
                    $this->view('pagos/configuracion', [
                        'configuracion' => $configuracion,
                        'error' => 'Para evitar problemas entre meses, el día de vencimiento debe estar entre 1 y 28.'
                    ]);
                    return;
                }

                $this->pagoModel->actualizarConfiguracion($monto, $diaVencimiento);

                $_SESSION['flash_success'] = 'Configuración de la cuota actualizada correctamente.';
                $this->redirect('/pago/configuracion');
            }

            if ($accion === 'generar') {
                $periodo = $_POST['periodo'] ?? '';

                if (!preg_match('/^\d{4}-\d{2}$/', $periodo)) {
                    $this->view('pagos/configuracion', [
                        'configuracion' => $configuracion,
                        'error' => 'Seleccione un mes válido.'
                    ]);
                    return;
                }

                $configuracion = $this->pagoModel->getConfiguracion();

                $periodoFecha = $periodo . '-01';
                $fechaVencimiento = $periodo . '-' . str_pad(
                    $configuracion['dia_vencimiento'],
                    2,
                    '0',
                    STR_PAD_LEFT
                );

                $cantidad = $this->pagoModel->generarCuotas(
                    $periodoFecha,
                    $configuracion['monto_mensual'],
                    $fechaVencimiento
                );

                if ($cantidad > 0) {
                    $_SESSION['flash_success'] = 'Se generaron ' . $cantidad . ' cuotas para el mes seleccionado.';
                } else {
                    $_SESSION['flash_success'] = 'No se generaron cuotas nuevas. Es posible que ya existan para ese mes o que no haya residentes activos.';
                }

                $this->redirect('/pago/configuracion');
            }
        }

        $this->view('pagos/configuracion', [
            'configuracion' => $configuracion
        ]);
    }

    public function create($id = null) {
        if (!$id) {
            $this->redirect('/pago/index');
        }

        $cuota = $this->pagoModel->getCuotaById($id);

        if (!$cuota) {
            $_SESSION['flash_error'] = 'La cuota seleccionada no existe.';
            $this->redirect('/pago/index');
        }

        if ($cuota['estado'] === 'Pagada') {
            $_SESSION['flash_error'] = 'Esta cuota ya se encuentra pagada.';
            $this->redirect('/pago/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $pagoId = $this->pagoModel->registrarPago($id);

                if (!$pagoId) {
                    $_SESSION['flash_error'] = 'No fue posible registrar el pago porque la cuota ya fue pagada.';
                    $this->redirect('/pago/index');
                }

                $_SESSION['flash_success'] = 'Pago simulado registrado correctamente.';
                $this->redirect('/pago/recibo/' . $pagoId);

            } catch (mysqli_sql_exception $e) {
                $this->view('pagos/create', [
                    'cuota' => $cuota,
                    'error' => 'Ocurrió un error al registrar el pago.'
                ]);
                return;
            }
        }

        $this->view('pagos/create', ['cuota' => $cuota]);
    }

    public function recibos() {
        $pagos = $this->pagoModel->getPagos();
        $this->view('pagos/recibos', ['pagos' => $pagos]);
    }

    public function recibo($id = null) {
        if (!$id) {
            $this->redirect('/pago/recibos');
        }

        $pago = $this->pagoModel->getPagoById($id);

        if (!$pago) {
            $this->redirect('/pago/recibos');
        }

        $this->view('pagos/recibo', ['pago' => $pago]);
    }

    public function reporte() {
        $periodo = $_GET['periodo'] ?? date('Y-m');

        if (!preg_match('/^\d{4}-\d{2}$/', $periodo)) {
            $periodo = date('Y-m');
        }

        $reporte = $this->pagoModel->getReporte($periodo);
        $morosos = $this->pagoModel->getMorososPorPeriodo($periodo);

        $this->view('pagos/reporte', [
            'periodo' => $periodo,
            'reporte' => $reporte,
            'morosos' => $morosos
        ]);
    }
}

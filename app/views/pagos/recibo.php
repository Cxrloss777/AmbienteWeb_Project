<?php
$pageTitle = "Detalle del Recibo";

$extraScripts = '
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="' . BASE_URL . '/assets/js/pages/recibo-pdf.js"></script>
';

include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$meses = [
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre'
];

$periodoTimestamp = strtotime($pago['periodo']);
$periodoTexto = $meses[(int)date('n', $periodoTimestamp)] . ' ' . date('Y', $periodoTimestamp);

$montoFormato = number_format((float)$pago['monto'], 0, ',', ' ');
$fechaPagoFormato = date('d/m/Y H:i', strtotime($pago['fecha_pago']));
?>

<style>
    @media print {
        .pc-sidebar,
        .pc-header,
        footer,
        .no-print,
        .alert {
            display: none !important;
        }

        body {
            background: white !important;
        }

        .pc-container,
        .pc-content {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        #recibo-pago {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: none !important;
            box-shadow: none !important;
        }

        @page {
            size: A4;
            margin: 18mm;
        }
    }
</style>

<div class="pc-container">
    <div class="pc-content">

        <?php if (isset($_SESSION['flash_success'])): ?>
            <div class="alert alert-success no-print">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8 mx-auto">

                <div
                    class="card"
                    id="recibo-pago"
                    data-numero="<?= htmlspecialchars($pago['numero_recibo'], ENT_QUOTES, 'UTF-8') ?>"
                    data-fecha="<?= htmlspecialchars($fechaPagoFormato, ENT_QUOTES, 'UTF-8') ?>"
                    data-residente="<?= htmlspecialchars($pago['residente_nombre'], ENT_QUOTES, 'UTF-8') ?>"
                    data-cedula="<?= htmlspecialchars($pago['residente_cedula'], ENT_QUOTES, 'UTF-8') ?>"
                    data-vivienda="<?= htmlspecialchars($pago['vivienda_identificador'], ENT_QUOTES, 'UTF-8') ?>"
                    data-concepto="<?= htmlspecialchars('Cuota de mantenimiento - ' . $periodoTexto, ENT_QUOTES, 'UTF-8') ?>"
                    data-metodo="<?= htmlspecialchars($pago['metodo_pago'], ENT_QUOTES, 'UTF-8') ?>"
                    data-monto="<?= htmlspecialchars($montoFormato, ENT_QUOTES, 'UTF-8') ?>"
                >
                    <div class="card-header text-center">
                        <h3 class="mb-1">ResidenciaNet</h3>
                        <p class="mb-0">Recibo de Pago</p>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Número de recibo:</strong><br>
                                <?= htmlspecialchars($pago['numero_recibo']) ?>
                            </div>

                            <div class="col-md-6 text-md-end">
                                <strong>Fecha de pago:</strong><br>
                                <?= htmlspecialchars($fechaPagoFormato) ?>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Residente:</strong><br>
                                <?= htmlspecialchars($pago['residente_nombre']) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Cédula:</strong><br>
                                <?= htmlspecialchars($pago['residente_cedula']) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Vivienda:</strong><br>
                                <?= htmlspecialchars($pago['vivienda_identificador']) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Concepto:</strong><br>
                                Cuota de mantenimiento - <?= htmlspecialchars($periodoTexto) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Método:</strong><br>
                                <?= htmlspecialchars($pago['metodo_pago']) ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Estado:</strong><br>
                                <span class="badge bg-success">Pagado</span>
                            </div>
                        </div>

                        <hr>

                        <div class="text-end">
                            <p class="text-muted mb-1">Monto pagado</p>
                            <h3>₡<?= htmlspecialchars($montoFormato) ?></h3>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3 flex-wrap gap-2 no-print">

                    <a href="<?= BASE_URL ?>/pago/recibos" class="btn btn-secondary">
                        <i class="feather icon-arrow-left"></i>
                        Volver a recibos
                    </a>

                    <div class="d-flex gap-2">

                        <button type="button" class="btn btn-outline-info" onclick="window.print()">
                            <i class="feather icon-printer"></i>
                            Imprimir
                        </button>

                        <button type="button" class="btn btn-info" id="descargar-pdf">
                            <i class="feather icon-download"></i>
                            Descargar PDF
                        </button>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>

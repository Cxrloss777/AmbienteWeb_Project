<?php
$pageTitle = "Pagos y Cuotas";

include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

function formatoPeriodoPago($fecha) {
    $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    $timestamp = strtotime($fecha);
    return $meses[(int)date('n', $timestamp)] . ' ' . date('Y', $timestamp);
}
?>

<div class="pc-container">
    <div class="pc-content">

        <?php if (isset($_SESSION['flash_success'])): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['flash_error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_SESSION['flash_error']) ?>
            </div>
            <?php unset($_SESSION['flash_error']); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="mb-0">Gestión de Pagos y Cuotas</h5>

                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?= BASE_URL ?>/pago/configuracion" class="btn btn-secondary">
                                <i class="feather icon-settings"></i>
                                Configurar Cuota
                            </a>

                            <a href="<?= BASE_URL ?>/pago/reporte" class="btn btn-warning">
                                <i class="feather icon-bar-chart-2"></i>
                                Reporte Mensual
                            </a>

                            <a href="<?= BASE_URL ?>/pago/recibos" class="btn btn-info">
                                <i class="feather icon-file-text"></i>
                                Ver Recibos
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card bg-light-success mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Ingresos de este mes</p>
                                        <h4 class="mb-0">
                                            ₡<?= number_format((float)$resumen['ingresos_mes'], 0, ',', ' ') ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-warning mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Monto pendiente</p>
                                        <h4 class="mb-0">
                                            ₡<?= number_format((float)$resumen['monto_pendiente'], 0, ',', ' ') ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-danger mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Residentes morosos</p>
                                        <h4 class="mb-0"><?= (int)$resumen['morosos'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (empty($cuotas)): ?>
                            <div class="alert alert-info mb-0">
                                Todavía no hay cuotas generadas.
                                <a href="<?= BASE_URL ?>/pago/configuracion">Configure y genere las cuotas del mes</a>.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Residente</th>
                                            <th>Vivienda</th>
                                            <th>Periodo</th>
                                            <th>Fecha límite</th>
                                            <th>Monto</th>
                                            <th>Cuota</th>
                                            <th>Residente</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($cuotas as $cuota): ?>
                                            <?php
                                            $estaVencida = (
                                                $cuota['estado'] === 'Pendiente' &&
                                                $cuota['fecha_vencimiento'] < date('Y-m-d')
                                            );
                                            ?>
                                            <tr>
                                                <td><?= (int)$cuota['id'] ?></td>
                                                <td><?= htmlspecialchars($cuota['residente_nombre']) ?></td>
                                                <td><?= htmlspecialchars($cuota['vivienda_identificador']) ?></td>
                                                <td><?= htmlspecialchars(formatoPeriodoPago($cuota['periodo'])) ?></td>
                                                <td><?= date('d/m/Y', strtotime($cuota['fecha_vencimiento'])) ?></td>
                                                <td>₡<?= number_format((float)$cuota['monto'], 0, ',', ' ') ?></td>

                                                <td>
                                                    <?php if ($cuota['estado'] === 'Pagada'): ?>
                                                        <span class="badge bg-success">Pagada</span>
                                                    <?php elseif ($estaVencida): ?>
                                                        <span class="badge bg-danger">Morosa</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning">Pendiente</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($cuota['estado_residente'] === 'Moroso'): ?>
                                                        <span class="badge bg-danger">Moroso</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success">Al día</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($cuota['estado'] === 'Pendiente'): ?>
                                                        <a href="<?= BASE_URL ?>/pago/create/<?= (int)$cuota['id'] ?>"
                                                           class="btn btn-primary btn-sm">
                                                            Pagar
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">Completado</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

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

<?php
$pageTitle = "Reporte Mensual de Pagos";

include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

$partesPeriodo = explode('-', $periodo);
$periodoTexto = $meses[(int)$partesPeriodo[1]] . ' ' . $partesPeriodo[0];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="mb-0">Reporte Mensual</h5>

                        <a href="<?= BASE_URL ?>/pago/index" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="<?= BASE_URL ?>/pago/reporte" class="row align-items-end">
                            <div class="col-md-5">
                                <label for="periodo" class="form-label">Mes a consultar</label>
                                <input
                                    type="month"
                                    class="form-control"
                                    id="periodo"
                                    name="periodo"
                                    value="<?= htmlspecialchars($periodo) ?>"
                                    required
                                >
                            </div>

                            <div class="col-md-3 mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather icon-search"></i>
                                    Consultar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <h5 class="mb-3">Resumen de <?= htmlspecialchars($periodoTexto) ?></h5>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-light-success">
                            <div class="card-body">
                                <p class="text-muted mb-1">Ingresos</p>
                                <h4 class="mb-0">
                                    ₡<?= number_format((float)$reporte['ingresos'], 0, ',', ' ') ?>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-light-primary">
                            <div class="card-body">
                                <p class="text-muted mb-1">Pagos registrados</p>
                                <h4 class="mb-0"><?= (int)$reporte['cantidad_pagos'] ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-light-success">
                            <div class="card-body">
                                <p class="text-muted mb-1">Cuotas pagadas</p>
                                <h4 class="mb-0"><?= (int)$reporte['pagadas'] ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-light-warning">
                            <div class="card-body">
                                <p class="text-muted mb-1">Cuotas pendientes</p>
                                <h4 class="mb-0"><?= (int)$reporte['pendientes'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Listado de Morosos - <?= htmlspecialchars($periodoTexto) ?></h5>
                    </div>

                    <div class="card-body">
                        <?php if (empty($morosos)): ?>
                            <div class="alert alert-success mb-0">
                                No hay cuotas morosas para el periodo seleccionado.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>Residente</th>
                                            <th>Vivienda</th>
                                            <th>Monto pendiente</th>
                                            <th>Fecha límite</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($morosos as $moroso): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($moroso['residente_nombre']) ?></td>
                                                <td><?= htmlspecialchars($moroso['vivienda_identificador']) ?></td>
                                                <td>₡<?= number_format((float)$moroso['monto'], 0, ',', ' ') ?></td>
                                                <td><?= date('d/m/Y', strtotime($moroso['fecha_vencimiento'])) ?></td>
                                                <td><span class="badge bg-danger">Moroso</span></td>
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

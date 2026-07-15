<?php
$pageTitle = "Pagos";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="mb-0">Estado de Pagos</h5>

                        <div>
                            <a href="recibos.php" class="btn btn-info me-2">
                                <i class="feather icon-file-text"></i>
                                Ver Recibos
                            </a>

                            <a href="create.php" class="btn btn-primary">
                                <i class="feather icon-credit-card"></i>
                                Realizar Pago
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card bg-light-success mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Pagado este mes</p>
                                        <h4 class="mb-0">₡75 000</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-warning mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Monto pendiente</p>
                                        <h4 class="mb-0">₡45 000</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-primary mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Próximo vencimiento</p>
                                        <h4 class="mb-0">31/07/2026</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Concepto</th>
                                        <th>Periodo</th>
                                        <th>Fecha límite</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Cuota condominal</td>
                                        <td>Julio 2026</td>
                                        <td>31/07/2026</td>
                                        <td>₡45 000</td>
                                        <td><span class="badge bg-warning">Pendiente</span></td>
                                        <td>
                                            <a href="create.php" class="btn btn-primary btn-sm">Pagar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Cuota condominal</td>
                                        <td>Junio 2026</td>
                                        <td>30/06/2026</td>
                                        <td>₡45 000</td>
                                        <td><span class="badge bg-success">Pagado</span></td>
                                        <td>
                                            <a href="recibos.php" class="btn btn-info btn-sm">Recibo</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Reserva del rancho</td>
                                        <td>Junio 2026</td>
                                        <td>20/06/2026</td>
                                        <td>₡30 000</td>
                                        <td><span class="badge bg-success">Pagado</span></td>
                                        <td>
                                            <a href="recibos.php" class="btn btn-info btn-sm">Recibo</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>

<?php
$pageTitle = "Recibos de Pago";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recibos de Pago</h5>
                        <a href="index.php" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>Recibo</th>
                                        <th>Fecha</th>
                                        <th>Concepto</th>
                                        <th>Método</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>REC-0003</td>
                                        <td>30/06/2026</td>
                                        <td>Cuota condominal - Junio</td>
                                        <td>Tarjeta terminada en 4582</td>
                                        <td>₡45 000</td>
                                        <td><span class="badge bg-success">Completado</span></td>
                                        <td><button type="button" class="btn btn-info btn-sm" onclick="window.print()">Imprimir</button></td>
                                    </tr>

                                    <tr>
                                        <td>REC-0002</td>
                                        <td>20/06/2026</td>
                                        <td>Reserva del rancho</td>
                                        <td>Tarjeta terminada en 1204</td>
                                        <td>₡30 000</td>
                                        <td><span class="badge bg-success">Completado</span></td>
                                        <td><button type="button" class="btn btn-info btn-sm" onclick="window.print()">Imprimir</button></td>
                                    </tr>

                                    <tr>
                                        <td>REC-0001</td>
                                        <td>31/05/2026</td>
                                        <td>Cuota condominal - Mayo</td>
                                        <td>Transferencia</td>
                                        <td>₡45 000</td>
                                        <td><span class="badge bg-success">Completado</span></td>
                                        <td><button type="button" class="btn btn-info btn-sm" onclick="window.print()">Imprimir</button></td>
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

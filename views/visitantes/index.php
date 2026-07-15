<?php
$pageTitle = "Visitantes";
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

                        <h5 class="mb-0">Visitantes Actuales</h5>

                        <div>

                            <a href="historial.php" class="btn btn-info me-2">
                                <i class="feather icon-clock"></i>
                                Historial
                            </a>

                            <a href="create.php" class="btn btn-primary">
                                <i class="feather icon-plus"></i>
                                Registrar Visitante
                            </a>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Persona Visitada</th>
                                        <th>Fecha</th>
                                        <th>Hora Entrada</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>1-1111-1111</td>
                                        <td>Apartamento A-12</td>
                                        <td>14/07/2026</td>
                                        <td>08:30 AM</td>
                                        <td><span class="badge bg-success">Dentro</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Carlos Mora</td>
                                        <td>3-3333-3333</td>
                                        <td>Apartamento C-08</td>
                                        <td>14/07/2026</td>
                                        <td>01:20 PM</td>
                                        <td><span class="badge bg-success">Dentro</span></td>
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
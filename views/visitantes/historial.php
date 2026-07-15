<?php
$pageTitle = "Historial de Visitantes";
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
                        <h5 class="mb-0">Historial de Visitantes</h5>

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
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Persona Visitada</th>
                                        <th>Fecha</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
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
                                        <td>10:15 AM</td>
                                        <td><span class="badge bg-success">Finalizada</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>María Rodríguez</td>
                                        <td>2-2222-2222</td>
                                        <td>Apartamento B-05</td>
                                        <td>13/07/2026</td>
                                        <td>02:00 PM</td>
                                        <td>04:30 PM</td>
                                        <td><span class="badge bg-success">Finalizada</span></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Carlos Mora</td>
                                        <td>3-3333-3333</td>
                                        <td>Apartamento C-08</td>
                                        <td>12/07/2026</td>
                                        <td>09:00 AM</td>
                                        <td>11:10 AM</td>
                                        <td><span class="badge bg-success">Finalizada</span></td>
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
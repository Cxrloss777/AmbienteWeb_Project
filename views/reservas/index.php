<?php
$pageTitle = "Reservas";
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
                        <h5 class="mb-0">Reservas de Áreas Comunes</h5>

                        <div>
                            <a href="calendario.php" class="btn btn-info me-2">
                                <i class="feather icon-calendar"></i>
                                Ver Calendario
                            </a>

                            <a href="create.php" class="btn btn-primary">
                                <i class="feather icon-plus"></i>
                                Nueva Reserva
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Residente</th>
                                        <th>Área Común</th>
                                        <th>Fecha</th>
                                        <th>Horario</th>
                                        <th>Personas</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>María Rodríguez</td>
                                        <td>Rancho BBQ</td>
                                        <td>18/07/2026</td>
                                        <td>2:00 PM - 6:00 PM</td>
                                        <td>20</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Juan Pérez</td>
                                        <td>Salón Comunal</td>
                                        <td>20/07/2026</td>
                                        <td>4:00 PM - 8:00 PM</td>
                                        <td>35</td>
                                        <td><span class="badge bg-warning">Pendiente</span></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Carlos Mora</td>
                                        <td>Cancha Multiuso</td>
                                        <td>23/07/2026</td>
                                        <td>9:00 AM - 11:00 AM</td>
                                        <td>10</td>
                                        <td><span class="badge bg-success">Confirmada</span></td>
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

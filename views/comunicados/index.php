<?php
$pageTitle = "Comunicados";
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

                        <h5 class="mb-0">Comunicados</h5>

                        <a href="create.php" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nuevo Comunicado
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Fecha</th>
                                        <th>Prioridad</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Mantenimiento de Piscina</td>
                                        <td>Administrador</td>
                                        <td>14/07/2026</td>
                                        <td>
                                            <span class="badge bg-warning">
                                                Media
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Corte Programado de Agua</td>
                                        <td>Administrador</td>
                                        <td>12/07/2026</td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Alta
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Reunión de Condóminos</td>
                                        <td>Administración</td>
                                        <td>10/07/2026</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Baja
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
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
<?php
$pageTitle = "Residentes";
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

                        <h5 class="mb-0">Residentes</h5>

                        <a href="create.php" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nuevo Residente
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Cédula</th>
                                        <th>Vivienda</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>1-1111-1111</td>
                                        <td>Apartamento A-12</td>
                                        <td>8888-1111</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Activo
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                            <a href="edit.php" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>María Rodríguez</td>
                                        <td>2-2222-2222</td>
                                        <td>Apartamento B-05</td>
                                        <td>8888-2222</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Activo
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                            <a href="edit.php" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Carlos Mora</td>
                                        <td>3-3333-3333</td>
                                        <td>Apartamento C-08</td>
                                        <td>8888-3333</td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Inactivo
                                            </span>
                                        </td>
                                        <td>
                                            <a href="show.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                            <a href="edit.php" class="btn btn-warning btn-sm">
                                                Editar
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

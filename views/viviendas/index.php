<?php
$pageTitle = "Viviendas";
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

                        <h5 class="mb-0">Viviendas</h5>

                        <a href="create.php" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nueva Vivienda
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-4">
                                <div class="card bg-light-primary mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Total de viviendas</p>
                                        <h4 class="mb-0">24</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-success mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Ocupadas</p>
                                        <h4 class="mb-0">19</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-warning mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Disponibles</p>
                                        <h4 class="mb-0">5</h4>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Identificador</th>
                                        <th>Tipo</th>
                                        <th>Propietario</th>
                                        <th>M² área</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Apartamento A-12</td>
                                        <td>Apartamento</td>
                                        <td>Juan Pérez</td>
                                        <td>85</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Ocupada
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
                                        <td>Apartamento B-05</td>
                                        <td>Apartamento</td>
                                        <td>María Rodríguez</td>
                                        <td>72</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Ocupada
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
                                        <td>Casa C-08</td>
                                        <td>Casa</td>
                                        <td>—</td>
                                        <td>110</td>
                                        <td>
                                            <span class="badge bg-warning">
                                                Disponible
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

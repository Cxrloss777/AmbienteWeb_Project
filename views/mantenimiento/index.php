<?php
$pageTitle = "Mantenimiento";
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

                        <h5 class="mb-0">Solicitudes de Mantenimiento</h5>

                        <a href="create.php" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nueva Solicitud
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Residente</th>
                                        <th>Categoría</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Seguimiento</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>Electricidad</td>
                                        <td>Falla en iluminación del parqueo.</td>
                                        <td>14/07/2026</td>
                                        <td>
                                            <span class="badge bg-warning">
                                                En Proceso
                                            </span>
                                        </td>
                                        <td>
                                            <a href="seguimiento.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>María Rodríguez</td>
                                        <td>Plomería</td>
                                        <td>Fuga de agua en área común.</td>
                                        <td>13/07/2026</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Completado
                                            </span>
                                        </td>
                                        <td>
                                            <a href="seguimiento.php" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Carlos Mora</td>
                                        <td>Jardinería</td>
                                        <td>Poda de árboles.</td>
                                        <td>12/07/2026</td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Pendiente
                                            </span>
                                        </td>
                                        <td>
                                            <a href="seguimiento.php" class="btn btn-info btn-sm">
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
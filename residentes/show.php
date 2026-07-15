<?php
$pageTitle = "Ver Residente";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-10 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Detalle del Residente</h5>

                        <div>

                            <a href="edit.php" class="btn btn-warning">
                                <i class="feather icon-edit"></i>
                                Editar
                            </a>

                            <a href="index.php" class="btn btn-secondary">
                                <i class="feather icon-arrow-left"></i>
                                Volver
                            </a>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-8">
                                <h3>Juan Pérez</h3>
                            </div>

                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-success">
                                    Activo
                                </span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Cédula:</strong><br>
                                1-1111-1111
                            </div>

                            <div class="col-md-4">
                                <strong>Vivienda:</strong><br>
                                Apartamento A-12
                            </div>

                            <div class="col-md-4">
                                <strong>Tipo de Residente:</strong><br>
                                Propietario
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Teléfono:</strong><br>
                                8888-1111
                            </div>

                            <div class="col-md-4">
                                <strong>Correo Electrónico:</strong><br>
                                juan.perez@example.com
                            </div>

                            <div class="col-md-4">
                                <strong>Fecha de Ingreso:</strong><br>
                                15/01/2026
                            </div>

                        </div>

                        <hr>

                        <h6>Observaciones</h6>

                        <p class="mt-3">
                            Sin observaciones registradas para este residente.
                        </p>

                    </div>

                    <div class="card-footer text-end">

                        <a href="index.php" class="btn btn-primary">
                            Regresar a Residentes
                        </a>

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

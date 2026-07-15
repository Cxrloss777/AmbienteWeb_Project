<?php
$pageTitle = "Ver Vivienda";
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

                        <h5 class="mb-0">Detalle de la Vivienda</h5>

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
                                <h3>Apartamento A-12</h3>
                            </div>

                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-success">
                                    Ocupada
                                </span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Tipo de Vivienda:</strong><br>
                                Apartamento
                            </div>

                            <div class="col-md-4">
                                <strong>Propietario:</strong><br>
                                Juan Pérez
                            </div>

                            <div class="col-md-4">
                                <strong>Área:</strong><br>
                                85 m²
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Número de Habitantes:</strong><br>
                                3
                            </div>

                            <div class="col-md-4">
                                <strong>Estado:</strong><br>
                                Ocupada
                            </div>

                        </div>

                        <hr>

                        <h6>Observaciones</h6>

                        <p class="mt-3">
                            Sin observaciones registradas para esta vivienda.
                        </p>

                    </div>

                    <div class="card-footer text-end">

                        <a href="index.php" class="btn btn-primary">
                            Regresar a Viviendas
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

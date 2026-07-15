<?php
$pageTitle = "Ver Comunicado";
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

                        <h5 class="mb-0">Detalle del Comunicado</h5>

                        <a href="index.php" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-8">
                                <h3>Mantenimiento de Piscina</h3>
                            </div>

                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-warning">
                                    Prioridad Media
                                </span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Autor:</strong><br>
                                Administrador
                            </div>

                            <div class="col-md-4">
                                <strong>Fecha:</strong><br>
                                14/07/2026
                            </div>

                            <div class="col-md-4">
                                <strong>Estado:</strong><br>
                                <span class="badge bg-success">
                                    Publicado
                                </span>
                            </div>

                        </div>

                        <hr>

                        <h6>Contenido del Comunicado</h6>

                        <p class="mt-3">
                            Se informa a todos los residentes que la piscina permanecerá
                            cerrada el próximo sábado debido a trabajos de mantenimiento
                            preventivo. Agradecemos su comprensión y les recomendamos
                            utilizar las demás áreas comunes mientras concluyen las labores.
                        </p>

                    </div>

                    <div class="card-footer text-end">

                        <a href="index.php" class="btn btn-primary">
                            Regresar a Comunicados
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
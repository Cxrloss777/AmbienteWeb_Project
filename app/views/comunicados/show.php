<?php
$pageTitle = "Detalle del Comunicado";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$comunicado = $data['comunicado'];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Detalle del Comunicado</h5>

                        <a href="<?= BASE_URL ?>/comunicado/index" class="btn btn-secondary">
                            Volver
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <h4>
                                <?= htmlspecialchars($comunicado['titulo']) ?>
                            </h4>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <strong>Autor:</strong>
                                <p>
                                    <?= htmlspecialchars($comunicado['autor']) ?>
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Fecha:</strong>
                                <p>
                                    <?= htmlspecialchars($comunicado['fecha']) ?>
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Prioridad:</strong>
                                <p>
                                    <?= htmlspecialchars($comunicado['prioridad']) ?>
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Estado:</strong>
                                <p>
                                    <?= htmlspecialchars($comunicado['estado']) ?>
                                </p>
                            </div>

                            <div class="col-12 mb-3">
                                <strong>Contenido:</strong>
                                <p>
                                    <?= nl2br(htmlspecialchars($comunicado['contenido'])) ?>
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
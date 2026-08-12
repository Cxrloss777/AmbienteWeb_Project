<?php
$pageTitle = "Seguimiento de Mantenimiento";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$mantenimiento = $data['mantenimiento'];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Seguimiento de Solicitud</h5>

                        <a href="<?= BASE_URL ?>/mantenimiento/index" class="btn btn-secondary">
                            Volver
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <strong>Residente:</strong>
                                <p><?= htmlspecialchars($mantenimiento['residente']) ?></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Categoría:</strong>
                                <p><?= htmlspecialchars($mantenimiento['categoria']) ?></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Prioridad:</strong>
                                <p><?= htmlspecialchars($mantenimiento['prioridad']) ?></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Fecha:</strong>
                                <p><?= htmlspecialchars($mantenimiento['fecha']) ?></p>
                            </div>

                            <div class="col-12 mb-3">
                                <strong>Ubicación:</strong>
                                <p><?= htmlspecialchars($mantenimiento['ubicacion']) ?></p>
                            </div>

                            <div class="col-12 mb-3">
                                <strong>Descripción:</strong>
                                <p>
                                    <?= nl2br(htmlspecialchars($mantenimiento['descripcion'])) ?>
                                </p>
                            </div>

                        </div>

                        <hr>

                        <form
                            action="<?= BASE_URL ?>/mantenimiento/seguimiento/<?= $mantenimiento['id'] ?>"
                            method="POST">

                            <div class="mb-3">

                                <label class="form-label">
                                    Estado
                                </label>

                                <select class="form-select" name="estado">

                                    <option
                                        value="Pendiente"
                                        <?= $mantenimiento['estado'] == 'Pendiente' ? 'selected' : '' ?>>
                                        Pendiente
                                    </option>

                                    <option
                                        value="En proceso"
                                        <?= $mantenimiento['estado'] == 'En proceso' ? 'selected' : '' ?>>
                                        En proceso
                                    </option>

                                    <option
                                        value="Resuelto"
                                        <?= $mantenimiento['estado'] == 'Resuelto' ? 'selected' : '' ?>>
                                        Resuelto
                                    </option>

                                </select>

                            </div>

                            <div class="text-end">

                                <button type="submit" class="btn btn-primary">
                                    Actualizar Estado
                                </button>

                            </div>

                        </form>

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
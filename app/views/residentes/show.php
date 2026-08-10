<?php
$pageTitle = "Ver Residente";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$residente = $data['residente'];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-10 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Detalle del Residente</h5>

                        <div>

                            <a href="<?= BASE_URL ?>/residente/edit/<?= $residente['id'] ?>" class="btn btn-warning">
                                <i class="feather icon-edit"></i>
                                Editar
                            </a>

                            <a href="<?= BASE_URL ?>/residente/index" class="btn btn-secondary">
                                <i class="feather icon-arrow-left"></i>
                                Volver
                            </a>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-8">
                                <h3><?= htmlspecialchars($residente['nombre']) ?></h3>
                            </div>

                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-<?= $residente['estado'] === 'Activo' ? 'success' : 'danger' ?>">
                                    <?= htmlspecialchars($residente['estado']) ?>
                                </span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Cédula:</strong><br>
                                <?= htmlspecialchars($residente['cedula']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Vivienda:</strong><br>
                                <?= htmlspecialchars($residente['vivienda_identificador']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Tipo de Residente:</strong><br>
                                <?= htmlspecialchars($residente['tipo_residente']) ?>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Teléfono:</strong><br>
                                <?= htmlspecialchars($residente['telefono']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Correo Electrónico:</strong><br>
                                <?= htmlspecialchars($residente['correo']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Fecha de Ingreso:</strong><br>
                                <?= date('d/m/Y', strtotime($residente['fecha_ingreso'])) ?>
                            </div>

                        </div>

                        <hr>

                        <h6>Observaciones</h6>

                        <p class="mt-3">
                            <?= !empty($residente['observaciones']) ? nl2br(htmlspecialchars($residente['observaciones'])) : 'Sin observaciones registradas para este residente.' ?>
                        </p>

                    </div>

                    <div class="card-footer text-end">

                        <a href="<?= BASE_URL ?>/residente/index" class="btn btn-primary">
                            Regresar a Residentes
                        </a>

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
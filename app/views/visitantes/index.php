<?php
$pageTitle = "Visitantes";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Visitantes</h5>

                        <div>
                            <a href="<?= BASE_URL ?>/visitante/historial" class="btn btn-info">
                                Historial
                            </a>

                            <a href="<?= BASE_URL ?>/visitante/create" class="btn btn-primary">
                                <i class="feather icon-plus"></i>
                                Nuevo Visitante
                            </a>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Cédula</th>
                                        <th>Persona Visitada</th>
                                        <th>Apartamento</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['visitantes'])): ?>
                                    <?php foreach ($data['visitantes'] as $visitante): ?>

                                    <tr>

                                        <td><?= htmlspecialchars($visitante['id']) ?></td>

                                        <td>
                                            <?= htmlspecialchars($visitante['nombre']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($visitante['cedula']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($visitante['visitado']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($visitante['apartamento']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($visitante['fecha']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($visitante['hora']) ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                <?= htmlspecialchars($visitante['estado']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a
                                                href="<?= BASE_URL ?>/visitante/salida/<?= $visitante['id'] ?>"
                                                class="btn btn-warning btn-sm"
                                                onclick="return confirm('¿Registrar la salida de este visitante?');">

                                                Registrar salida

                                            </a>
                                        </td>

                                    </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="9" class="text-center">
                                            Todavía no hay visitantes registrados.
                                        </td>
                                    </tr>

                                <?php endif; ?>

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
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
<?php
$pageTitle = "Mantenimiento";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-12">

                <?php if (isset($_SESSION['flash_success'])): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($_SESSION['flash_success']) ?>
                    </div>
                    <?php unset($_SESSION['flash_success']); ?>
                <?php endif; ?>

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Solicitudes de Mantenimiento</h5>

                        <a href="<?= BASE_URL ?>/mantenimiento/create" class="btn btn-primary">
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
                                        <th>Prioridad</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['mantenimientos'])): ?>

                                    <?php foreach ($data['mantenimientos'] as $mantenimiento): ?>

                                        <tr>

                                            <td><?= htmlspecialchars($mantenimiento['id']) ?></td>

                                            <td>
                                                <?= htmlspecialchars($mantenimiento['residente']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($mantenimiento['categoria']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($mantenimiento['prioridad']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($mantenimiento['descripcion']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($mantenimiento['fecha']) ?>
                                            </td>

                                            <td>

                                                <?php if ($mantenimiento['estado'] == 'Pendiente'): ?>

                                                    <span class="badge bg-danger">
                                                        Pendiente
                                                    </span>

                                                <?php elseif ($mantenimiento['estado'] == 'En proceso'): ?>

                                                    <span class="badge bg-warning">
                                                        En proceso
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-success">
                                                        Resuelto
                                                    </span>

                                                <?php endif; ?>

                                            </td>

                                            <td>

                                                <a
                                                    href="<?= BASE_URL ?>/mantenimiento/seguimiento/<?= $mantenimiento['id'] ?>"
                                                    class="btn btn-info btn-sm">
                                                    Seguimiento
                                                </a>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No hay solicitudes de mantenimiento registradas.
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
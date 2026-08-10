<?php
$pageTitle = "Residentes";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-12">

                <?php if (isset($_SESSION['flash_success'])): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['flash_success']) ?></div>
                    <?php unset($_SESSION['flash_success']); ?>
                <?php endif; ?>

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Residentes</h5>

                        <a href="<?= BASE_URL ?>/residente/create" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nuevo Residente
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Cédula</th>
                                        <th>Vivienda</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['residentes'])): ?>
                                    <?php foreach ($data['residentes'] as $residente): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($residente['id']) ?></td>
                                        <td><?= htmlspecialchars($residente['nombre']) ?></td>
                                        <td><?= htmlspecialchars($residente['cedula']) ?></td>
                                        <td><?= htmlspecialchars($residente['vivienda_identificador']) ?></td>
                                        <td><?= htmlspecialchars($residente['telefono']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $residente['estado'] === 'Activo' ? 'success' : 'danger' ?>">
                                                <?= htmlspecialchars($residente['estado']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL ?>/residente/show/<?= $residente['id'] ?>" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                            <a href="<?= BASE_URL ?>/residente/edit/<?= $residente['id'] ?>" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                            <a href="<?= BASE_URL ?>/residente/delete/<?= $residente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este residente?');">
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Todavía no hay residentes registrados.</td>
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
<?php
$pageTitle = "Viviendas";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$badgeClass = [
    'Ocupada' => 'success',
    'Disponible' => 'warning',
    'En mantenimiento' => 'danger'
];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <h5 class="mb-0">Viviendas</h5>

                        <a href="<?= BASE_URL ?>/vivienda/create" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nueva Vivienda
                        </a>

                    </div>

                    <div class="card-body">

                        <?php if (isset($_SESSION['flash_success'])): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($_SESSION['flash_success']) ?></div>
                            <?php unset($_SESSION['flash_success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['flash_error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['flash_error']) ?></div>
                            <?php unset($_SESSION['flash_error']); ?>
                        <?php endif; ?>

                        <div class="row mb-4">

                            <div class="col-md-4">
                                <div class="card bg-light-primary mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Total de viviendas</p>
                                        <h4 class="mb-0"><?= $data['stats']['total'] ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-success mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Ocupadas</p>
                                        <h4 class="mb-0"><?= $data['stats']['ocupadas'] ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light-warning mb-3">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Disponibles</p>
                                        <h4 class="mb-0"><?= $data['stats']['disponibles'] ?></h4>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Identificador</th>
                                        <th>Tipo</th>
                                        <th>Propietario</th>
                                        <th>M² área</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['viviendas'])): ?>
                                    <?php foreach ($data['viviendas'] as $vivienda): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($vivienda['id']) ?></td>
                                        <td><?= htmlspecialchars($vivienda['identificador']) ?></td>
                                        <td><?= htmlspecialchars($vivienda['tipo']) ?></td>
                                        <td><?= !empty($vivienda['propietario']) ? htmlspecialchars($vivienda['propietario']) : '—' ?></td>
                                        <td><?= htmlspecialchars($vivienda['area']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $badgeClass[$vivienda['estado']] ?? 'secondary' ?>">
                                                <?= htmlspecialchars($vivienda['estado']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL ?>/vivienda/show/<?= $vivienda['id'] ?>" class="btn btn-info btn-sm">
                                                Ver
                                            </a>
                                            <a href="<?= BASE_URL ?>/vivienda/edit/<?= $vivienda['id'] ?>" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                            <a href="<?= BASE_URL ?>/vivienda/delete/<?= $vivienda['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta vivienda?');">
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Todavía no hay viviendas registradas.</td>
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
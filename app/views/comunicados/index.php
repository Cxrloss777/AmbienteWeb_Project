<?php
$pageTitle = "Comunicados";
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

                        <h5 class="mb-0">Comunicados</h5>

                        <a href="<?= BASE_URL ?>/comunicado/create" class="btn btn-primary">
                            <i class="feather icon-plus"></i>
                            Nuevo Comunicado
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Fecha</th>
                                        <th>Prioridad</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['comunicados'])): ?>

                                    <?php foreach ($data['comunicados'] as $comunicado): ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars($comunicado['id']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($comunicado['titulo']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($comunicado['autor']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($comunicado['fecha']) ?>
                                        </td>

                                        <td>

                                            <?php if ($comunicado['prioridad'] === 'Alta'): ?>

                                                <span class="badge bg-danger">
                                                    Alta
                                                </span>

                                            <?php elseif ($comunicado['prioridad'] === 'Media'): ?>

                                                <span class="badge bg-warning">
                                                    Media
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-success">
                                                    Baja
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td>

                                            <span class="badge bg-<?= $comunicado['estado'] === 'Publicado' ? 'success' : 'secondary' ?>">
                                                <?= htmlspecialchars($comunicado['estado']) ?>
                                            </span>

                                        </td>

                                        <td>

                                            <a
                                                href="<?= BASE_URL ?>/comunicado/show/<?= $comunicado['id'] ?>"
                                                class="btn btn-info btn-sm">
                                                Ver
                                            </a>

                                        </td>

                                    </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Todavía no hay comunicados registrados.
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
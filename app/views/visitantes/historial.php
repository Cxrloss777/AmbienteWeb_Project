<?php
$pageTitle = "Historial de Visitantes";
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
                        <h5 class="mb-0">Historial de Visitantes</h5>

                        <a href="<?= BASE_URL ?>/visitante/index" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover table-striped align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Persona Visitada</th>
                                        <th>Fecha</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['visitantes'])): ?>
                                    <?php foreach ($data['visitantes'] as $v): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($v['id']) ?></td>
                                        <td><?= htmlspecialchars($v['nombre']) ?></td>
                                        <td><?= htmlspecialchars($v['cedula']) ?></td>
                                        <td><?= htmlspecialchars($v['apartamento']) ?></td>
                                        <td><?= date('d/m/Y', strtotime($v['fecha'])) ?></td>
                                        <td><?= date('h:i A', strtotime($v['hora'])) ?></td>
                                        <td><?= $v['hora_salida'] ? date('h:i A', strtotime($v['hora_salida'])) : '—' ?></td>
                                        <td>
                                            <span class="badge bg-<?= $v['estado'] === 'Finalizada' ? 'success' : 'warning' ?>">
                                                <?= htmlspecialchars($v['estado']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Todavía no hay visitas registradas.</td>
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

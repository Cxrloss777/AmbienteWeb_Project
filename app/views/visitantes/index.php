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

                        <h5 class="mb-0">Visitantes Actuales</h5>

                        <div>

                            <a href="<?= BASE_URL ?>/visitante/historial" class="btn btn-info me-2">
                                <i class="feather icon-clock"></i>
                                Historial
                            </a>

                            <a href="<?= BASE_URL ?>/visitante/create" class="btn btn-primary">
                                <i class="feather icon-plus"></i>
                                Registrar Visitante
                            </a>

                        </div>

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
                                        <th>Estado</th>
                                        <th>Acciones</th>
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
                                        <td><span class="badge bg-success">Dentro</span></td>
                                        <td>
                                            <a href="<?= BASE_URL ?>/visitante/salida/<?= $v['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('¿Registrar la salida de este visitante?');">
                                                Registrar salida
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No hay visitantes dentro del condominio en este momento.</td>
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

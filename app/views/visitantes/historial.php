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
                            Volver
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
                                        <th>Persona Visitada</th>
                                        <th>Apartamento</th>
                                        <th>Fecha</th>
                                        <th>Hora Entrada</th>
                                        <th>Hora Salida</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if (!empty($data['visitantes'])): ?>

                                    <?php foreach ($data['visitantes'] as $visitante): ?>

                                        <tr>

                                            <td>
                                                <?= htmlspecialchars($visitante['id']) ?>
                                            </td>

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
                                                <?= !empty($visitante['hora_salida'])
                                                    ? htmlspecialchars($visitante['hora_salida'])
                                                    : '-' ?>
                                            </td>

                                            <td>

                                                <?php if ($visitante['estado'] == 'Dentro'): ?>

                                                    <span class="badge bg-success">
                                                        Dentro
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-secondary">
                                                        Finalizada
                                                    </span>

                                                <?php endif; ?>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No hay registros en el historial.
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
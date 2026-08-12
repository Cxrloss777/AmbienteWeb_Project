<?php
$pageTitle = "Reservas";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <?php if (isset($_SESSION['flash_success'])): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-1">Áreas Comunes Disponibles</h5>
                        <p class="text-muted mb-0">Espacios habilitados para reservación.</p>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <?php if (!empty($data['areas'])): ?>
                                <?php foreach ($data['areas'] as $area): ?>
                                    <div class="col-md-6 col-xl-3 mb-3">
                                        <div class="card border h-100 mb-0">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <i class="ph ph-buildings f-28 text-primary"></i>
                                                    <span class="badge bg-success">Disponible</span>
                                                </div>
                                                <h5><?= htmlspecialchars($area['nombre']) ?></h5>
                                                <p class="text-muted mb-2"><?= htmlspecialchars($area['descripcion']) ?></p>
                                                <p class="mb-0">
                                                    <strong>Capacidad:</strong>
                                                    <?= htmlspecialchars($area['capacidad']) ?> personas
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p class="text-center text-muted mb-0">No hay áreas disponibles actualmente.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="mb-0">Reservas de Áreas Comunes</h5>

                        <div>
                            <a href="<?= BASE_URL ?>/reserva/calendario" class="btn btn-info me-2">
                                <i class="feather icon-calendar"></i>
                                Ver Calendario
                            </a>

                            <a href="<?= BASE_URL ?>/reserva/create" class="btn btn-primary">
                                <i class="feather icon-plus"></i>
                                Nueva Reserva
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Residente</th>
                                        <th>Vivienda</th>
                                        <th>Área Común</th>
                                        <th>Fecha</th>
                                        <th>Horario</th>
                                        <th>Personas</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($data['reservas'])): ?>
                                        <?php foreach ($data['reservas'] as $reserva): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($reserva['id']) ?></td>
                                                <td><?= htmlspecialchars($reserva['residente_nombre']) ?></td>
                                                <td><?= htmlspecialchars($reserva['vivienda_identificador']) ?></td>
                                                <td><?= htmlspecialchars($reserva['area_nombre']) ?></td>
                                                <td><?= date('d/m/Y', strtotime($reserva['fecha'])) ?></td>
                                                <td>
                                                    <?= date('g:i A', strtotime($reserva['hora_inicio'])) ?> -
                                                    <?= date('g:i A', strtotime($reserva['hora_fin'])) ?>
                                                </td>
                                                <td><?= htmlspecialchars($reserva['personas']) ?></td>
                                                <td>
                                                    <?php if ($reserva['estado'] === 'Confirmada'): ?>
                                                        <span class="badge bg-success">Confirmada</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">Cancelada</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($reserva['estado'] === 'Confirmada'): ?>
                                                        <a href="<?= BASE_URL ?>/reserva/cancel/<?= $reserva['id'] ?>"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('¿Desea cancelar esta reserva?');">
                                                            Cancelar
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">Sin acciones</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Todavía no hay reservas registradas.</td>
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

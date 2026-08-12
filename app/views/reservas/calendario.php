<?php
$pageTitle = "Calendario de Reservas";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
$meses = [
    1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
    5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
    9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <h5 class="mb-1">Calendario de Reservas</h5>
                            <p class="text-muted mb-0">Fechas y horarios que ya se encuentran reservados.</p>
                        </div>

                        <div>
                            <a href="<?= BASE_URL ?>/reserva/index" class="btn btn-secondary me-2">
                                <i class="feather icon-arrow-left"></i>
                                Volver
                            </a>
                            <a href="<?= BASE_URL ?>/reserva/create" class="btn btn-primary">Nueva Reserva</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <?php if (!empty($data['reservas'])): ?>
                                <?php foreach ($data['reservas'] as $reserva): ?>
                                    <?php
                                        $fecha = strtotime($reserva['fecha']);
                                        $textoFecha = $dias[(int)date('w', $fecha)] . ' ' .
                                                      date('d', $fecha) . ' de ' .
                                                      $meses[(int)date('n', $fecha)];
                                    ?>

                                    <div class="col-md-6 col-xl-4 mb-3">
                                        <div class="card border h-100 mb-0">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1"><?= htmlspecialchars($textoFecha) ?></h6>
                                                        <span class="badge bg-success">Reservado</span>
                                                    </div>
                                                    <i class="ph ph-calendar-check f-28 text-primary"></i>
                                                </div>

                                                <h5><?= htmlspecialchars($reserva['area_nombre']) ?></h5>
                                                <p class="mb-1">
                                                    <strong>Horario:</strong>
                                                    <?= date('g:i A', strtotime($reserva['hora_inicio'])) ?> -
                                                    <?= date('g:i A', strtotime($reserva['hora_fin'])) ?>
                                                </p>
                                                <p class="mb-1">
                                                    <strong>Residente:</strong>
                                                    <?= htmlspecialchars($reserva['residente_nombre']) ?>
                                                </p>
                                                <p class="mb-1">
                                                    <strong>Vivienda:</strong>
                                                    <?= htmlspecialchars($reserva['vivienda_identificador']) ?>
                                                </p>
                                                <p class="mb-0">
                                                    <strong>Personas:</strong>
                                                    <?= htmlspecialchars($reserva['personas']) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-info text-center">
                                        No hay próximas reservas registradas.
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-6 col-xl-4 mb-3">
                                <div class="card border border-dashed h-100 mb-0">
                                    <div class="card-body text-center d-flex flex-column justify-content-center" style="min-height: 210px;">
                                        <i class="ph ph-plus-circle f-36 text-primary mb-2"></i>
                                        <h6>¿Necesita reservar un espacio?</h6>
                                        <p class="text-muted">Registre una nueva reservación.</p>
                                        <a href="<?= BASE_URL ?>/reserva/create" class="btn btn-primary">Nueva Reserva</a>
                                    </div>
                                </div>
                            </div>

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

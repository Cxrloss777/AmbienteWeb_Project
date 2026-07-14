<?php
$pageTitle = "Notificaciones";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Notificaciones</h3>
                <p class="text-muted mb-0">
                    Mantente informado sobre la actividad del sistema.
                </p>
            </div>

            <div>
                <button class="btn btn-outline-primary">
                    Marcar todas como leídas
                </button>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex">

                <div class="me-3">
                    <div class="avtar avtar-m bg-light-success">
                        <i class="ph ph-money"></i>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <h6>Pago recibido</h6>
                    <p class="text-muted mb-2">
                        Juan Pérez realizó el pago de la cuota mensual.
                    </p>
                    <small class="text-muted">Hace 15 minutos</small>
                </div>

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex">

                <div class="me-3">
                    <div class="avtar avtar-m bg-light-primary">
                        <i class="ph ph-user-plus"></i>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <h6>Nuevo residente</h6>
                    <p class="text-muted mb-2">
                        María González fue registrada en la unidad B-12.
                    </p>
                    <small class="text-muted">Hace 2 horas</small>
                </div>

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex">

                <div class="me-3">
                    <div class="avtar avtar-m bg-light-warning">
                        <i class="ph ph-calendar-check"></i>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <h6>Reserva aprobada</h6>
                    <p class="text-muted mb-2">
                        La reserva del rancho para este sábado fue aprobada.
                    </p>
                    <small class="text-muted">Ayer</small>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex">

                <div class="me-3">
                    <div class="avtar avtar-m bg-light-danger">
                        <i class="ph ph-warning-circle"></i>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <h6>Cuotas pendientes</h6>
                    <p class="text-muted mb-2">
                        Existen 5 cuotas pendientes de pago este mes.
                    </p>
                    <small class="text-muted">Hace 3 días</small>
                </div>

            </div>
        </div>

    </div>
</div>

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>
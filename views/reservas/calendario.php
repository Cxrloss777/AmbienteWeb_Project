<?php
$pageTitle = "Calendario de Reservas";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <h5 class="mb-1">Calendario de Reservas</h5>
                            <p class="text-muted mb-0">Vista sencilla de las próximas actividades.</p>
                        </div>

                        <div>
                            <a href="index.php" class="btn btn-secondary me-2">
                                <i class="feather icon-arrow-left"></i>
                                Volver
                            </a>
                            <a href="create.php" class="btn btn-primary">Nueva Reserva</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-xl-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">Sábado 18 de julio</h6>
                                                <span class="badge bg-success">Confirmada</span>
                                            </div>
                                            <i class="ph ph-calendar-check f-28 text-primary"></i>
                                        </div>
                                        <h5>Rancho BBQ</h5>
                                        <p class="mb-1"><strong>Horario:</strong> 2:00 PM - 6:00 PM</p>
                                        <p class="mb-1"><strong>Residente:</strong> María Rodríguez</p>
                                        <p class="mb-0"><strong>Personas:</strong> 20</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">Lunes 20 de julio</h6>
                                                <span class="badge bg-warning">Pendiente</span>
                                            </div>
                                            <i class="ph ph-calendar-blank f-28 text-primary"></i>
                                        </div>
                                        <h5>Salón Comunal</h5>
                                        <p class="mb-1"><strong>Horario:</strong> 4:00 PM - 8:00 PM</p>
                                        <p class="mb-1"><strong>Residente:</strong> Juan Pérez</p>
                                        <p class="mb-0"><strong>Personas:</strong> 35</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">Jueves 23 de julio</h6>
                                                <span class="badge bg-success">Confirmada</span>
                                            </div>
                                            <i class="ph ph-calendar-check f-28 text-primary"></i>
                                        </div>
                                        <h5>Cancha Multiuso</h5>
                                        <p class="mb-1"><strong>Horario:</strong> 9:00 AM - 11:00 AM</p>
                                        <p class="mb-1"><strong>Residente:</strong> Carlos Mora</p>
                                        <p class="mb-0"><strong>Personas:</strong> 10</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">Sábado 25 de julio</h6>
                                                <span class="badge bg-success">Confirmada</span>
                                            </div>
                                            <i class="ph ph-calendar-check f-28 text-primary"></i>
                                        </div>
                                        <h5>Piscina</h5>
                                        <p class="mb-1"><strong>Horario:</strong> 10:00 AM - 1:00 PM</p>
                                        <p class="mb-1"><strong>Residente:</strong> Ana López</p>
                                        <p class="mb-0"><strong>Personas:</strong> 8</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">Domingo 26 de julio</h6>
                                                <span class="badge bg-warning">Pendiente</span>
                                            </div>
                                            <i class="ph ph-calendar-blank f-28 text-primary"></i>
                                        </div>
                                        <h5>Rancho BBQ</h5>
                                        <p class="mb-1"><strong>Horario:</strong> 12:00 PM - 4:00 PM</p>
                                        <p class="mb-1"><strong>Residente:</strong> Diego Sánchez</p>
                                        <p class="mb-0"><strong>Personas:</strong> 15</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card border border-dashed">
                                    <div class="card-body text-center d-flex flex-column justify-content-center" style="min-height: 210px;">
                                        <i class="ph ph-plus-circle f-36 text-primary mb-2"></i>
                                        <h6>¿Necesita reservar un espacio?</h6>
                                        <p class="text-muted">Registre una nueva reservación.</p>
                                        <a href="create.php" class="btn btn-primary">Nueva Reserva</a>
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
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>

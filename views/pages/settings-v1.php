<?php
$pageTitle = "Configuración";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="page-header mb-4">
            <div class="page-block">
                <h3 class="mb-1">Configuración</h3>
                <p class="text-muted">Administra la configuración general del sistema.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Información del Condominio</h5>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nombre del condominio</label>
                            <input type="text" class="form-control" value="ResidenciaNet">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" value="San José, Costa Rica">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" value="2222-2222">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" value="administracion@residencianet.com">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5>Configuración de Pagos</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Cuota mensual (₡)</label>
                            <input type="number" class="form-control" value="45000">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Día límite de pago</label>
                            <input type="number" class="form-control" value="5">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Multa por mora (%)</label>
                            <input type="number" class="form-control" value="5">
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Preferencias del Sistema</h5>
                    </div>

                    <div class="card-body">

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Enviar notificaciones por correo</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Permitir reservas de áreas comunes</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Generar recibos automáticamente</label>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12">
                <div class="d-flex justify-content-end gap-2">

                    <a href="/Condominio_Project/views/dashboard/index.php"
                       class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button class="btn btn-primary">
                        Guardar configuración
                    </button>

                </div>
            </div>

        </div>

    </div>
</div>

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>
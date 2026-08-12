<?php
$pageTitle = "Configuración de Cuotas";

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

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8 mx-auto">

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Configuración de la Cuota Mensual</h5>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">
                            Este monto se utilizará al generar las cuotas de mantenimiento de los residentes activos.
                        </p>

                        <form method="POST" action="<?= BASE_URL ?>/pago/configuracion">
                            <input type="hidden" name="accion" value="guardar">

                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="monto_mensual" class="form-label">Monto mensual (₡)</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="monto_mensual"
                                        name="monto_mensual"
                                        min="1"
                                        step="0.01"
                                        value="<?= htmlspecialchars($configuracion['monto_mensual'] ?? '45000') ?>"
                                        required
                                    >
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="dia_vencimiento" class="form-label">Día de vencimiento</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="dia_vencimiento"
                                        name="dia_vencimiento"
                                        min="1"
                                        max="28"
                                        value="<?= htmlspecialchars($configuracion['dia_vencimiento'] ?? '15') ?>"
                                        required
                                    >
                                    <small class="text-muted">Puede elegir del día 1 al 28.</small>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather icon-save"></i>
                                    Guardar configuración
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Generar Cuotas del Mes</h5>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info">
                            Se creará una cuota para cada residente que actualmente tenga estado <strong>Activo</strong>.
                            Si una cuota del mismo mes ya existe, no se duplicará.
                        </div>

                        <form method="POST" action="<?= BASE_URL ?>/pago/configuracion">
                            <input type="hidden" name="accion" value="generar">

                            <div class="mb-3">
                                <label for="periodo" class="form-label">Mes de la cuota</label>
                                <input
                                    type="month"
                                    class="form-control"
                                    id="periodo"
                                    name="periodo"
                                    value="<?= date('Y-m') ?>"
                                    required
                                >
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= BASE_URL ?>/pago/index" class="btn btn-secondary">
                                    <i class="feather icon-arrow-left"></i>
                                    Volver
                                </a>

                                <button type="submit" class="btn btn-success">
                                    <i class="feather icon-plus-circle"></i>
                                    Generar cuotas
                                </button>
                            </div>
                        </form>
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

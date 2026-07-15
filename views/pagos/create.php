<?php
$pageTitle = "Realizar Pago";
$extraScripts = '<script src="../../public/assets/js/pages/pagos.js"></script>';
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">

                    <div class="card-header">
                        <h5 class="mb-0">Realizar Pago</h5>
                    </div>

                    <div class="card-body">

                        <div class="alert alert-info">
                            Esta pantalla es una simulación académica. No se realizará ningún cobro real.
                        </div>

                        <form id="formulario-pago">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="residente" class="form-label">Nombre del Residente</label>
                                    <input type="text" class="form-control" id="residente" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="vivienda" class="form-label">Vivienda</label>
                                    <input type="text" class="form-control" id="vivienda" placeholder="Ej. Apartamento A-12" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="concepto" class="form-label">Concepto del Pago</label>
                                    <select class="form-select" id="concepto" required>
                                        <option value="" selected disabled>Seleccione un concepto</option>
                                        <option>Cuota condominal</option>
                                        <option>Reserva de área común</option>
                                        <option>Multa</option>
                                        <option>Otro</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="monto" class="form-label">Monto en colones</label>
                                    <input type="number" class="form-control" id="monto" min="1" placeholder="45000" required>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="mb-3">Datos de la Tarjeta</h6>

                            <div class="mb-3">
                                <label for="titular" class="form-label">Nombre del Titular</label>
                                <input type="text" class="form-control" id="titular" required>
                            </div>

                            <div class="mb-3">
                                <label for="numero-tarjeta" class="form-label">Número de Tarjeta</label>
                                <input type="text" class="form-control" id="numero-tarjeta" maxlength="19" placeholder="0000 0000 0000 0000" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
                                    <input type="month" class="form-control" id="vencimiento" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">Código CVV</label>
                                    <input type="password" class="form-control" id="cvv" maxlength="4" placeholder="123" required>
                                </div>
                            </div>

                            <div id="mensaje-pago" class="alert d-none" role="alert"></div>

                            <div class="text-end">
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="button" id="boton-pagar" class="btn btn-primary">
                                    <i class="feather icon-credit-card"></i>
                                    Completar Pago
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
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>

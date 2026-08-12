<?php
$pageTitle = "Realizar Pago";
$extraScripts = '<script src="' . BASE_URL . '/assets/js/pages/pagos.js"></script>';

include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

$periodoTimestamp = strtotime($cuota['periodo']);
$periodoTexto = $meses[(int)date('n', $periodoTimestamp)] . ' ' . date('Y', $periodoTimestamp);
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
                            <strong>Simulación académica:</strong>
                            no se realizará ningún cobro real y los datos de la tarjeta no se enviarán ni se guardarán en la base de datos.
                        </div>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <div class="card bg-light mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <strong>Residente:</strong><br>
                                        <?= htmlspecialchars($cuota['residente_nombre']) ?>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <strong>Vivienda:</strong><br>
                                        <?= htmlspecialchars($cuota['vivienda_identificador']) ?>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <strong>Concepto:</strong><br>
                                        Cuota de mantenimiento - <?= htmlspecialchars($periodoTexto) ?>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <strong>Monto:</strong><br>
                                        ₡<?= number_format((float)$cuota['monto'], 0, ',', ' ') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form
                            id="formulario-pago"
                            method="POST"
                            action="<?= BASE_URL ?>/pago/create/<?= (int)$cuota['id'] ?>"
                            novalidate
                        >
                            <input type="hidden" name="cuota_id" value="<?= (int)$cuota['id'] ?>">

                            <h6 class="mb-3">Datos ficticios de la Tarjeta</h6>

                            <div class="mb-3">
                                <label for="titular" class="form-label">Nombre del Titular</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="titular"
                                    autocomplete="off"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="numero-tarjeta" class="form-label">Número de Tarjeta</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="numero-tarjeta"
                                    maxlength="19"
                                    inputmode="numeric"
                                    autocomplete="off"
                                    placeholder="0000 0000 0000 0000"
                                    required
                                >
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
                                    <input
                                        type="month"
                                        class="form-control"
                                        id="vencimiento"
                                        autocomplete="off"
                                        required
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">Código CVV</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="cvv"
                                        maxlength="4"
                                        inputmode="numeric"
                                        autocomplete="off"
                                        placeholder="123"
                                        required
                                    >
                                </div>
                            </div>

                            <div id="mensaje-pago" class="alert d-none" role="alert"></div>

                            <div class="text-end">
                                <a href="<?= BASE_URL ?>/pago/index" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" id="boton-pagar" class="btn btn-primary">
                                    <i class="feather icon-credit-card"></i>
                                    Simular Pago
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

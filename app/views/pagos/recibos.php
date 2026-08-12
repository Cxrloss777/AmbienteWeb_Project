<?php
$pageTitle = "Recibos de Pago";

include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recibos de Pago</h5>

                        <a href="<?= BASE_URL ?>/pago/index" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>
                    </div>

                    <div class="card-body">

                        <?php if (empty($pagos)): ?>
                            <div class="alert alert-info mb-0">
                                Todavía no hay pagos registrados.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>Recibo</th>
                                            <th>Fecha</th>
                                            <th>Residente</th>
                                            <th>Vivienda</th>
                                            <th>Concepto</th>
                                            <th>Método</th>
                                            <th>Monto</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($pagos as $pago): ?>
                                            <?php
                                            $periodoTimestamp = strtotime($pago['periodo']);
                                            $periodoTexto =
                                                $meses[(int)date('n', $periodoTimestamp)] .
                                                ' ' .
                                                date('Y', $periodoTimestamp);
                                            ?>
                                            <tr>
                                                <td><?= htmlspecialchars($pago['numero_recibo']) ?></td>
                                                <td><?= date('d/m/Y H:i', strtotime($pago['fecha_pago'])) ?></td>
                                                <td><?= htmlspecialchars($pago['residente_nombre']) ?></td>
                                                <td><?= htmlspecialchars($pago['vivienda_identificador']) ?></td>
                                                <td>Cuota de mantenimiento - <?= htmlspecialchars($periodoTexto) ?></td>
                                                <td><?= htmlspecialchars($pago['metodo_pago']) ?></td>
                                                <td>₡<?= number_format((float)$pago['monto'], 0, ',', ' ') ?></td>
                                                <td><span class="badge bg-success">Completado</span></td>
                                                <td>
                                                    <a
                                                        href="<?= BASE_URL ?>/pago/recibo/<?= (int)$pago['id'] ?>"
                                                        class="btn btn-info btn-sm"
                                                    >
                                                        Ver recibo
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

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

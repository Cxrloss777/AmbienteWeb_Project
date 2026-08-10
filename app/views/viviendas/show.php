<?php
$pageTitle = "Ver Vivienda";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$vivienda = $data['vivienda'];
$badgeClass = [
    'Ocupada' => 'success',
    'Disponible' => 'warning',
    'En mantenimiento' => 'danger'
];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-10 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Detalle de la Vivienda</h5>

                        <div>

                            <a href="<?= BASE_URL ?>/vivienda/edit/<?= $vivienda['id'] ?>" class="btn btn-warning">
                                <i class="feather icon-edit"></i>
                                Editar
                            </a>

                            <a href="<?= BASE_URL ?>/vivienda/index" class="btn btn-secondary">
                                <i class="feather icon-arrow-left"></i>
                                Volver
                            </a>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-8">
                                <h3><?= htmlspecialchars($vivienda['identificador']) ?></h3>
                            </div>

                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-<?= $badgeClass[$vivienda['estado']] ?? 'secondary' ?>">
                                    <?= htmlspecialchars($vivienda['estado']) ?>
                                </span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Tipo de Vivienda:</strong><br>
                                <?= htmlspecialchars($vivienda['tipo']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Propietario:</strong><br>
                                <?= !empty($vivienda['propietario']) ? htmlspecialchars($vivienda['propietario']) : '—' ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Área:</strong><br>
                                <?= htmlspecialchars($vivienda['area']) ?> m²
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <strong>Número de Habitantes:</strong><br>
                                <?= htmlspecialchars($vivienda['num_habitantes']) ?>
                            </div>

                            <div class="col-md-4">
                                <strong>Estado:</strong><br>
                                <?= htmlspecialchars($vivienda['estado']) ?>
                            </div>

                        </div>

                        <hr>

                        <h6>Observaciones</h6>

                        <p class="mt-3">
                            <?= !empty($vivienda['observaciones']) ? nl2br(htmlspecialchars($vivienda['observaciones'])) : 'Sin observaciones registradas para esta vivienda.' ?>
                        </p>

                    </div>

                    <div class="card-footer text-end">

                        <a href="<?= BASE_URL ?>/vivienda/index" class="btn btn-primary">
                            Regresar a Viviendas
                        </a>

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
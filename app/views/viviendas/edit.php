<?php
$pageTitle = "Editar Vivienda";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$vivienda = $data['vivienda'];
$tipos = ['Apartamento', 'Casa', 'Local Comercial'];
$estados = ['Disponible', 'Ocupada', 'En mantenimiento'];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header">
                        <h5>Editar Vivienda</h5>
                    </div>

                    <div class="card-body">

                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>/vivienda/edit/<?= $vivienda['id'] ?>" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Identificador</label>
                                    <input type="text" class="form-control" name="identificador" value="<?= htmlspecialchars($vivienda['identificador']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Vivienda</label>
                                    <select class="form-select" name="tipo" required>
                                        <?php foreach ($tipos as $tipo): ?>
                                            <option <?= $vivienda['tipo'] === $tipo ? 'selected' : '' ?>><?= $tipo ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Propietario</label>
                                    <input type="text" class="form-control" name="propietario" value="<?= htmlspecialchars($vivienda['propietario'] ?? '') ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Área (m²)</label>
                                    <input type="number" class="form-control" name="area" value="<?= htmlspecialchars($vivienda['area']) ?>" min="0" step="0.01" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Número de Habitantes</label>
                                    <input type="number" class="form-control" name="num_habitantes" value="<?= htmlspecialchars($vivienda['num_habitantes']) ?>" min="0">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <?php foreach ($estados as $estado): ?>
                                            <option <?= $vivienda['estado'] === $estado ? 'selected' : '' ?>><?= $estado ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" rows="4"><?= htmlspecialchars($vivienda['observaciones'] ?? '') ?></textarea>
                                </div>

                            </div>

                            <div class="text-end">

                                <a href="<?= BASE_URL ?>/vivienda/index" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
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
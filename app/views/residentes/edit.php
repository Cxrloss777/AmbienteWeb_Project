<?php
$pageTitle = "Editar Residente";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$residente = $data['residente'];
$tipos = ['Propietario', 'Inquilino', 'Familiar'];
$estados = ['Activo', 'Inactivo'];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header">
                        <h5>Editar Residente</h5>
                    </div>

                    <div class="card-body">

                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>/residente/edit/<?= $residente['id'] ?>" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($residente['nombre']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="cedula" value="<?= htmlspecialchars($residente['cedula']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vivienda</label>
                                    <select class="form-select" name="vivienda_id" required>
                                        <?php foreach ($data['viviendas'] as $v): ?>
                                            <option value="<?= $v['id'] ?>" <?= $residente['vivienda_id'] == $v['id'] ? 'selected' : '' ?>><?= htmlspecialchars($v['identificador']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Residente</label>
                                    <select class="form-select" name="tipo_residente" required>
                                        <?php foreach ($tipos as $tipo): ?>
                                            <option <?= $residente['tipo_residente'] === $tipo ? 'selected' : '' ?>><?= $tipo ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" value="<?= htmlspecialchars($residente['telefono']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="correo" value="<?= htmlspecialchars($residente['correo']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" name="fecha_ingreso" value="<?= htmlspecialchars($residente['fecha_ingreso']) ?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <?php foreach ($estados as $estado): ?>
                                            <option <?= $residente['estado'] === $estado ? 'selected' : '' ?>><?= $estado ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" rows="4"><?= htmlspecialchars($residente['observaciones'] ?? '') ?></textarea>
                                </div>

                            </div>

                            <div class="text-end">

                                <a href="<?= BASE_URL ?>/residente/index" class="btn btn-secondary">
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
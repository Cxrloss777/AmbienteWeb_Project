<?php
$pageTitle = "Nuevo Residente";
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header">
                        <h5>Registrar Residente</h5>
                    </div>

                    <div class="card-body">

                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>/residente/create" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="cedula" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vivienda</label>
                                    <select class="form-select" name="vivienda_id" required>
                                        <option selected disabled value="">Seleccione una vivienda</option>
                                        <?php if (!empty($data['viviendas'])): ?>
                                            <?php foreach ($data['viviendas'] as $v): ?>
                                                <option value="<?= $v['id'] ?>"><?= htmlspecialchars($v['identificador']) ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (empty($data['viviendas'])): ?>
                                        <small class="text-danger">No hay viviendas registradas todavía — <a href="<?= BASE_URL ?>/vivienda/create">crea una primero</a>.</small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Residente</label>
                                    <select class="form-select" name="tipo_residente" required>
                                        <option selected disabled>Seleccione un tipo</option>
                                        <option>Propietario</option>
                                        <option>Inquilino</option>
                                        <option>Familiar</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="correo" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" name="fecha_ingreso" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <option selected>Activo</option>
                                        <option>Inactivo</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" rows="4"></textarea>
                                </div>

                            </div>

                            <div class="text-end">

                                <a href="<?= BASE_URL ?>/residente/index" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Registrar Residente
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
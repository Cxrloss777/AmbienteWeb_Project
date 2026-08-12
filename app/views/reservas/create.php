<?php
$pageTitle = "Nueva Reserva";
$extraScripts = '<script src="' . BASE_URL . '/assets/js/pages/reservas.js"></script>';
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/layouts/topbar.php';

$formData = $data['formData'] ?? [];
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">

                    <div class="card-header">
                        <h5 class="mb-0">Registrar Reserva</h5>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Seleccione el residente, el área y el horario que desea reservar.</p>

                        <?php if (!empty($data['error'])): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($data['error']) ?>
                            </div>
                        <?php endif; ?>

                        <form id="formulario-reserva" method="POST" action="<?= BASE_URL ?>/reserva/create">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="residente_id" class="form-label">Residente</label>
                                    <select class="form-select" id="residente_id" name="residente_id" required>
                                        <option value="" selected disabled>Seleccione un residente</option>
                                        <?php foreach ($data['residentes'] as $residente): ?>
                                            <option value="<?= $residente['id'] ?>"
                                                <?= (($formData['residente_id'] ?? '') == $residente['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($residente['nombre']) ?> -
                                                <?= htmlspecialchars($residente['vivienda_identificador']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="area_id" class="form-label">Área Común</label>
                                    <select class="form-select" id="area_id" name="area_id" required>
                                        <option value="" selected disabled>Seleccione un área</option>
                                        <?php foreach ($data['areas'] as $area): ?>
                                            <option value="<?= $area['id'] ?>"
                                                    data-capacidad="<?= $area['capacidad'] ?>"
                                                <?= (($formData['area_id'] ?? '') == $area['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($area['nombre']) ?>
                                                (máx. <?= htmlspecialchars($area['capacidad']) ?> personas)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="capacidad-area" class="text-muted"></small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="fecha" class="form-label">Fecha de Reservación</label>
                                    <input type="date"
                                           class="form-control"
                                           id="fecha"
                                           name="fecha"
                                           value="<?= htmlspecialchars($formData['fecha'] ?? '') ?>"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="personas" class="form-label">Número de Personas</label>
                                    <input type="number"
                                           class="form-control"
                                           id="personas"
                                           name="personas"
                                           min="1"
                                           value="<?= htmlspecialchars($formData['personas'] ?? '') ?>"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                                    <input type="time"
                                           class="form-control"
                                           id="hora_inicio"
                                           name="hora_inicio"
                                           value="<?= htmlspecialchars($formData['hora_inicio'] ?? '') ?>"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="hora_fin" class="form-label">Hora de Finalización</label>
                                    <input type="time"
                                           class="form-control"
                                           id="hora_fin"
                                           name="hora_fin"
                                           value="<?= htmlspecialchars($formData['hora_fin'] ?? '') ?>"
                                           required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="comentarios" class="form-label">Comentarios</label>
                                    <textarea class="form-control"
                                              id="comentarios"
                                              name="comentarios"
                                              rows="4"
                                              placeholder="Escriba algún comentario adicional"><?= htmlspecialchars($formData['comentarios'] ?? '') ?></textarea>
                                </div>

                            </div>

                            <div id="mensaje-reserva" class="alert alert-danger d-none" role="alert"></div>

                            <div class="text-end">
                                <a href="<?= BASE_URL ?>/reserva/index" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" id="boton-reservar" class="btn btn-primary">
                                    Realizar Reservación
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

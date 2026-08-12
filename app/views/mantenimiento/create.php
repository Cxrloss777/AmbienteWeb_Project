<?php
$pageTitle = "Nueva Solicitud de Mantenimiento";
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
                        <h5>Registrar Solicitud de Mantenimiento</h5>
                    </div>

                    <div class="card-body">

                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($data['error']) ?>
                            </div>
                        <?php endif; ?>

                        <div id="mensaje-mantenimiento"></div>

                        <form action="<?= BASE_URL ?>/mantenimiento/create" method="POST">

                            <div class="row">

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Residente
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="residente"
                                        name="residente"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Categoría
                                    </label>

                                    <select
                                        class="form-select"
                                        id="categoria"
                                        name="categoria"
                                        required>

                                        <option value="">Seleccione una categoría</option>
                                        <option>Electricidad</option>
                                        <option>Plomería</option>
                                        <option>Jardinería</option>
                                        <option>Pintura</option>
                                        <option>Infraestructura</option>
                                        <option>Limpieza</option>
                                        <option>Seguridad</option>
                                        <option>Otro</option>

                                    </select>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Prioridad
                                    </label>

                                    <select
                                        class="form-select"
                                        id="prioridad"
                                        name="prioridad">

                                        <option>Baja</option>
                                        <option selected>Media</option>
                                        <option>Alta</option>

                                    </select>

                                </div>

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Descripción
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="descripcion"
                                        name="descripcion"
                                        rows="5"
                                        required></textarea>

                                </div>

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Ubicación
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ubicacion"
                                        name="ubicacion">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Fecha
                                    </label>

                                    <input
                                        type="date"
                                        class="form-control"
                                        id="fecha"
                                        name="fecha"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Estado
                                    </label>

                                    <select
                                        class="form-select"
                                        id="estado"
                                        name="estado">

                                        <option selected>Pendiente</option>
                                        <option>En proceso</option>
                                        <option>Resuelto</option>

                                    </select>

                                </div>

                            </div>

                            <div class="text-end">

                                <a
                                    href="<?= BASE_URL ?>/mantenimiento/index"
                                    class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button
                                    type="submit"
                                    id="boton-mantenimiento"
                                    class="btn btn-primary">
                                    Registrar Solicitud
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<script src="<?= BASE_URL ?>/assets/js/pages/mantenimiento.js"></script>

<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
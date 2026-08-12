<?php
$pageTitle = "Registrar Visitante";

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
                        <h5 class="mb-0">Registrar Visitante</h5>
                    </div>

                    <div class="card-body">

                        <?php if (!empty($data['error'])): ?>

                            <div class="alert alert-danger">
                                <?= htmlspecialchars($data['error']) ?>
                            </div>

                        <?php endif; ?>

                        <div id="mensaje-visitante"></div>

                        <form action="<?= BASE_URL ?>/visitante/create" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">
                                        Nombre Completo
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nombre"
                                        name="nombre"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cedula" class="form-label">
                                        Cédula
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="cedula"
                                        name="cedula"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="visitado" class="form-label">
                                        Persona a Visitar
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="visitado"
                                        name="visitado"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="apartamento" class="form-label">
                                        Apartamento
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="apartamento"
                                        name="apartamento"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="fecha" class="form-label">
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
                                    <label for="hora" class="form-label">
                                        Hora de Entrada
                                    </label>

                                    <input
                                        type="time"
                                        class="form-control"
                                        id="hora"
                                        name="hora"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="placa" class="form-label">
                                        Placa del Vehículo
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="placa"
                                        name="placa">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cantidad" class="form-label">
                                        Cantidad de Personas
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control"
                                        id="cantidad"
                                        name="cantidad"
                                        min="1"
                                        value="1">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="motivo" class="form-label">
                                        Motivo de la Visita
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="motivo"
                                        name="motivo"
                                        rows="3"></textarea>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="observaciones" class="form-label">
                                        Observaciones
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="observaciones"
                                        name="observaciones"
                                        rows="3"></textarea>
                                </div>

                            </div>

                            <div class="text-end">

                                <a
                                    href="<?= BASE_URL ?>/visitante/index"
                                    class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button
                                    type="submit"
                                    id="boton-registrar"
                                    class="btn btn-primary">
                                    Registrar Visitante
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<script src="<?= BASE_URL ?>/assets/js/pages/visitantes.js"></script>

<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
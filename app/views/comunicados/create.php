<?php
$pageTitle = "Nuevo Comunicado";
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
                        <h5>Crear Comunicado</h5>
                    </div>

                    <div class="card-body">

                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($data['error']) ?>
                            </div>
                        <?php endif; ?>

                        <div id="mensaje-comunicado"></div>

                        <form action="<?= BASE_URL ?>/comunicado/create" method="POST">

                            <div class="row">

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Título
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="titulo"
                                        name="titulo"
                                        required>

                                </div>

                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Contenido
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="contenido"
                                        name="contenido"
                                        rows="6"
                                        required></textarea>

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

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Fecha de Publicación
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
                                        Autor
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="autor"
                                        name="autor"
                                        value="Administrador">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Estado
                                    </label>

                                    <select
                                        class="form-select"
                                        id="estado"
                                        name="estado">

                                        <option selected>Publicado</option>
                                        <option>Borrador</option>

                                    </select>

                                </div>

                            </div>

                            <div class="text-end">

                                <a
                                    href="<?= BASE_URL ?>/comunicado/index"
                                    class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button
                                    type="submit"
                                    id="boton-publicar"
                                    class="btn btn-primary">
                                    Publicar Comunicado
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<script src="<?= BASE_URL ?>/assets/js/pages/comunicados.js"></script>

<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
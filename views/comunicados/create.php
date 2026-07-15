<?php
$pageTitle = "Nuevo Comunicado";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
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

                        <form action="index.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contenido</label>
                                <textarea class="form-control" name="contenido" rows="6" required></textarea>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Prioridad</label>
                                    <select class="form-select" name="prioridad">
                                        <option>Baja</option>
                                        <option selected>Media</option>
                                        <option>Alta</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Publicación</label>
                                    <input type="date" class="form-control" name="fecha" required>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" value="Administrador">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="estado">
                                    <option selected>Publicado</option>
                                    <option>Borrador</option>
                                </select>
                            </div>

                            <div class="text-end">

                                <a href="index.php" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
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

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>
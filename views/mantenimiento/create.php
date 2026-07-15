<?php
$pageTitle = "Nueva Solicitud de Mantenimiento";
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
                        <h5>Registrar Solicitud de Mantenimiento</h5>
                    </div>

                    <div class="card-body">

                        <form action="index.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Residente</label>
                                <input type="text" class="form-control" name="residente" required>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Categoría</label>
                                    <select class="form-select" name="categoria" required>
                                        <option selected disabled>Seleccione una categoría</option>
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
                                    <label class="form-label">Prioridad</label>
                                    <select class="form-select" name="prioridad">
                                        <option>Baja</option>
                                        <option selected>Media</option>
                                        <option>Alta</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descripción del Problema</label>
                                <textarea class="form-control" name="descripcion" rows="5" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ubicación</label>
                                <input type="text" class="form-control" name="ubicacion" placeholder="Ej. Torre A, Parqueo, Área Común">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fecha del Reporte</label>
                                <input type="date" class="form-control" name="fecha" required>
                            </div>

                            <div class="text-end">

                                <a href="index.php" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
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

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>
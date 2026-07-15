<?php
$pageTitle = "Editar Residente";
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
                        <h5>Editar Residente</h5>
                    </div>

                    <div class="card-body">

                        <form action="index.php" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" value="Juan Pérez" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="cedula" value="1-1111-1111" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vivienda</label>
                                    <input type="text" class="form-control" name="vivienda" value="Apartamento A-12" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Residente</label>
                                    <select class="form-select" name="tipo_residente" required>
                                        <option selected>Propietario</option>
                                        <option>Inquilino</option>
                                        <option>Familiar</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" value="8888-1111" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="correo" value="juan.perez@example.com" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" name="fecha_ingreso" value="2026-01-15" required>
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

                                <a href="index.php" class="btn btn-secondary">
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
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>

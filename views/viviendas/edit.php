<?php
$pageTitle = "Editar Vivienda";
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
                        <h5>Editar Vivienda</h5>
                    </div>

                    <div class="card-body">

                        <form action="index.php" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Identificador</label>
                                    <input type="text" class="form-control" name="identificador" value="Apartamento A-12" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Vivienda</label>
                                    <select class="form-select" name="tipo" required>
                                        <option selected>Apartamento</option>
                                        <option>Casa</option>
                                        <option>Local Comercial</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Propietario</label>
                                    <input type="text" class="form-control" name="propietario" value="Juan Pérez">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Área (m²)</label>
                                    <input type="number" class="form-control" name="area" value="85" min="0" step="0.01" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Número de Habitantes</label>
                                    <input type="number" class="form-control" name="num_habitantes" value="3" min="0">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <option selected>Ocupada</option>
                                        <option>Disponible</option>
                                        <option>En mantenimiento</option>
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

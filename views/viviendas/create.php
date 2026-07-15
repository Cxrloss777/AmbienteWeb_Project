<?php
$pageTitle = "Nueva Vivienda";
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
                        <h5>Registrar Vivienda</h5>
                    </div>

                    <div class="card-body">

                        <form action="index.php" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Identificador</label>
                                    <input type="text" class="form-control" name="identificador" placeholder="Ej. Apartamento A-12" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tipo de Vivienda</label>
                                    <select class="form-select" name="tipo" required>
                                        <option selected disabled>Seleccione un tipo</option>
                                        <option>Apartamento</option>
                                        <option>Casa</option>
                                        <option>Local Comercial</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Propietario</label>
                                    <input type="text" class="form-control" name="propietario" placeholder="Nombre del propietario">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Área (m²)</label>
                                    <input type="number" class="form-control" name="area" min="0" step="0.01" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Número de Habitantes</label>
                                    <input type="number" class="form-control" name="num_habitantes" min="0">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado">
                                        <option selected>Disponible</option>
                                        <option>Ocupada</option>
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
                                    Registrar Vivienda
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

<?php
$pageTitle = "Registrar Visitante";
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
                        <h5>Registrar Visitante</h5>
                    </div>

                    <div class="card-body">

                        <form action="#" method="POST">

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
                                    <label class="form-label">Persona a Visitar</label>
                                    <input type="text" class="form-control" name="visitado" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apartamento</label>
                                    <input type="text" class="form-control" name="apartamento" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hora de Entrada</label>
                                    <input type="time" class="form-control" name="hora" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Placa del Vehículo</label>
                                    <input type="text" class="form-control" name="placa">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cantidad de Personas</label>
                                    <input type="number" class="form-control" name="cantidad" min="1" value="1">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Motivo de la Visita</label>
                                    <textarea class="form-control" name="motivo" rows="3"></textarea>
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

<?php
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>


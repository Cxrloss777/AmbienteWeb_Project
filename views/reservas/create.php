<?php
$pageTitle = "Nueva Reserva";
$extraScripts = '<script src="../../public/assets/js/pages/reservas.js"></script>';
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
                        <h5 class="mb-0">Registrar Reserva</h5>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Complete la información para reservar un área común.</p>

                        <form id="formulario-reserva">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" id="nombre" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="contacto" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="contacto" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="vivienda-reserva" class="form-label">Vivienda</label>
                                    <input type="text" class="form-control" id="vivienda-reserva" placeholder="Ej. Apartamento A-12" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="area" class="form-label">Área Común</label>
                                    <select class="form-select" id="area" required>
                                        <option value="" selected disabled>Seleccione un área</option>
                                        <option>Rancho BBQ</option>
                                        <option>Salón Comunal</option>
                                        <option>Cancha Multiuso</option>
                                        <option>Piscina</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="fecha" class="form-label">Fecha de Reservación</label>
                                    <input type="date" class="form-control" id="fecha" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="personas" class="form-label">Número de Personas</label>
                                    <input type="number" class="form-control" id="personas" min="1" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="hora-inicio" class="form-label">Hora de Inicio</label>
                                    <input type="time" class="form-control" id="hora-inicio" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="hora-fin" class="form-label">Hora de Finalización</label>
                                    <input type="time" class="form-control" id="hora-fin" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="comentarios" class="form-label">Comentarios</label>
                                    <textarea class="form-control" id="comentarios" rows="4" placeholder="Escriba algún comentario adicional"></textarea>
                                </div>

                            </div>

                            <div id="mensaje-reserva" class="alert d-none" role="alert"></div>

                            <div class="text-end">
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="button" id="boton-reservar" class="btn btn-primary">
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
include '../layouts/footer.php';
include '../layouts/scripts.php';
?>

<?php
$pageTitle = "Seguimiento de Mantenimiento";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="row">

            <div class="col-lg-10 mx-auto">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Seguimiento de Solicitud</h5>

                        <a href="index.php" class="btn btn-secondary">
                            <i class="feather icon-arrow-left"></i>
                            Volver
                        </a>

                    </div>

                    <div class="card-body">

                        <div class="row mb-4">

                            <div class="col-md-6">
                                <strong>Residente</strong>
                                <p>Juan Pérez</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Categoría</strong>
                                <p>Electricidad</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Fecha del Reporte</strong>
                                <p>14/07/2026</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Prioridad</strong><br>
                                <span class="badge bg-danger">
                                    Alta
                                </span>
                            </div>

                        </div>

                        <div class="mb-4">

                            <strong>Descripción del Problema</strong>

                            <div class="border rounded p-3 mt-2">
                                Se reporta una falla en la iluminación del parqueo principal.
                                Varias lámparas permanecen apagadas durante la noche.
                            </div>

                        </div>

                        <div class="mb-4">

                            <strong>Estado Actual</strong><br><br>

                            <span class="badge bg-warning fs-6">
                                En Proceso
                            </span>

                        </div>

                        <hr>

                        <h5 class="mb-3">Historial de Seguimiento</h5>

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Responsable</th>
                                        <th>Actualización</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>14/07/2026</td>
                                        <td>Administrador</td>
                                        <td>Solicitud registrada.</td>
                                    </tr>

                                    <tr>
                                        <td>15/07/2026</td>
                                        <td>Departamento de Mantenimiento</td>
                                        <td>Solicitud asignada al técnico.</td>
                                    </tr>

                                    <tr>
                                        <td>16/07/2026</td>
                                        <td>Técnico</td>
                                        <td>Se inició la reparación del sistema eléctrico.</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="card-footer text-end">

                        <a href="index.php" class="btn btn-primary">
                            Regresar a Solicitudes
                        </a>

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
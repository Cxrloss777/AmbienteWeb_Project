<?php
$pageTitle = "Editar Perfil";
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="page-header mb-4">
            <div class="page-block">
                <h3 class="mb-1">Editar Perfil</h3>
                <p class="text-muted mb-0">Administra la información de tu cuenta.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-center">

                        <img src="../../public/assets/images/user/avatar-2.jpg"
                             class="rounded-circle mb-3"
                             width="140"
                             alt="Perfil">

                        <h4>Administrador</h4>
                        <p class="text-muted">Administrador del Condominio</p>

                        <button class="btn btn-outline-primary">
                            Cambiar foto
                        </button>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header">
                        <h5>Información Personal</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text"
                                       class="form-control"
                                       value="Administrador">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text"
                                       class="form-control"
                                       value="Principal">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email"
                                       class="form-control"
                                       value="admin@residencianet.com">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text"
                                       class="form-control"
                                       value="8888-8888">
                            </div>

                        </div>

                        <button class="btn btn-primary">
                            Guardar cambios
                        </button>

                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5>Cambiar Contraseña</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Contraseña actual
                            </label>

                            <input type="password"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nueva contraseña
                            </label>

                            <input type="password"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Confirmar contraseña
                            </label>

                            <input type="password"
                                   class="form-control">
                        </div>

                        <button class="btn btn-success">
                            Actualizar contraseña
                        </button>

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
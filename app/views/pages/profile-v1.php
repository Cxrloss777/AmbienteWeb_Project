<?php
$pageTitle = "Editar Perfil";
    include '../app/views/layouts/header.php';
    include '../app/views/layouts/sidebar.php';
    include '../app/views/layouts/topbar.php';
?>

<div class="pc-container">
    <div class="pc-content">

        <div class="page-header mb-4">
            <div class="page-block">
                <h3 class="mb-1">Editar Perfil</h3>
                <p class="text-muted mb-0">Administra la información de tu cuenta.</p>
            </div>
        </div>

        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
            </div>
            <?php unset($_SESSION['flash_success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['flash_error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_SESSION['flash_error']) ?>
            </div>
            <?php unset($_SESSION['flash_error']); ?>
        <?php endif; ?>

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-center">

                        <img src="<?= BASE_URL ?>/assets/images/user/avatar-2.jpg"
                             class="rounded-circle mb-3"
                             width="140"
                             alt="Perfil">

                        <h4><?= htmlspecialchars($usuario['nombre']) ?></h4>
                        <p class="text-muted">Administrador del Condominio</p>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header">
                        <h5>Información Personal</h5>
                    </div>

                    <div class="card-body">

                        <form action="<?= BASE_URL ?>/perfil/actualizar" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text"
                                           class="form-control"
                                           name="nombre"
                                           value="<?= htmlspecialchars($usuario['nombre']) ?>"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Correo electrónico</label>
                                    <input type="email"
                                           class="form-control"
                                           name="correo"
                                           value="<?= htmlspecialchars($usuario['correo']) ?>"
                                           required>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">
                                Guardar cambios
                            </button>

                        </form>

                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5>Cambiar Contraseña</h5>
                    </div>

                    <div class="card-body">

                        <form action="<?= BASE_URL ?>/perfil/actualizarContrasena" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Contraseña actual</label>
                                <input type="password"
                                       class="form-control"
                                       name="contrasena_actual"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nueva contraseña</label>
                                <input type="password"
                                       class="form-control"
                                       name="nueva_contrasena"
                                       required
                                       minlength="6">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirmar contraseña</label>
                                <input type="password"
                                       class="form-control"
                                       name="confirmar_contrasena"
                                       required
                                       minlength="6">
                            </div>

                            <button type="submit" class="btn btn-success">
                                Actualizar contraseña
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
<?php
include '../app/views/layouts/footer.php';
include '../app/views/layouts/scripts.php';
?>
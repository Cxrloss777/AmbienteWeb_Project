<?php
  $pageTitle = "Iniciar sesión";
  include '../app/views/layouts/header.php';
?>
    <div class="auth-main v1 bg-grd-primary">
      <div class="auth-wrapper">
        <div class="auth-form">
          <div class="card my-5">
            <div class="card-body">
              <div class="text-center">
                <div class="mb-4" style="color: #1c232f;">
                  <i class="ph ph-buildings-duotone f-24" style="vertical-align: -5px;"></i>
                  <span class="f-w-600" style="font-size: 22px;">ResidenciaNet</span>
                </div>
                <h4 class="f-w-500 mb-1">Inicia sesión con tu correo</h4>
                <hr />
              </div>

              <?php if (isset($data['error'])): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
              <?php endif; ?>

              <form action="<?= BASE_URL ?>/auth/login" method="POST">
                <div class="form-group mb-3">
                  <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required />
                </div>
                <div class="form-group mb-3">
                  <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required />
                </div>
                <div class="d-flex mt-1 justify-content-between align-items-center">
                  <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                    <label class="form-check-label text-muted" for="customCheckc1">Recordarme</label>
                  </div>
                <a href="<?= BASE_URL ?>/auth/forgotPassword">
                  <h6 class="f-w-400 mb-0">¿Olvidaste tu contraseña?</h6>
                </a>
                </div>
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-primary">
                    Iniciar sesión
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  include '../app/views/layouts/scripts.php';
?>
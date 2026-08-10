<?php
  $pageTitle = "Restablecer contraseña";
  include '../app/views/layouts/header.php';
?>

<div class="auth-main v1 bg-grd-primary">
  <div class="auth-wrapper">
    <div class="auth-form">
      <div class="card my-5">
        <div class="card-body">
          <div class="text-center">
            <h4>Restablecer contraseña</h4>
            <p class="text-muted">Ingresa tu nueva contraseña.</p>
          </div>

          <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
          <?php endif; ?>

          <form action="<?= BASE_URL ?>/auth/resetPassword/<?= htmlspecialchars($data['token']) ?>" method="POST">
            <div class="form-group mb-3">
              <input type="password" name="contrasena" class="form-control" placeholder="Nueva contraseña" required minlength="6">
            </div>
            <div class="form-group mb-3">
              <input type="password" name="confirmar_contrasena" class="form-control" placeholder="Confirmar contraseña" required minlength="6">
            </div>
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">
                Guardar nueva contraseña
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
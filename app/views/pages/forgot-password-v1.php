<?php
  $pageTitle = "Recuperar contraseña";
  include '../app/views/layouts/header.php';
?>

<div class="auth-main v1 bg-grd-primary">
  <div class="auth-wrapper">
    <div class="auth-form">
      <div class="card my-5">
        <div class="card-body">
          <div class="text-center">
            <h4>¿Olvidaste tu contraseña?</h4>
            <p class="text-muted">
              Ingresa tu correo electrónico y te generaremos un enlace para restablecer tu contraseña.
            </p>
          </div>

          <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
          <?php endif; ?>

          <?php if (isset($data['enlace'])): ?>
            <div class="alert alert-success">
              Enlace generado. Como esta es una versión de demostración sin envío real de correo, haz clic aquí para continuar:<br>
              <a href="<?= $data['enlace'] ?>"><?= $data['enlace'] ?></a>
            </div>
          <?php else: ?>
            <form action="<?= BASE_URL ?>/auth/forgotPassword" method="POST">
              <div class="form-group mb-3">
                <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                  Generar enlace de recuperación
                </button>
              </div>
            </form>
          <?php endif; ?>

          <div class="d-grid gap-2 mt-2">
            <a href="<?= BASE_URL ?>/auth/index" class="btn btn-outline-secondary">
              Volver al inicio de sesión
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
include '../app/views/layouts/scripts.php';
?>
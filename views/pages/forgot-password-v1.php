<?php
  $pageTitle = "Recuperar contraseña";
  include '../layouts/header.php';
?>

<div class="auth-main v1 bg-grd-primary">
  <div class="auth-wrapper">
    <div class="auth-form">
      <div class="card my-5">
        <div class="card-body">
          <div class="text-center">
            <h4>¿Olvidaste tu contraseña?</h4>
            <p class="text-muted">
              Ingresa tu correo electrónico y te enviaremos las instrucciones para restablecer tu contraseña.
            </p>
          </div>

          <div class="form-group mb-3">
            <input
              type="email"
              class="form-control"
              placeholder="Correo electrónico">
          </div>

          <div class="d-grid gap-2">
            <a href="/Condominio_Project/views/pages/login-v1.php"
            class="btn btn-primary">
                Enviar instrucciones
            </a>

            <a href="/Condominio_Project/views/pages/login-v1.php"
            class="btn btn-outline-secondary">
                Volver al inicio de sesión
            </a>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include '../layouts/scripts.php';
?>
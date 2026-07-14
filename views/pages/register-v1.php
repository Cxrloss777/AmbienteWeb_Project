<?php
  $pageTitle = "Registrar Residente";
  include '../layouts/header.php';
  include '../layouts/sidebar.php';
  include '../layouts/topbar.php';
?>
    <div class="pc-container">
      <div class="pc-content">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-9 col-md-11">
            <div class="card">
              <div class="card-header">
                <h5>Registrar Nuevo Residente</h5>
              </div>
              <div class="card-body">
                <p class="text-muted mb-4">Este formulario lo completa el administrador para dar de alta a un residente. El residente recibirá sus credenciales para ingresar al sistema.</p>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Nombre</label>
                      <input type="text" class="form-control" placeholder="Nombre" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Apellidos</label>
                      <input type="text" class="form-control" placeholder="Apellidos" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Cédula / Identificación</label>
                      <input type="text" class="form-control" placeholder="Número de cédula" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Teléfono</label>
                      <input type="tel" class="form-control" placeholder="Número de teléfono" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Correo Electrónico</label>
                      <input type="email" class="form-control" placeholder="Correo electrónico" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Número de Vivienda</label>
                      <input type="text" class="form-control" placeholder="Ej. Casa 12, Apto 3B" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Contraseña</label>
                      <input type="password" class="form-control" placeholder="Contraseña temporal" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-3">
                      <label class="form-label">Confirmar Contraseña</label>
                      <input type="password" class="form-control" placeholder="Confirmar contraseña" />
                    </div>
                  </div>
                </div>
                <div class="d-flex mt-1 justify-content-between">
                  <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                    <label class="form-check-label text-muted" for="customCheckc1">Residente activo</label>
                  </div>
                </div>
                <div class="d-flex gap-2 mt-4">
                <a href="../dashboard/index.php" class="btn btn-primary">
                     Registrar Residente
                 </a>

                  <a href="../dashboard/index.php" class="btn btn-outline-secondary">
                      Cancelar
                  </a>
              </div>
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
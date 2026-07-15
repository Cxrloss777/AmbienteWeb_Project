<?php
  $pageTitle = "Dashboard";
  include '../layouts/header.php';
  include '../layouts/sidebar.php';
  include '../layouts/topbar.php';
?>
    <div class="pc-container">
      <div class="pc-content">
        <div class="row">
          <div class="col-md-6 col-xl-3">
            <div class="card bg-grd-primary order-card">
              <div class="card-body">
                <h6 class="text-white">Residentes Activos</h6>
                <h2 class="text-end text-white"><i class="feather icon-users float-start"></i><span>0</span> </h2>
                <p class="m-b-0">Unidades ocupadas<span class="float-end">0</span></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3">
            <div class="card bg-grd-success order-card">
              <div class="card-body">
                <h6 class="text-white">Cuotas Pagadas</h6>
                <h2 class="text-end text-white"><i class="feather icon-check-circle float-start"></i><span>0</span> </h2>
                <p class="m-b-0">Este mes<span class="float-end">0</span></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3">
            <div class="card bg-grd-warning order-card">
              <div class="card-body">
                <h6 class="text-white">Recaudación</h6>
                <h2 class="text-end text-white"><i class="feather icon-dollar-sign float-start"></i><span>$0</span></h2>
                <p class="m-b-0">Este mes<span class="float-end">$0</span></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-xl-3">
            <div class="card bg-grd-danger order-card">
              <div class="card-body">
                <h6 class="text-white">Cuotas Pendientes</h6>
                <h2 class="text-end text-white"><i class="feather icon-alert-circle float-start"></i><span>0</span></h2>
                <p class="m-b-0">Por cobrar<span class="float-end">$0</span></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-7">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Pagos Recibidos</h5>
                <div class="dropdown">
                  <a
                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                    href="#"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="material-icons-two-tone f-18">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Ver</a>
                    <a class="dropdown-item" href="#">Editar</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                    <i class="ph ph-money f-20"></i>
                  </div>
                  <div class="media-body ms-3">
                    <p class="mb-0 text-muted">Recaudado este mes</p>
                    <h5 class="mb-0">$0.00</h5>
                  </div>
                </div>
                <div id="earnings-users-chart"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-5">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="media align-items-center">
                      <div class="avtar avtar-s bg-grd-primary flex-shrink-0">
                        <i class="ph ph-check-circle f-20 text-white"></i>
                      </div>
                      <div class="media-body ms-2">
                        <p class="mb-0 text-muted">Cuotas al día</p>
                        <h6 class="mb-0">0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="media align-items-center">
                      <div class="avtar avtar-s bg-grd-danger flex-shrink-0">
                        <i class="ph ph-warning-circle text-white f-20"></i>
                      </div>
                      <div class="media-body ms-2">
                        <p class="mb-0 text-muted">Cuotas vencidas</p>
                        <h6 class="mb-0">0</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="media align-items-center">
                      <div class="avtar avtar-s bg-grd-primary flex-shrink-0">
                        <i class="ph ph-calendar-check f-20 text-white"></i>
                      </div>
                      <div class="media-body ms-2">
                        <p class="mb-0 text-muted">Reservas del mes</p>
                        <h6 class="mb-0">0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="media align-items-center">
                      <div class="avtar avtar-s bg-grd-success flex-shrink-0">
                        <i class="ph ph-buildings text-white f-20"></i>
                      </div>
                      <div class="media-body ms-2">
                        <p class="mb-0 text-muted">Áreas comunes</p>
                        <h6 class="mb-0">0</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="card statistics-card-1">
              <div class="card-body">
                <img src="../../public/assets/images/widget/img-status-4.svg" alt="img" class="img-fluid img-bg" />
                <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                  <h6 class="mb-0">Pagos Hoy</h6>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <h3 class="f-w-300 d-flex align-items-center m-b-0">$0.00</h3>
                  <span class="badge bg-light-success ms-2">0%</span>
                </div>
                <p class="text-muted mb-2 text-sm mt-3">Pagos registrados hoy</p>
                <div class="progress" style="height: 7px">
                  <div
                    class="progress-bar bg-brand-color-1"
                    role="progressbar"
                    style="width: 0%"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card statistics-card-1">
              <div class="card-body">
                <img src="../../public/assets/images/widget/img-status-5.svg" alt="img" class="img-fluid img-bg" />
                <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                  <h6 class="mb-0">Pagos Este Mes</h6>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <h3 class="f-w-300 d-flex align-items-center m-b-0">$0.00</h3>
                  <span class="badge bg-light-primary ms-2">0%</span>
                </div>
                <p class="text-muted mb-2 text-sm mt-3">Total recaudado este mes</p>
                <div class="progress" style="height: 7px">
                  <div
                    class="progress-bar bg-brand-color-3"
                    role="progressbar"
                    style="width: 0%"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card statistics-card-1 bg-brand-color-1">
              <div class="card-body">
                <img src="../../public/assets/images/widget/img-status-6.svg" alt="img" class="img-fluid img-bg" />
                <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                  <h6 class="mb-0 text-white">Pagos Este Año</h6>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">$0.00</h3>
                </div>
                <p class="text-white text-opacity-75 mb-2 text-sm mt-3">Total recaudado este año</p>
                <div class="progress" style="height: 7px">
                  <div
                    class="progress-bar bg-brand-color-3"
                    role="progressbar"
                    style="width: 0%"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="card table-card">
              <div class="card-header">
                <h5>Pagos Recientes</h5>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th>Residente</th>
                      <th>Unidad</th>
                      <th>Fecha de Pago</th>
                      <th>Estado</th>
                      <th>No. de Recibo</th>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-center text-muted py-4">Aún no hay pagos registrados</td>
                    </tr>
                  </table>
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

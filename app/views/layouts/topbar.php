<header class="pc-header">
  <div class="m-header">
    <a href="<?= BASE_URL ?>/dashboard/index" class="b-brand text-primary">
      <span class="text-white f-w-600" style="font-size: 20px; letter-spacing: 0.5px;">
        <i class="ph ph-buildings-duotone" style="vertical-align: -3px;"></i> ResidenciaNet
      </span>
    </a>
  </div>
  <div class="header-wrapper">
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ph ph-list"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ph ph-list"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item">
      
       <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="ph ph-magnifying-glass"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3" id="topbar-search-form">
          <div class="form-group mb-0 d-flex align-items-center">
            <input type="search" id="topbar-search-input" class="form-control border-0 shadow-none" placeholder="Buscar..." autocomplete="off" />
            <button type="button" class="btn btn-light-secondary btn-search" id="topbar-search-btn">Buscar</button>
          </div>
          <div id="topbar-search-results" class="list-group mt-2" style="display:none;"></div>
        </form>
      </div>
    </li>
  </ul>
</div>

<script>
  (function () {
    var BASE_URL = "<?= BASE_URL ?>";
    var secciones = [
      { label: "Dashboard", url: BASE_URL + "/dashboard/index" },
      { label: "Residentes", url: BASE_URL + "/residente/index" },
      { label: "Viviendas", url: BASE_URL + "/vivienda/index" },
      { label: "Pagos", url: BASE_URL + "/pago/index" },
      { label: "Reservas de Áreas Comunes", url: BASE_URL + "/reserva/index" },
      { label: "Visitantes", url: BASE_URL + "/visitante/index" },
      { label: "Comunicados", url: BASE_URL + "/comunicado/index" },
      { label: "Mantenimiento", url: BASE_URL + "/mantenimiento/index" }
    ];

    var input = document.getElementById('topbar-search-input');
    var resultsBox = document.getElementById('topbar-search-results');
    var btn = document.getElementById('topbar-search-btn');

    function coincidencias(texto) {
      texto = texto.trim().toLowerCase();
      if (!texto) return [];
      return secciones.filter(function (s) {
        return s.label.toLowerCase().indexOf(texto) !== -1;
      });
    }

    function renderResultados(lista) {
      resultsBox.innerHTML = '';
      if (lista.length === 0) {
        resultsBox.style.display = 'none';
        return;
      }
      lista.forEach(function (item) {
        var a = document.createElement('a');
        a.href = item.url;
        a.className = 'list-group-item list-group-item-action';
        a.textContent = item.label;
        resultsBox.appendChild(a);
      });
      resultsBox.style.display = 'block';
    }

    function irAlPrimero() {
      var lista = coincidencias(input.value);
      if (lista.length > 0) {
        window.location.href = lista[0].url;
      }
    }

    if (input) {
      input.addEventListener('input', function () {
        renderResultados(coincidencias(input.value));
      });
    }
    if (btn) {
      btn.addEventListener('click', irAlPrimero);
    }
    var form = document.getElementById('topbar-search-form');
    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        irAlPrimero();
      });
    }
  })();
</script>

<div class="ms-auto">
  <ul class="list-unstyled">
      <li class="dropdown pc-h-item header-user-profile">
      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
         <img src="<?= BASE_URL ?>/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
        <span><?= htmlspecialchars($_SESSION['user_name'] ?? 'Usuario') ?></span>      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                <div class="dropdown-body">
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
            <ul class="list-group list-group-flush w-100">
              <li class="list-group-item">
                <a href="<?= BASE_URL ?>/perfil/index" class="dropdown-item">
                    <span class="d-flex align-items-center">
                    <i class="ph ph-user-circle"></i>
                    <span>Editar perfil</span>
                  </span>
                </a>

              </li>

              <li class="list-group-item">
                <a href="<?= BASE_URL ?>/auth/logout" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph ph-power"></i>
                    <span>Cerrar sesión</span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
    </li>
  </ul>
</div>
 </div>
</header>
<header>
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-end">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#heladeria-nav" aria-controls="heladeria-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>          
          <div class="collapse navbar-collapse justify-content-center" id="heladeria-nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link <?php echo (strpos($_GET['c'], 'inicio') !== false) ? 'active' : '' ?>" href="?c=inicio">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo (strpos($_GET['c'], 'producto') !== false) ? 'active' : '' ?>" href="?c=productos">Productos</a>
              </li>
              <?php if ($sessionUser->role == 3) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo (strpos($_GET['c'], 'compras') !== false) ? 'active' : '' ?>" href="?c=compras">Compras</a>
                </li>
              <?php } ?>
              <?php if ($sessionUser->role == 1) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo (strpos($_GET['c'], 'usuario') !== false) ? 'active' : '' ?>" href="?c=usuarios">Usuarios</a>
                </li>
              <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-right">
              <?php if ($sessionUser->role == 3) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo (strpos($_GET['c'], 'carrito') !== false) ? 'active' : '' ?>" href="?c=carrito"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link <?php echo (strpos($_GET['c'], 'cerrarSesion') !== false) ? 'active' : '' ?>" href="?c=cerrar_sesion"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
              </li>                          
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
<div class="heladeria-login container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">      
      <form method="POST" action="?c=login">
        <div class="mb-3">
          <label for="username" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>  
        <?php if (isset($_SESSION["loginError"])) { ?>
          <p class="text-danger"><?php echo $_SESSION["loginError"] ?></p>
        <?php } ?>      
        <button class="primary-button" type="submit">Login</button>
        <a class="primary-button" type="button" href="?c=registrar">Registrarse</a>
      </form>
    </div>
  </div>
</div>
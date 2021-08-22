<div class="heladeria-agregar-usuario container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-productos-header">
        <p class="heladeria-productos-title">Agregar Usuario</p>
      </div>      
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <form method="POST" action="?c=agregar_usuario">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">Edad</label>
          <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Telefono</label>
          <input type="phone" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Dirección</label>
          <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" name="role" id="role">
            <option value="1">Admin</option>
            <option value="2">Editor</option>
            <option value="3">Cliente</option>
          </select>
        </div>
        <?php if (isset($_SESSION["agregarUsuarioError"])) { ?>
          <p class="text-danger"><?php echo $_SESSION["agregarUsuarioError"] ?></p>
        <?php } ?>   
        <button class="primary-button" type="submit">Guardar</button>
        <a class="primary-button" type="button" href="?c=usuarios">Cancelar</a>
      </form>
    </div> 
  </div>   
</div>
<div class="heladeria-agregar-usuario container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-productos-header">
        <p class="heladeria-productos-title">Modificar Usuario</p>
      </div>      
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <form method="POST" action="?c=update_usuario">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
          <small id="password" class="form-text text-muted">Dejar en blanco para no cambiar contraseña.</small>
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">Edad</label>
          <input type="number" class="form-control" id="age" name="age" value="<?php echo $user->age ?>">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Dirección</label>
          <textarea class="form-control" id="address" name="address"><?php echo $user->address ?></textarea>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Telefono</label>
          <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $user->phone ?>">
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" name="role" id="role">
            <option value="1" <?php echo $user->role == 1 ? 'selected="selected"' : "" ?>>Admin</option>
            <option value="2" <?php echo $user->role == 2 ? 'selected="selected"' : "" ?>>Editor</option>
            <option value="3" <?php echo $user->role == 3 ? 'selected="selected"' : "" ?>>Cliente</option>
          </select>
        </div>
        <input type="hidden" value="<?php echo $user->getElement("id") ?>" name="id">
        <?php if (isset($_SESSION["updateUsuarioError"])) { ?>
          <p class="text-danger"><?php echo $_SESSION["updateUsuarioError"] ?></p>
        <?php } ?>   
        <button class="primary-button" type="submit">Modificar</button>
        <a class="primary-button" type="button" href="?c=usuarios">Cancelar</a>
      </form>
    </div> 
  </div>   
</div>
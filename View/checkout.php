<div class="heladeria-agregar-usuario container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-productos-header">
        <p class="heladeria-productos-title">Informacion de Usuario</p>
      </div>      
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <form method="POST" action="?c=checkout">        
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $sessionUser->name ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $sessionUser->email ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Telefono</label>
          <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $sessionUser->phone ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Dirección</label>
          <textarea class="form-control" id="address" name="address"><?php echo $sessionUser->address ?></textarea>
        </div>        
        <input type="hidden" value="<?php echo $sessionUser->getElement("id") ?>" name="id">
        <?php if (isset($_SESSION["updateUsuarioError"])) { ?>
          <p class="text-danger"><?php echo $_SESSION["checkoutError"] ?></p>
        <?php } ?>   
        <button class="primary-button" type="submit">Finalizar</button>
        <a class="primary-button" type="button" href="?c=carrito">Cancelar</a>
      </form>
    </div> 
  </div>   
</div>
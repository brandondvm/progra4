<div class="heladeria-wrapper heladeria-carrito container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-carrito-header">
        <p class="heladeria-carrito-title">Carrito</p>
      </div>      
    </div>
  </div>
  
  <div class="row heladeria-carrito-lista">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <?php foreach($productos as $producto) { ?>
        <div class="heladeria-carrito-card card">
          <div class="card-body">
            <div class="row">
              <div class="col-6 heladeria-producto-info">
                <h1 class="heladeria-producto-nombre"><?php print_r($producto->name) ?></h1>
                <p><span>Precio:</span> $<?php print_r($producto->price) ?></p>
                <p><span>En stock:</span> <?php print_r($producto->stock) ?></p>
              </div>
              <div class="col-6">
                <form method="POST" action="?c=update_carrito">
                  <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <select class="form-select" name="cantidad" id="cantidad">
                      <?php for ($i = 1; $i <= $producto->stock; $i++) { ?>
                        <option value="<?php echo $i ?>" <?php echo $producto->cantidad == $i ? 'selected="selected"' : "" ?>><?php echo $i ?></option>
                      <?php } ?>
                      <input type="hidden" name="id" value="<?php echo $producto->getElement("id") ?>">
                      <input type="hidden" name="name" value="<?php echo $producto->getElement("name") ?>">
                      <input type="hidden" name="price" value="<?php echo $producto->getElement("price") ?>">
                      <input type="hidden" name="stock" value="<?php echo $producto->getElement("stock") ?>">
                    </select>
                  </div>
                  <button class="primary-button" type=submit>Actualizar</button>
                  <a class="primary-button" type="button" href="?c=delete_carrito&id=<?php echo $producto->getElement("id")?>">Eliminar</a>                  
                </form>
              </div>
            </div>            
          </div>
        </div>        
      <?php } ?>
      <?php if (empty($productos)) { ?>
        <div class="heladeria-empty-container">
          <i class="fa fa-warning" aria-hidden="true"></i>
          <h1>No hay productos en el carrito</h1>
        </div>
      <?php } ?>
    </div>    
  </div>  
  <?php if (!empty($productos)) { ?>
    <div class="row">
      <div class="col-xs-12 offset-lg-3 col-lg-6 heladeria-carrito-bottom">
        <p class="heladeria-total"><span>Total: </span>$<?php echo $total ?></p>
        <div>
          <a class="primary-button" type="button" href="?c=productos">Ver Productos</a>
          <a class="primary-button" type="button" href="?c=checkout">Proceder Checkout</a>
        </div>
      </div>    
    </div>
  <?php } ?>
</div>
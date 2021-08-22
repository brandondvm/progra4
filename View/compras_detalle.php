<div class="heladeria-wrapper heladeria-carrito container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-carrito-header">
        <p class="heladeria-carrito-title">Compra Detalles</p>
      </div>      
    </div>
  </div>

  <div class="row heladeria-carrito-info">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <p><span>Fecha:</span> <?php echo $orden->date ?></p>
      <p><span>Dirección de Entrega:</span> <?php echo $orden->address ?></p>
      <p></p>
    </div>
  </div>
  
  <div class="row heladeria-carrito-lista">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <p class="heladeria-carrito-title">Productos:</p>
      <?php foreach($productos as $producto) { ?>
        <div class="heladeria-carrito-card card">
          <div class="card-body">
            <h1 class="heladeria-producto-nombre"><?php print_r($producto->name) ?></h1>
            <p><span>Precio:</span> $<?php print_r($producto->price) ?></p>
            <p><span>Cantidad:</span> <?php print_r($producto->cantidad) ?></p>
            <p><span>Total:</span> $<?php print_r($producto->cantidad * $producto->price) ?></p>
          </div>
        </div>        
      <?php } ?>      
    </div>    
  </div>

  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6 heladeria-carrito-bottom">
      <p class="heladeria-total"><span>Total: </span>$<?php echo $total ?></p>
      <a class="primary-button" type="button" href="?c=compras">Cerrar</a>
    </div>    
  </div>
</div>
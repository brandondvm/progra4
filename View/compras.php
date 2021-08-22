<div class="heladeria-wrapper heladeria-compras container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-usuarios-header">
        <p class="heladeria-usuarios-title">Compras - <?php echo $sessionUser->name ?></p>
      </div>      
    </div>
  </div>  
  
  <div class="row heladeria-compras-lista">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <?php foreach($compras as $compra) { ?>
        <div class="heladeria-compras-card card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="card-title"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $compra->date ?></h5>
                <p class="card-text"><span>Dirección de Entrega:</span> <?php echo $compra->address ?></p>
              </div>
              <div class="col-6 heladeria-compras-details">
                <a class="heladeria-producto-option heladeria-producto-delete" href="?c=compras_detalle&id=<?php echo $compra->getElement("id")?>"><i class="fa fa-list" aria-hidden="true"></i></a>
              </div>
            </div>            
          </div>
        </div>
      <?php } ?>
      <?php if (empty($compras)) { ?>
        <div class="heladeria-empty-container">
          <i class="fa fa-warning" aria-hidden="true"></i>
          <h1>No hay compras realizadas!</h1>
        </div>
      <?php } ?>
    </div>    
  </div>  
</div>
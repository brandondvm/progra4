<div class="heladeria-wrapper heladeria-productos container">
  <div class="row">
    <div class="col-12">
      <div class="healderia-productos-header">
        <p class="heladeria-productos-title">Productos</p>
        <a class="primary-button" href="?c=agregar_producto">Agregar</a>
      </div>      
    </div>
  </div>

  <?php if (!empty($productos)) { ?>
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="heladeria-productos-filter">
          <form method="POST" action="?c=productos">
            <input type="text" role="submit" class="form-control" id="filter" name="filter" value="<?php echo $_SESSION['filter'] ?>" placeholder="Buscar por nombre">
            <button type="submit" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a class="search-btn-clear" href="?c=productos"><i class="fa fa-close" aria-hidden="true"></i></a>
          </form>
        </div>      
      </div>
    </div>
  <?php } ?>
  
  <div class="row heladeria-productos-lista g-4">
    <?php foreach($productos as $producto) { ?>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="heladeria-producto-lista-item">
          <div class="row">
            <div class="col-6 producto-informacion">
              <h2><?php echo $producto->name ?></h2>

              <?php if ($producto->stock < 5 && $producto->stock > 0) { ?>
                <p class="heladeria-producto-precaucion">Pocas unidades</p>
              <?php } else if ($producto->stock == 0) { ?>
                <p class="heladeria-producto-agotado">Agotado</p>
              <?php } ?>

              <p class="producto-stock"><span>En stock:</span> <?php echo $producto->stock ?></p>
              <div class="heladeria-producto-options">
                <a class="heladeria-producto-option heladeria-producto-view" href="?c=producto&id=<?php echo $producto->getElement("id")?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php if ($sessionUser->role != 3) { ?>
                  <a class="heladeria-producto-option heladeria-producto-edit" href="?c=update_producto&id=<?php echo $producto->getElement("id")?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a class="heladeria-producto-option heladeria-producto-delete" href="?c=delete_producto&id=<?php echo $producto->getElement("id")?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
                <?php } ?>                
              </div>              
            </div>
            <div class="col-6 heladeria-producto-img-container">
              <img class="producto-img" src="./img/productos/producto_placeholder.jpeg" alt="<?php echo $producto->name ?>">
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if (empty($productos)) { ?>
      <div class="heladeria-empty-container">
        <i class="fa fa-warning" aria-hidden="true"></i>
        <h1>No hay productos en el catalogo</h1>
      </div>
    <?php } ?>
  </div>  
</div>
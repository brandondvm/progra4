<div class="heladeria-wrapper container">
  <div class="row heladeria-producto">
    <!-- Producto Galeria -->
    <div class="col-sm-12 col-md-6 heladeria-producto-galeria">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-8">
          <div id="carousel-producto" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel-producto">
            <div class="carousel-inner">
              <div class="carousel-item active"></div>
              <div class="carousel-item"></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-producto" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-producto" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Producto Informacion -->
    <div class="col-sm-12 col-md-6 heladeria-producto-informacion">
      <h1><?php echo $producto->name ?></h1>

      <?php if ($producto->stock < 5 && $producto->stock > 0) { ?>
        <p class="heladeria-producto-precaucion">Pocas unidades</p>
      <?php } else if ($producto->stock == 0) { ?>
        <p class="heladeria-producto-agotado">Agotado</p>
      <?php } ?>

      <p class="helado-producto-descripcion"><?php echo $producto->description ?></p>
      <p class="helado-producto-label"><span>Precio:</span> $<?php echo $producto->price ?></p>
      <p class="helado-producto-label"><span>En stock:</span> <?php echo $producto->stock ?></p>

      <?php if ($sessionUser->role == 3) { ?>
        <form method="POST" action="?c=agregar_carrito">
          <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <select class="form-select" name="cantidad" id="cantidad">
              <?php for ($i = 1; $i <= $producto->stock; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
          <input type="hidden" name="id" value="<?php echo $producto->getElement("id") ?>">
          <input type="hidden" name="name" value="<?php echo $producto->getElement("name") ?>">
          <input type="hidden" name="price" value="<?php echo $producto->getElement("price") ?>">
          <input type="hidden" name="stock" value="<?php echo $producto->getElement("stock") ?>">
          <button class="primary-button" type=submit>Agregar al carrito</button>
          <a class="primary-button" type="button" href="?c=productos">Cancelar</a>
        </form>
      <?php } ?>

      <?php if ($sessionUser->role != 3) { ?>
        <a class="primary-button" type="button" href="?c=update_producto&id=<?php echo $producto->getElement("id")?>">Editar</a>
        <a class="primary-button" type="button" href="?c=delete_producto&id=<?php echo $producto->getElement("id")?>">Eliminar</a>
        <a class="primary-button" type="button" href="?c=productos">Cancelar</a>
      <?php } ?>
      
    </div>
  </div>    
</div>
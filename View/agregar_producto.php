<div class="heladeria-agregar-producto container">
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <div class="healderia-productos-header">
        <p class="heladeria-productos-title">Agregar Producto</p>
      </div>      
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 offset-lg-3 col-lg-6">
      <form method="POST" action="?c=agregar_producto">
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Descripcion</label>
          <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Precio</label>
          <input type="number" class="form-control" id="price" name="price">
        </div>
        <button class="primary-button" type="submit">Guardar</button>
        <a class="primary-button" type="button" href="?c=productos">Cancelar</a>
      </form>
    </div> 
  </div>   
</div>
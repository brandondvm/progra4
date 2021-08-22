<?php
  if ($_POST) {
    include "Model/producto.php";
    $new_producto = new Producto($_POST['name'], $_POST['description'], $_POST['stock'], $_POST['price']);
    
    if ($new_producto->insert()) {
      header("Location: /heladeria/?c=productos");
    } else {
      echo "no se guardo el producto";
    }
  } else {
    include "View/agregar_producto.php";
  }
<?php
  include "Model/producto.php";
  if (isset($_GET['id'])) {
    $producto = new Producto("", "", 0, 0, $_GET['id']);    
    $producto->setId($_GET['id']);
    $producto->delete($_GET['id']);
    header("Location: /heladeria/?c=productos");
  }

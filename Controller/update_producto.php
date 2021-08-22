<?php
  include "Model/producto.php";

  if ($_POST) {
    $producto = new Producto($_POST['name'], $_POST['description'], $_POST['stock'], $_POST['price'], $_POST['id']);
    $producto->update();
    header("Location: /heladeria/?c=productos");
    exit();
  } else {
    $producto = new Producto();
    $producto = array_shift($producto->select($_GET['id']));
    include "View/update_producto.php"; 
  }
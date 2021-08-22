<?php
  include "Model/producto.php";

  if ($sessionUser->email == "") {
    header("Location: /heladeria/?c=login");    
    exit();
  }

  $producto = new Producto();

  if ($_POST['filter']) {
    $_SESSION['filter'] = $_POST['filter'];    
    $productos = $producto->selectProductsByName($_SESSION['filter']);    
  } else {
    unset($_SESSION['filter']);
    $productos = $producto->select();
  }  

  include "View/productos.php";
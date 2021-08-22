<?php  
  include "Model/producto_carrito.php";

  if ($sessionUser->email == "") {
    header("Location: /heladeria/?c=login");
    exit();
  }

  if ($_GET) {
    $total = 0;
    $productos = array();
    foreach($_SESSION["carrito"] as $producto) {
      $unserializedProduct = unserialize($producto);
      $productos[] = $unserializedProduct;
      $total += $unserializedProduct->price * $unserializedProduct->cantidad;
    }
    include "View/carrito.php";
  } 

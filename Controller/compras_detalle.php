<?php
  include "Model/orden.php";
  $orderID = $_GET['id'];
  $compra = new Orden();
  $total = 0;
  $orden = array_shift($compra->select($orderID));
  $productos = $orden->selectOrderProducts($orderID);  
  foreach($productos as $producto) $total += $producto->price * $producto->cantidad;
  include "View/compras_detalle.php";
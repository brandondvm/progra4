<?php
  include 'Model/producto.php';
  $producto = new Producto();
  $producto = $producto->select($_GET['id'])[0];
  include "View/producto.php";
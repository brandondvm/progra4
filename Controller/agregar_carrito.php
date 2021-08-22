<?php
  include "Model/producto_carrito.php";
  if ($_POST) {
    $productoCarrito = new ProductoCarrito($_POST['id'], $_POST['name'], $_POST['price'], $_POST['cantidad'], $_POST['stock']);
    $productoCarritoId = $productoCarrito->getElement("id");
    if (empty($_SESSION['carrito'])) $_SESSION['carrito'] = array();
    $_SESSION['carrito'][$productoCarritoId] = serialize($productoCarrito);
    header("Location: /heladeria/?c=carrito");
  }
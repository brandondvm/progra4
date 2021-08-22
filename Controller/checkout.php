<?php
  include "Model/orden.php";

  if ($_POST) {
    $orden = new Orden(date("Y-m-d"), $_POST['address'], $sessionUser->getElement("id"));
    $newOrdenId = $orden->insert();
    if ($newOrdenId) {
      foreach($_SESSION["carrito"] as $producto) {
        $unserializedProduct = unserialize($producto);
        $orden->insertOrdenProducto($newOrdenId, $unserializedProduct->getElement("id"), $unserializedProduct->cantidad);
      }
      unset($_SESSION["carrito"]);
      header("Location: /heladeria/?c=gracias");
    }
  } else {
    include "View/checkout.php"; 
  }
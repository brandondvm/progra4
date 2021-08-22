<?php
  include "Model/orden.php";

  if ($sessionUser->email == "") {
    header("Location: /heladeria/?c=login");
    exit();
  }

  $compra = new Orden();
  $compras = $compra->selectByUserId($sessionUser->getElement("id"));
  include "View/compras.php";
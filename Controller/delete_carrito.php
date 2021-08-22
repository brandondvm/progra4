<?php
  if (isset($_GET['id'])) {
    unset($_SESSION["carrito"][$_GET['id']]);
    header("Location: /heladeria/?c=carrito");
  }
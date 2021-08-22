<?php
  include "Model/usuario.php";
  if (isset($_GET['id'])) {
    $user = new Usuario("", "", "", 0, "", 1, $_GET['id']);    
    $user->setId($_GET['id']);
    $user->delete($_GET['id']);
    header("Location: /heladeria/?c=usuarios");
  }

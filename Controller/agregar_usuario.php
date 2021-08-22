<?php
  session_start();
  if ($_POST) {
    include "Model/usuario.php";
    $new_user = new Usuario($_POST['email'], $_POST['name'], $_POST['address'], $_POST['age'], $_POST['password'], $_POST['phone'], $_POST['role']);
    
    if ($new_user->insert()) {
      unset($_SESSION["registroError"]);
      header("Location: /heladeria/?c=usuarios");
    } else {
      $_SESSION["registroError"]="Error: Hubo un error al agregar nuevo usuario.";  
      header("Location: /heladeria/?c=agregar_usuario");
    }
  } else {
    include "View/agregar_usuario.php";
  }
<?php
  session_start();
  if ($_POST) {
    if ($_POST['password'] === $_POST['confirm-password']) {
      include "Model/usuario.php";
      $user = new Usuario($_POST['email'], $_POST['name'], $_POST['address'], $_POST['age'], $_POST['password'], $_POST['phone'], 3);
      if ($user->insert()) {
        unset($_SESSION["registroError"]);
        header("Location: /heladeria/?c=login");
      } else {
        $_SESSION["registroError"]="Error: Hubo un error al registrar nuevo usuario.";  
        header("Location: /heladeria/?c=registrar");
      }
    } else {
      $_SESSION["registroError"]="Error: Contraseñas deben ser las mismas.";  
      header("Location: /heladeria/?c=registrar");
    }
  } else {
    include "View/registrar.php";
  }

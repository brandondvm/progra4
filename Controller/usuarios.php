<?php  
  include "Model/usuario.php";

  if ($sessionUser->email == "") {
    header("Location: /heladeria/?c=login");
    exit();
  }

  if ($sessionUser->role == 1) {
    $user = new Usuario();
    $users = $user->select();
    include "View/usuarios.php";
  } else {
    header("Location: /heladeria/?c=inicio");
  }
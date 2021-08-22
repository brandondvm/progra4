<?php
  session_start();
  include "Model/usuario.php";

  if ($_POST) {
    $new_user = new Usuario($_POST['email'], $_POST['name'], $_POST['address'], $_POST['age'], $_POST['password'], $_POST['phone'], $_POST['role'], $_POST['id']);
    if ($new_user->update()) {
      unset($_SESSION["updateUsuarioError"]);
      header("Location: /heladeria/?c=usuarios");
      exit();
    } else {
      $_SESSION["updateUsuarioError"]="Error: Hubo un error al modificar usuario.";  
      header("Location: /heladeria/?c=update_usuario&id=".$_POST['id']);
    }
  } else {
    $user = new Usuario();
    $user = array_shift($user->select($_GET['id']));
    include "View/update_usuario.php"; 
  }
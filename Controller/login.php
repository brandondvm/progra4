<?php  
  unset($_SESSION["registroError"]);
  
  if ($_POST) {    
    include "Model/login.php";    
    $login = new Login($_POST['username'], $_POST['password']);
    $user = $login->login();

    if ($user->email != "") {                
      $_SESSION["user"] = serialize($user);
      unset($_SESSION["loginError"]);
      header("Location: /heladeria/?c=inicio");
    } else {
      $_SESSION["loginError"]="Error: Credenciales incorrectas.";  
      header("Location: /heladeria/?c=login");
    }
  } else {
    include "View/login.php";
  }
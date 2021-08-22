<?php  
  if ($sessionUser->email == "") {
    header("Location: /heladeria/?c=login");
    exit();
  }

  include "View/inicio.php";

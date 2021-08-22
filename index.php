<!DOCTYPE html>
<html>
  <head>
    <title>Heladeria ULATINA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vendor -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="./styles/registrar.css">
    <link rel="stylesheet" href="./styles/inicio.css">
    <link rel="stylesheet" href="./styles/productos.css">
    <link rel="stylesheet" href="./styles/producto.css">
    <link rel="stylesheet" href="./styles/compras.css">
    <link rel="stylesheet" href="./styles/usuarios.css">
    <link rel="stylesheet" href="./styles/agregar_producto.css">
    <link rel="stylesheet" href="./styles/carrito.css">
    <link rel="stylesheet" href="./styles/gracias.css">
    <link rel="stylesheet" href="./styles/404.css">
  </head>
  <body id="heladeria">    
    <?php
      include "Model/sesion.php";  
      session_start();
      $sessionUser = unserialize($_SESSION["user"]);
      
      if ($_GET['c'] !== "login" && $_GET['c'] !== "registrar") include "View/navbar.php";

      if (isset($_GET['c'])) {
        $file_name = "Controller/".$_GET['c'].".php";
        if (file_exists($file_name)) {
          include $file_name;
        } else {
          include "View/404.php";
        }
      } else {
        include "Controller/login.php";
      }

      include "View/footer.php";
    ?>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>

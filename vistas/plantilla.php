<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   CRUD
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />  
  <link rel="stylesheet" href="vistas/assets/css/all.css">
  <!-- CSS Files -->
  <link href="vistas/assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
  <link href="vistas/assets/demo/demo.css" rel="stylesheet" />
    <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
            include "modulos/shared/filesJs.php";
            echo '
            </head>
            <body class="">
                <div class="wrapper">';
                    include "modulos/shared/sidebarmenu.php";
                    echo '
                    <div class="main-panel">';
                        include "modulos/shared/navbar.php";
                        echo '
                        <div class="content">
                            <div class="content">
                                <div class="container-fluid">';
                                    if (isset($_GET["ruta"])) {
                                        if($_GET["ruta"] == "inicio" ||
                                            $_GET["ruta"] == "usuarios" ||
                                            $_GET["ruta"] == "categorias" ||
                                            $_GET["ruta"] == "productos" ||         
                                            $_GET["ruta"] == "salir"){
                                                include "modulos/".$_GET["ruta"].".php";
                                            } else {
                                                include "modulos/404.php";
                                            }   
                                        } else {
                                            include "modulos/inicio.php";
                                        }
                                    echo '
                                    </div>
                                </div>
                            </div>';
                        include "modulos/shared/footer.php";
                    echo '
                    </div>
                </div>
                <script src="vistas/js/activarMenuRutas.js"></script>                 
                <script src="vistas/js/categorias.js"></script>
                <script src="vistas/js/productos.js"></script>     
                <script src="vistas/js/usuarios.js"></script> 
                
                ';
            } else {
            include "modulos/login.php";
        }
    ?>
            
    </body>
</html>





<!DOCTYPE html>
<html lang="es">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="vistas/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="vistas/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard PRO by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!-- CSS Files -->
  <link href="vistas/assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="vistas/assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="vistas/assets/css/all.css">
  <?php include "shared/filesJsLogin.php";?>


</head>

<body class="off-canvas-sidebar">
  <!-- Extra details for Live View on GitHub Pages -->

  <!-- Navbar -->
  <?php include "shared/navbarLogin.php"; ?>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
 
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('vistas/assets/img/bg-pricing.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form method="post">
              <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Login</h4>
                </div>
                <div class="card-body ">
                  <p class="card-description text-center">ingrese sus datos</p>
                 
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="username" placeholder="Nombre de usuario">
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control" name="password" placeholder="Su contraseña">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-info btn-block">
                    <i class="fas fa-sign-in-alt"></i> Ingresar
                  </button>
                </div>
              </div>

              <?php 
                $loginUsuario = new ControladorUsuarios();
                $loginUsuario->loginUsuario();
              ?>
            </form>
          </div>
        </div>
      </div>
      <?php include "shared/footerLogin.php"; ?>
    </div>
  </div>
</body>

</html>

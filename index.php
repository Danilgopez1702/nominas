<?php
session_start();
if (!empty($_SESSION['active'])) {
  if($_SESSION['aa'] == "jefe"){
    header('location: admin/');
  }else{
    header('location: usuarios/');
  }

  } else {
		if (!empty($_POST)) {
	  		if (empty($_POST['usuario']) || empty($_POST['clave'])) {
				$alert = '<div class="alert alert-danger" role="alert">Ingrese su usuario y su contraseña</div>';
			} else{
				require_once "incluid/conexion/conexion.php";		
        $user = $_POST['usuario'];
        $clave = $_POST['clave'];
			  $query = mysqli_query($con, "SELECT `id_usuario`, `usuario`, `pass`, `area` FROM `usuario`  WHERE usuario = '$user' AND pass = '$clave'");
			  mysqli_close($con);
			  $resultado = mysqli_num_rows($query);

			  if ($resultado > 0) {
					$dato = mysqli_fetch_array($query);
					$_SESSION['active'] = true;
					$_SESSION['nn'] = $dato['usuario'];
					$_SESSION['aa'] = $dato['area'];

          if($_SESSION['aa'] == "jefe"){
            header('location: admin/');
          }else{
            header('location: usuarios/');
          }
				
			  } else {
					$alert = '<div class="alert alert-danger" role="alert"> Usuario o Contraseña Incorrecta </div>';
					session_destroy();
			  }
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendientes DN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="incluid/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="incluid/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="incluid/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="incluid/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
              <?php if(isset ($alert)){  
                echo $alert;} ?>
                <h3 class="card-title text-left mb-3">Inicio de Sesión</h3>
                <form class="user" method="POST">
                  <div class="form-group">
                    <label>Usuario *</label>
                    <input type="text" name= "usuario" id = "usuario" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name = "clave" id = "clave" class="form-control p_input">
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="incluid/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="incluid/assets/js/off-canvas.js"></script>
    <script src="incluid/assets/js/hoverable-collapse.js"></script>
    <script src="incluid/assets/js/misc.js"></script>
    <script src="incluid/assets/js/settings.js"></script>
    <script src="incluid/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
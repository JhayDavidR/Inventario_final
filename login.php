<?php
	include('sistema/logica/login.php'); // Incluye archivo del login
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso Inventario Cafeteria</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="media/css/boostrap-admin/sb-admin-2.min.css">
	<script src="sistema/js/libs/kitawesome.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="media/img/ventas.png" type="image/x-icon">
</head>
<style> 
 .bg-gradient-primari{
        background:black;
    }
#mostrar{
    cursor: pointer;
    width: 30px;
	height: 30px;
    position: absolute;
    z-index: 20;
	top: 175px;
    right:70px;
}

</style>
<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>
                                    <form method="POST" action="#" class="user">
                                        <div class="form-group div">
                                            <input type="text" name="tblusuario_nombreUsuario" class="form-control form-control-user" autocomplete="off" placeholder="Ingresa el correo electronico">
                                        </div>
                                        <div class="form-group div">
                                            <input type="password" name="tbl_usuario_Clave"  class="form-control form-control-user" autocomplete="off" id="contraseña" placeholder="Ingresa el usuario">
						                     <img src="media/img/mostrar1.png" id="mostrar">
                                        </div>
										<input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Login">
         
                                        <hr>
										<div class="clear"></div>
											<span><?php echo $error; ?></span>
										</div>	
                                   
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <link href="media/js/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core JavaScript-->
    <script src="media/js/vendor/jquery/jquery.min.js"></script>
    <script src="media/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="media/js/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="media/js/boostrap/sb-admin-2.min.js"></script>

</body>
<script>
 var mostrar = document.getElementById('mostrar');
 var input = document.getElementById('contraseña');

 mostrar.addEventListener('click', mostrarContraseña);

 function mostrarContraseña(){
     if(input.type == "password"){
         input.type = "text";
         mostrar.src = "media/img/ocultar1.png";
         setTimeout("ocultar()", 10000);
     }else{
        input.type = "password";
        mostrar.src = "media/img/mostrar1.png";
     }
 }
 function ocultar(){
        input.type = "password";
        mostrar.src = "media/img/mostrar1.png";
 }
</script>
</html>

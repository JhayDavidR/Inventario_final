<?php

        include('../config/session.php');
        include('../config/conexion.php');


    
    if(!empty($_POST))
	{
		$idusuario = $_POST['idusuario'];
		$query_delete = mysqli_query($con, "DELETE FROM tblusuario WHERE TerId = $idusuario");
		if($query_delete){
			header('location: listado_usuarios.php');
		}else{
			echo"Error al eliminar el usuario";
		}
	}

    if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1)
    {
        header('location: listado_usuarios.php');
    }else{
	
		$idusuario = $_REQUEST['id'];

		$query = mysqli_query($con, "SELECT u.tbl_usuario_Nombres, 
                                            u.tbl_usuario_Apellidos, 
                                            u.tblusuario_nombreUsuario
											FROM tblusuario u
											WHERE u.TerId = $idusuario");
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)){ 
				$nombres = $data['tbl_usuario_Nombres'];
                $apellidos = $data['tbl_usuario_Apellidos'];
				$usuario = $data['tblusuario_nombreUsuario'];
			}
		}else{
			header('location: listado_usuarios.php');
		}
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../media/css/crear-usuario.css">
    <title>SALE</title>
 

    <!-- Custom styles for this template-->

    <style> 
    .bg-gradient-primari{
        background:black;
    }
    #mostrar{
    cursor: pointer;
    width: 25px;
	height: 25px;
    position: absolute;
    z-index: 20;
	top: 7px;
    right:15px;
}

</style> 
    <?php
           
    ?>
</head>

 
        <?php
            include '../sistema/scripts.php';
        ?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primari sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php
                include '../sistema/includes/menuSupIzquierdo.php';
            ?>
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <?php
                    include '../sistema/includes/header.php';
                ?>

                </nav>

                <div class="container-fluid">

                <!-- End of Topbar -->
               </div>
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <?php
                include '../sistema/includes/footer.php';
                ?>
            </footer>
            <!-- End of Footer -->

        </div>
        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    </div>
<!-- Fin Opciones Inventario-->


</body>

<script type="text/javascript">
		Swal.fire({
		title: '<strong>¿Esta seguro de Eliminar el siguiente usuario?</strong>',
		icon: 'warning',
		html:
			'<form method="POST"class="delete" action=""> <p>Nombre: <span><?php echo $nombres; ?> <?php echo $apellidos; ?> <p>Usuario: <span><?php echo $usuario; ?>  <input type="hidden" name="idusuario" value="<?php echo $idusuario;?>"> <br></input> <br><button type="submit" value="Actualizar" class="btn btn-primary"> Eliminar</button> <a href="listado_usuarios.php" class="btn btn-danger">Cancelar</a></form>	' +
			'',
		focusConfirm: false,
        allowOutsideClick: false,
		showConfirmButton: false
		})
</script>


</html>
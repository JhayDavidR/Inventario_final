<?php 
    include('../config/session.php');
    include('../config/conexion.php');
      // valida si el usuario tiene permisos concedidos
	$estadoQsql = $con->query("SELECT FK_tbl_usuario_tblestado FROM tblusuario WHERE tblusuario_nombreUsuario = '".$_SESSION['userRegistrado']."'");

    $filaP = mysqli_fetch_row($estadoQsql);
    $estado = $filaP[0];
    if($estado != 1) {
        header("location: alerta.php");
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
   
    <title>SALE</title>


    <!-- Custom styles for this template-->

    <style> 
    .bg-gradient-primari{
        background:black;
    }
    #close{
        border-radius: 100%;
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                   
                    </div>
    
                <!-- End of Topbar -->
                <div class="row" style="justify-content:center;">
                <?php if ($_SESSION['perfilesInCa'] == 'Administrador') { ?>
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-square fa-stack-2x text-dark"></i>
                                <i class="fa fa-users fa-stack-1x fa-inverse"></i>|
                                </span>
                            </div>
                            <h4 class="card-header">Gestión de Usuarios</h4>
                            <div class="card-body">
                                <p class="card-text">Usuarios</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_usuarios/listado_usuarios" class="btn btn-primary" data-pushbar-target="pushbar-op-eventos"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
  
                        <?php } ?>

             <?php if ($_SESSION['perfilesInCa'] == 'Administrador' || $_SESSION['perfilesInCa'] == 'Vendedor') { ?>
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-square fa-stack-2x text-dark"></i>
                                <i class="fa fa-tools fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h4 class="card-header">Gestión de Productos</h4>
                            <div class="card-body">
                                <p class="card-text">Productos</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_ventas/listado_productos" class="btn btn-primary" data-pushbar-target="pushbar-op-inventario"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                        <?php } ?>

                     <?php if ($_SESSION['perfilesInCa'] == 'Administrador' || $_SESSION['perfilesInCa'] == 'Vendedor') { ?>
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-square fa-stack-2x text-dark"></i>
                                <i class="fa fa-money-check fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>Gestion de Ventas</h4>
                            <div class="card-body">
                                <p class="card-text">Ventas</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_ventas/listado_ventas" class="btn btn-primary" data-pushbar-target="pushbar-mesa-ayuda"> <i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                        <?php } ?>
               
              
   
                </div>

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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!--  Opciones Gestion de Usuarios-->
    <div data-pushbar-id="pushbar-op-eventos" data-pushbar-direction="top" class="pusbar-reporting">   

    <div class="container-boxes" style="color:#000;padding:5%;">
                <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-house-user fa-stack-2x text-dark"></i>
                                </span>
                            </div>
                            <h4 class="card-header">Crear Usuario</h4>
                            <div class="card-body">
                                <p class="card-text">Esta opción permite crear usuarios dentro del sistema de ventas</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_usuarios/crear_usuario.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-user-alt fa-stack-2x text-dark"></i>
                          
                                </span>
                            </div>
   
                            <h4 class="card-header">Listado Usuarios</h4>
                            <div class="card-body">
                                <p class="card-text">Esta opción permite visualizar los usuarios que estan registrados en el sistema</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_usuarios/listado_usuarios.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
               

    </div>

            <button data-pushbar-close><span class="icon-cancel-circle" id="close"></span></button>
    </div>
<!-- Fin Opciones Gestion de Usuarios-->


<?php
  /* Trae el ultimo registro creado */
  $traerDatos = "SELECT max(ProvId) FROM tblproveedor";
  $ver = $con->query($traerDatos) or die ("No se obtuvieron datos en la consulta");

  if ($row = mysqli_fetch_row($ver)) {
      $id = $row[0];
  }
  /* Trae el ultimo registro creado */
  $traerDatosUno = "SELECT max(ProId) FROM tblproducto";
  $verUno = $con->query($traerDatosUno) or die ("No se obtuvieron datos en la consulta");

  if ($rowUno = mysqli_fetch_row($verUno)) {
      $idUno = $rowUno[0];
  }
?>

    <!--  Opciones Inventario-->
    <div data-pushbar-id="pushbar-op-inventario" data-pushbar-direction="top" class="pusbar-reporting">   

    <div class="container-boxes" style="color:#000;padding:5%;">
            
         
                        
                    <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-sort-amount-down fa-stack-2x text-dark"></i>
                          
                                </span>
                            </div>
                            <h4 class="card-header">Stock Productos</h4>
                            <div class="card-body">
                                <p class="card-text">Productos Registrados: <?php echo $idUno?></p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_compra_productos_proveedor/compra_proveedor.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-users-cog fa-stack-2x text-dark"></i>
                          
                                </span>
                            </div>
                            <h4 class="card-header">Proveedores</h4>
                            <div class="card-body">
                                <p class="card-text">Esta opción permite registrar todo lo relacionado a registro de Equipos</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary" data-pushbar-target="pushbar-op-proveedores"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
     
    </div>

            <button data-pushbar-close><span class="icon-cancel-circle" id="close"></span></button>
    </div>
<!-- Fin Opciones Inventario-->


   <!--  Opciones Proveedor-->
   <div data-pushbar-id="pushbar-op-proveedores" data-pushbar-direction="top" class="pusbar-reporting">   

<div class="container-boxes" style="color:#000;padding:5%;">
            <div class="col-lg-4 mb-4 text-lg-center">
                        <div class="card h-100">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                            <i class="fa fa-tools fa-stack-2x text-dark"></i>
                            </span>
                        </div>
                        <h4 class="card-header">Añadir Proveedor</h4>
                        <div class="card-body">
                            <p class="card-text">Proveedores registrados: <?php echo $id?></p>
                        </div>
                        <div class="card-footer">
                            <a href="../crud_compra_productos_proveedor/crear_proveedor.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                        </div>
                        </div>
                    </div>
     
                    
                    <div class="col-lg-4 mb-4 text-lg-center">
                        <div class="card h-100">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                            <i class="fa fa-tv fa-stack-2x text-dark"></i>
                      
                            </span>
                        </div>
                        <h4 class="card-header">Lista Proveedores</h4>
                        <div class="card-body">
                            <p class="card-text">Esta opción permite visualizar los proveedores registrador</p>
                        </div>
                        <div class="card-footer">
                            <a href="../crud_compra_productos_proveedor/listado_proveedor.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                        </div>
                        </div>
                    </div>
 
</div>

        <button data-pushbar-close><span class="icon-cancel-circle" id="close"></span></button>
</div>
<!-- Fin Opciones Proveedor-->


    <!--  Opciones Mesa de Ayuda-->
    <div data-pushbar-id="pushbar-mesa-ayuda" data-pushbar-direction="top" class="pusbar-reporting">   


        <div class="container-boxes" style="color:#000;padding:5%;">
        <?php if ($_SESSION['perfilesInCa'] == 'Administrador' || $_SESSION['perfilesInCa'] == 'Supervisor') { ?>
                <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-tools fa-stack-2x text-dark"></i>
                                </span>
                            </div>
                            <h4 class="card-header">Realizar Solicitud</h4>
                            <div class="card-body">
                                <p class="card-text">Solicitud Realizada: </p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_mesa_ayuda/crear_solicitud.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
     <?php } ?>
    <?php if ($_SESSION['perfilesInCa'] == 'Administrador') { ?>               
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-tv fa-stack-2x text-dark"></i>
                          
                                </span>
                            </div>
                            <h4 class="card-header">Lista Solicitudes</h4>
                            <div class="card-body">
                                <p class="card-text">Esta opción permite visualizar las Solicitudes realizadas</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_mesa_ayuda/tabla_solicitudes.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                        <?php } ?>
    <?php if ($_SESSION['perfilesInCa'] == 'Tecnico') { ?>               
                        <div class="col-lg-4 mb-4 text-lg-center">
                            <div class="card h-100">
                            <div class="panel-heading">
                                <span class="fa-stack fa-5x">
                                <i class="fa fa-tv fa-stack-2x text-dark"></i>
                          
                                </span>
                            </div>
                            <h4 class="card-header">Lista Solicitudes Pendientes</h4>
                            <div class="card-body">
                                <p class="card-text">Esta opción permite visualizar las Solicitudes realizadas</p>
                            </div>
                            <div class="card-footer">
                                <a href="../crud_mesa_ayuda/tabla_solicitudes_Asig.php" class="btn btn-primary"><i class="fa fa-share-square"></i> Acceder</a>
                            </div>
                            </div>
                        </div>
                        <?php } ?>
     
    </div>


            <button data-pushbar-close><span class="icon-cancel-circle" id="close"></span></button>
    </div>
    <!--  Opciones Ventas-->


</body>



<script type="text/javascript">
    const pushbar = new Pushbar({
          blur:true,
          overlay:true,
        });
</script>


	<script>
        Swal.fire({
        title: "Bienvenido/a!",
        html:'<h3 class="user"></h3>',
        timer:3000,
        timerProgressBar:true,
        confirmButtonText: 'Aceptar'
        });
    </script>

</html>
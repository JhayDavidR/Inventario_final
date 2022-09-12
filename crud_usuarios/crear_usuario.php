<?php 
    include('../config/session.php');
    include('../config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
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
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Registrar Usuario</h1>
                   
                </div>
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <a href="listado_usuarios.php" class="btn btn-info"> <span class="icon-users"></span> Listado Usuarios</a> 
                   
                </div>
                <!-- End of Topbar -->
                <div class="row">
                <section>
                    <div id="formulario_usuario">
                            <hr>

                            <form action="" method="post" id="form_crear_usuario" name="form_crear_usuario">
                                <input type="hidden" name="dia" id="dia" value="" readonly> <!-- Muestra el dia actual -->
                                <input type="hidden" name="hora" id="hora" value="" readonly> <!-- Muestra la hora actual en tiempo real -->
                                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['idUser']; ?>">
                                <div class="form-group" id="cont-tipDocumento">
                                    <label for="tipDocumento"> <span class="icon-users">&nbsp;</span> Tipo Documento</label>
                                    <select name="tipDocumento" class="form-control" id="tipDocumento">
                                        <option value="" hidden>Seleccione una opcion</option>
                                        <?php $qsql = $con -> query( "SELECT TipDocId, TipDocNombre FROM tbltipodocumento") or die ("Fue imposible ejecutar la consulte(roles)");
                                        foreach ($qsql as $row) { ?>

                                        <option value="<?php echo $row['TipDocId']; ?>"><?php echo $row['TipDocNombre']; ?></option>
                                            
                                        <?php } ?>    
                                    </select>
                                </div>
                                <div class="row" style="justify-content: center;">
                                    <div id="cont-numDocumento" class="form-group row col-6">
                                        <label for="numDocumento"> <span class="icon-profile">&nbsp;</span> Número Documento</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" name="numDocumento" id="numDocumento" autocomplete="off" placeholder="Ingrese No Documento" >
                                        </div>
                                    </div>
                                    <div id="cont-nit" class="form-group row col-6">
                                        <label for="nit"> <span class="icon-keyboard">&nbsp;</span> Nit</label>
                                        <div class="col-sm-11">
                                                <input type="text" class="form-control" name="nit" id="nit" autocomplete="off" placeholder="Ingrese apellidos" >
                                        </div>
                                     </div>
                                </div>
                                <div class="row" style="justify-content: center;">
                                    <div id="cont-nombres" class="form-group row col-6">
                                        <label for="nombres"> <span class="icon-user">&nbsp;</span> Nombres</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" name="nombres" id="nombres" autocomplete="off" placeholder="Ingrese nombres" >
                                        </div>
                                    </div>
                                    <div id="cont-apellidos" class="form-group row col-6">
                                        <label for="apellidos"> <span class="icon-user">&nbsp;</span> Apellidos</label>
                                        <div class="col-sm-11">
                                                <input type="text" class="form-control" name="apellidos" id="apellidos" autocomplete="off" placeholder="Ingrese apellidos" >
                                        </div>
                                     </div>
                                </div>

                                <div class="row" style="justify-content: center;">
                                    <div id="cont-direccion" class="form-group row col-6">
                                        <label for="direccion"> <span class="icon-location">&nbsp;</span> Dirección</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" placeholder="Ingrese Dirección" >
                                        </div>
                                    </div>
                                    <div id="cont-telefono" class="form-group row col-6">
                                        <label for="telefono"> <span class="icon-mobile2">&nbsp;</span> Teléfono</label>
                                        <div class="col-sm-11">
                                                <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off" placeholder="Ingrese Telefono" >
                                        </div>
                                     </div>
                                </div>

                                <div class="row" style="justify-content: center;">
                                    <div id="cont-nombres" class="form-group row col-6">
                                        <label for="usuario"> <span class="icon-mail">&nbsp;</span>Usuario</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" placeholder="Ingrese el Usuario" >
                                        </div>
                                    </div>
                                    <div id="cont-contrasena" class="form-group row col-6">
                                        <label for="contrasena"> <span class="icon-key2">&nbsp;</span> Clave</label>
                                        <div class="col-sm-11">
                                            <input type="password" name="contrasena" id="contrasena" class="form-control" autocomplete="off" placeholder="Ingrese una contraseña" >
                                                    <img src="../media/img/mostrar1.png" id="mostrar">
                                            </div>
                                     </div>
                                </div>

                                <div class="form-group" id="cont-estadoUsu">
                                    <input type="hidden" name="estadoUsu" id="estadoUsu" class="form-control" autocomplete="off" value="1">
                                </div>

                                <div class="form-group" id="cont-rol">
                                    <label for="rol"> <span class="icon-user-tie">&nbsp;</span> Rol</label>
                                    <select name="rol" class="form-control" id="rol">
                                        <option value="" hidden>Seleccione una opcion</option>
                                        <?php $qsql = $con -> query( "SELECT PerId, PerNombre FROM tblperfil") or die ("Fue imposible ejecutar la consulte(roles)");
                                        foreach ($qsql as $row) { ?>

                                        <option value="<?php echo $row['PerId']; ?>"><?php echo $row['PerNombre']; ?></option>
                                            
                                        <?php } ?>    
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary" id="btnEnviar_form_crear_usuario" name="btnEnviar_form_crear_usuario"  value="Guardar">
                            </form>

                    </div>
                </section>
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


    </div>
<!-- Fin Opciones Inventario-->


</body>

<script>
 var mostrar = document.getElementById('mostrar');
 var input = document.getElementById('contrasena');

 mostrar.addEventListener('click', mostrarContraseña);

 function mostrarContraseña(){
     if(input.type == "password"){
         input.type = "text";
         mostrar.src = "../media/img/ocultar1.png";
         setTimeout("ocultar()", 10000);
     }else{
        input.type = "password";
        mostrar.src = "../media/img/mostrar1.png";
     }
 }
 function ocultar(){
        input.type = "password";
        mostrar.src = "../media/img/mostrar1.png";
 }
</script>

    <script src="../sistema/js/ajax_formularios/form_crear_usuario.js"></script>
</html>
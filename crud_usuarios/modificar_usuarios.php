<?php 
    include('../config/session.php');
    include('../config/conexion.php');
    //Mostrar Datos
    if (empty($_GET['id']))
    {
        header('location: listado_usuarios.php');
        
    }
    $iduser = $_GET['id'];
    $sql = mysqli_query($con, "SELECT       tblusuario.TerId, 
                                            td.TipDocNombre AS tipodocumento,
                                            tblusuario.tbl_usuario_NumDoc,
                                            tblusuario.tbl_usuario_Nit,
                                            tblusuario.tbl_usuario_Nombres,
                                            tblusuario.tbl_usuario_Apellidos, 
                                            tblusuario.tbl_usuario_Direccion,
                                            tblusuario.tbl_usuario_Telefono,
                                            tblusuario.tblusuario_nombreUsuario, 
                                            tblusuario.tbl_usuario_Clave,
                                            tp.PerNombre AS nombrePerfil,
                                            te.estado_colaborador AS estadoColaborador
                                            FROM (((tblusuario tblusuario
                                            LEFT JOIN tbltipodocumento td
                                            ON tblusuario.FK_tbl_usuario_TipDoc= td.TipDocId)
                                            LEFT JOIN tblperfil tp
                                            ON tblusuario.FK_tbl_usuario_tblperfil = tp.PerId)
                                            LEFT JOIN tblestado te
                                            ON tblusuario.FK_tbl_usuario_tblestado = te.id_estado) 
                                            WHERE TerId = '$iduser'");
    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
        header ('Location: ../crud_usuarios/listado_usuarios.php');
    }else{
        $option = '';
        while ($data = mysqli_fetch_array($sql)){

            $iduser  = $data['TerId'];
            $tipodocumento = $data['tipodocumento'];
            $TerNumDoc = $data['tbl_usuario_NumDoc'];
            $TerNit = $data['tbl_usuario_Nit'];
            $nombres  = $data['tbl_usuario_Nombres'];
            $apellidos = $data['tbl_usuario_Apellidos'];
            $TerDireccion = $data['tbl_usuario_Direccion'];
            $TerTelefono = $data['tbl_usuario_Telefono'];
            $TerUsuario = $data['tblusuario_nombreUsuario'];
            $TerClave  = $data['tbl_usuario_Clave'];
            $PerNombre = $data['nombrePerfil'];
            $estado_colaborador = $data['estadoColaborador'];

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

<script src="../media/js/getTime.js"></script>
<script type="text/javascript">
		Swal.fire({
		title: ' Modificar Usuario ',
		icon: 'info',
		html:
        '<div id="formulario">'+
			'<form action="" method="post"  id="form_modificar_usuario" name="form_modificar_usuario">'+
                '<input type="hidden" name="TerId" value="<?php echo $iduser; ?>">'+
                '<input type="hidden" name="hora" id="hora" value="" readonly>'+
                '<input type="hidden" name="user" value="<?php echo $_SESSION['nombres']; ?> <?php echo $_SESSION['apellidos']; ?>">'+
                '<div class="form-group" id="cont-rol">'+
                    '<label for="tipDocumento"> <span class="icon-drawer">&nbsp;</span> Tipo Documento</label> <div class="col-sm-11"><?php $query_tipodocumento= mysqli_query($con, "SELECT * FROM tbltipodocumento"); $result_tipodocumento= mysqli_num_rows($query_tipodocumento);?>  <select class="form-control" name="tipDocumento" id="tipDocumento" class="form-control"><?php echo $option; if ($result_tipodocumento > 0 ){ while($tipodocumento = mysqli_fetch_array($query_tipodocumento)){ ?> <option value="<?php echo $tipodocumento["TipDocId"]; ?>"><?php echo $tipodocumento["TipDocNombre"] ?> </option> <?php } } ?> </select> </div>'+
                '</div>'+
                '<div class="row" style="justify-content: center;">'+
                    '<div id="cont-numDocumento" class="form-group row col-6">'+
                        '<label for="numDocumento"><span class="icon-profile">&nbsp;</span> Documento</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="numDocumento" id="numDocumento" autocomplete="off"  placeholder="Ingrese No Documento" value="<?php echo $TerNumDoc ?>" readonly> </input>'+
                        '</div>'+
                    '</div>'+
                    '<div id="cont-nit" class="form-group row col-6">'+
                        '<label for="nit"><span class="icon-keyboard">&nbsp;</span>Nit</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="nit" id="nit" autocomplete="off" placeholder="Ingrese apellidos"  value="<?php echo $TerNit; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row" style="justify-content: center;">'+
                    '<div id="cont-nombres" class="form-group row col-6">'+
                        '<label for="nombres"><span class="icon-user">&nbsp;</span>Nombres</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre Completo"   value="<?php echo $nombres; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                    '<div id="cont-apellidos" class="form-group row col-6">'+
                        '<label for="apellidos"><span class="icon-user">&nbsp;</span>Apellidos</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos Completo"   value="<?php echo $apellidos; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row" style="justify-content: center;">'+
                    '<div id="cont-direccion" class="form-group row col-6">'+
                        ' <label for="direccion"> <span class="icon-location">&nbsp;</span> Dirección</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" placeholder="Ingrese Dirección" value="<?php echo $TerDireccion; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                    '<div id="cont-apellidos" class="form-group row col-6">'+
                        '<label for="telefono"> <span class="icon-mobile2">&nbsp;</span> Teléfono</label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off" placeholder="Ingrese Telefono" value="<?php echo $TerTelefono; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row" style="justify-content: center;">'+
                    '<div id="cont-usuario" class="form-group row col-6">'+
                        ' <label for="usuario"> <span class="icon-mail">&nbsp;</span> Usuario </label>'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" placeholder="Ingrese Dirección" value="<?php echo $TerUsuario; ?>"> </input>'+
                        '</div>'+
                    '</div>'+
                    '<div id="cont-contrasena" class="form-group row col-6">'+
                        '<label for="contrasena"> <span class="icon-key2">&nbsp;</span> Clave</label>'+
                        '<div class="col-sm-11">'+    
                            '<input type="password" name="contrasena" id="contrasena" class="form-control"  autocomplete="off" placeholder="Ingrese una contraseña" value=""> </input>'+
                            '<img src="../media/img/mostrar1.png" id="mostrar">'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group" id="cont-rol">'+
                    '<label for="rol"> <span class="icon-user-tie">&nbsp;</span> Rol </label> <div class="col-sm-11"><?php $query_Pernombre = mysqli_query($con, "SELECT * FROM tblperfil"); $result_Pernombre= mysqli_num_rows($query_Pernombre);?>  <select class="form-control" name="rol" id="rol" class="form-control"><?php echo $option; if ($result_Pernombre > 0 ){ while($Pernombre = mysqli_fetch_array($query_Pernombre)){ ?> <option value="<?php echo $Pernombre["PerId"]; ?>"><?php echo $Pernombre["PerNombre"] ?> </option> <?php } } ?> </select> </div>'+
                '</div>'+
                '<div class="form-group" id="cont-rol">'+
                    '<label for="estado"> <span class="icon-profile">&nbsp;</span> Estado </label> <div class="col-sm-11"><?php $query_estado_colaborador  = mysqli_query($con, "SELECT * FROM tblestado"); $result_estado_colaborador = mysqli_num_rows($query_estado_colaborador);?>  <select class="form-control" name="estado" id="estado" class="form-control"><?php echo $option; if ($result_estado_colaborador > 0 ){ while($estado_colaborador = mysqli_fetch_array($query_estado_colaborador)){ ?> <option value="<?php echo $estado_colaborador["id_estado"]; ?>"><?php echo $estado_colaborador["estado_colaborador"] ?> </option> <?php } } ?> </select> </div>'+
                '</div>'+

                '<input type="submit" id="btnEnviar_form_modificar_usuario" name="btnEnviar_form_modificar_usuario"  value="Actualizar" class="btn btn-primary">'+
                '<a href="listado_usuarios.php" class="btn btn-danger"> Cancelar</a>'+
            '</form>' +
        '</div>' +
			'',
		focusConfirm: false,
        allowOutsideClick: false,
		showConfirmButton: false,
        width: 800
		})
</script>
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

    
    <script src="../sistema/js/ajax_formularios/form_modificar_usuario.js"></script>
</html>
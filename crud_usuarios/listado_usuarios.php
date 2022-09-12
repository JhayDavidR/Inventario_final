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
    
   
    <title>SALE</title>
 

    <!-- Custom styles for this template-->

    <style> 
    .bg-gradient-primari{
        background:black;
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
                        <h1 class="h3 mb-0 text-gray-800">Listado Usuarios</h1>
                </div>
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                     
                        <a href="crear_usuario.php" class="btn btn-info" style="margin-right:10px;"> <span class="icon-plus"></span> Crear Usuarios</a> 
                </div>
                <!-- End of Topbar -->
  
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Usuario</th>
                                            <th>Estado</th>
                                            <th>Rol</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr >
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Usuario</th>
                                            <th>Estado</th>
                                            <th>Rol</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>

                                         
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $query = mysqli_query($con, "SELECT tblusuario.TerId, 
                                                                            tblusuario.tbl_usuario_Nombres,tbl_usuario_Apellidos, 
                                                                            tblusuario.tblusuario_nombreUsuario, 
                                                                            tblperfil.PerNombre,
                                                                            tblestado.estado_colaborador  
                                                                            FROM ((tblusuario tblusuario
                                                                            LEFT JOIN tblperfil 
                                                                            ON tblusuario.FK_tbl_usuario_tblperfil = tblperfil.PerId)
                                                                            LEFT JOIN tblestado
                                                                            ON tblusuario.FK_tbl_usuario_tblestado = tblestado.id_estado)");
                                    
                                        $result = mysqli_num_rows($query);

                                        if($result > 0){

                                        while($data = mysqli_fetch_array($query)){
                                    ?>

                                    <tr>
                                        <td> <?php echo $data['TerId'] ?> </td>
                                        <td> <?php echo $data['tbl_usuario_Nombres'] ?></td>
                                        <td> <?php echo $data['tbl_usuario_Apellidos'] ?></td>
                                        <td> <?php echo $data['tblusuario_nombreUsuario'] ?> </td>
                                         <?php if($data['estado_colaborador'] == 'Activo'){
                                              echo "<td><h6 class='btn btn-success'>".$data['estado_colaborador']."<h6></td>";
                                         }else{
                                              echo "<td><h6 class='btn btn-danger'>".$data['estado_colaborador']."<h6></td>";
                                         }
                                         ?>
                                        <td> <?php echo $data['PerNombre'] ?></td>
                                        <td> <a href="modificar_usuarios.php?id=<?php echo $data["TerId"];?>" class="btn btn-info"> <span class="icon-pencil"></span>Modificar</a> </td>
                                        <td> 
                                        <?php if($data['TerId'] != 1 ){ ?>
                                        <a href="eliminar_usuarios.php?id=<?php echo $data["TerId"];?>" class="btn btn-danger">  <span class="icon-bin"></span>Eliminar</a>
                                        </td>
                                        <?php }?>
                                       
                                    </tr>
                                    <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>



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

    <script src="../sistema/js/ajax_formularios/form_cargar_masivaUsuarios.js"></script>
    <script>
        function validarExtCsv(){
            var archivoInput = document.getElementById('file-input');
            var archivoRuta = archivoInput.value;
            var extPermitidos = /(.csv)$/i;

            if(!extPermitidos.exec(archivoRuta))
            {
                Swal.fire({
                        icon: 'error',
                        title: 'Error al seleccionar el archivo',
                        text: 'El archivo seleccionado no es .csv, por favor verifica el tipo de archivo'

                    });
                archivoInput.value = '';
                return false;
            }
        }
    </script>
</html>
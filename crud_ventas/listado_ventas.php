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
                        <h1 class="h3 mb-0 text-gray-800">Listado Ventas</h1>
                </div>

                <!-- End of Topbar -->
  
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vendedor</th>
                                            <th>Fecha Venta</th>
                                            <th>Valor Venta</th>
                                            <th>Producto Vendido</th>
                                            <th>Cantidad</th>
                                            <th>Nombre Producto</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vendedor</th>
                                            <th>Fecha Venta</th>
                                            <th>Valor Venta</th>
                                            <th>Producto Vendido</th>
                                            <th>Cantidad</th>
                                            <th>Nombre Producto</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $query = mysqli_query($con, "SELECT tblventa.tblventa_id_registro, 
                                                                            tblusuario.tbl_usuario_Nombres, 
                                                                            tblventa.tblventa_fechaVenta, 
                                                                            tblventa.tblventa_valorVenta,
                                                                            tblventa.tblventa_productoVendido,
                                                                            tblventa.tbl_venta_cantidad,
                                                                            tblproducto.tblproducto_NombreProducto
                                                                            FROM ((tblventa tblventa
                                                                            LEFT JOIN tblproducto
                                                                            ON tblventa.tblventa_productoVendido = tblproducto.ProId)
                                                                            LEFT JOIN tblusuario
                                                                            ON tblventa.tblventa_userRegistra = tblusuario.TerId)");
                                    
                                        $result = mysqli_num_rows($query);

                                        if($result > 0){

                                        while($data = mysqli_fetch_array($query)){
                                    ?>

                                    <tr>
                                        <td> <?php echo $data['tblventa_id_registro'] ?> </td>
                                        <td> <?php echo $data['tbl_usuario_Nombres'] ?></td>
                                        <td> <?php echo $data['tblventa_fechaVenta'] ?></td>
                                        <td> $ <?php echo number_format($data['tblventa_valorVenta']) ?> </td>
                                        <td> <?php echo $data['tblventa_productoVendido'] ?> </td>
                                        <td> <?php echo $data['tbl_venta_cantidad'] ?></td>
                                        <td> <?php echo $data['tblproducto_NombreProducto'] ?></td>
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
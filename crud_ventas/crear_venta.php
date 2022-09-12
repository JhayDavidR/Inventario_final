<?php 
    include('../config/session.php');
    include('../config/conexion.php');
    if (empty($_POST['productoAVender'])) {
        header("location: ../principal/principal.php");
    }
    $idPro = $_POST['productoAVender'];
     $consultaProducto = $con->query("SELECT    tblproducto.ProId, 
                                                tblproducto.tblproducto_NombreProducto,
                                                tblproducto.tblproducto_referencia,
                                                tblproducto.tblproducto_precio,
                                                tblproducto.tblproducto_peso, 
                                                td.CatNombre AS categoria,
                                                tblproducto.tblproducto_stock,
                                                tblproducto.tblproducto_fechaRegistro,
                                                tblproducto.tblproducto_categoria
                                                FROM (tblproducto tblproducto
                                                LEFT JOIN tblcategoria td
                                                ON tblproducto.tblproducto_categoria = td.CatId)
                                                WHERE ProId = '$idPro'");
                                                
        $result_sql= mysqli_fetch_row($consultaProducto);
        $ProId  = $result_sql[0];
        $nombreProducto = $result_sql[1];
        $referencia = $result_sql[2];
        $precio = $result_sql[3];
        $peso  = $result_sql[4];
        $categoria = $result_sql[5];
        $stock = $result_sql[6];
        $fechaRegistro = $result_sql[7];
        $idcategoria = $result_sql[8];

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
                <?php if($stock == 0){?>
                           <script>
                                Swal.fire({  
                                    icon: 'info',
                                    title: 'No hay existencias del producto',
                                    text: 'No se puede realizar la venta ya que el producto esta agotado',
                                    html:
                                    '<p> No se puede realizar la venta ya que no hay stock disponible</p>'+
                                    '<a href="../principal/principal" class="btn btn-primary">Regresar</a>',
                                    allowOutsideClick: false,
                                    showConfirmButton: false
                                    
                                 }) 
                            </script>";
                                 
                <?php } else{?>
                <div class="modalidad animated jackInTheBox"> 
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                        <div class="modal-header justify-content-center">
                            <h2 class="modal-title" id="exampleModalLabel">Registrar Venta </h2>
                        
                        </div>
                        <div class="modal-body">
                        
                        <form action="" method="post"  id="form_registrar_venta" name="form_registrar_venta">

                                <input type="hidden" name="dia" id="dia" value="" readonly> <!-- Muestra el dia actual -->
                                    <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['idUser']; ?>">

                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-nombreProducto" class="form-group row col-6">
                                            <label for="nombreProducto"> Nombre Producto</label>
                                            <div class="col-sm-11">
                                            <input type="hidden" class="form-control" name="nombreProducto" id="nombreProducto" autocomplete="off" value="<?php echo $ProId?>" readonly /> 
                                                <input type="text" class="form-control" name="nombreProducto1" id="nombreProducto1" autocomplete="off" placeholder="<?php echo $nombreProducto ?>" readonly /> 
                                            </div>
                                        </div>
                                        <div id="cont-referencia" class="form-group row col-6">
                                            <label for="referencia">Referencia</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" name="referencia" id="referencia" autocomplete="off" placeholder="<?php echo $referencia ?>" readonly /> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-precio" class="form-group row col-6">
                                            <label for="precio">Precio Por Unidad $</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio?>" placeholder=" <?php echo "$ $precio";?>" readonly />
                                            </div>
                                        </div>
                                        <div id="cont-stock" class="form-group row col-6">
                                            <label for="stock">Stock Disponible</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="stock" id="stock" class="form-control"  placeholder="<?php echo $stock?>" value="<?php echo $stock?>" readonly > 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-cantidad" class="form-group row col-6">
                                            <label for="cantidad">Cantidad</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese La cantidad del producto"> 
                                            </div>
                                        </div>
                                    </div>

                        </div>
                        <div class="modal-footer justify-content-center">
                            <input type="submit" id="btnEnviar_form_registrar_venta" name="btnEnviar_form_registrar_venta"  value="Registrar" class="btn btn-primary">
                            <a href="listado_productos" class="btn btn-danger"> Cancelar</a>
                        </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>   
                    
             
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

<script src="../media/js/getTime.js"></script>
    
<script src="../sistema/js/ajax_formularios/crud_venta/form_registrar_venta.js"></script>

</html>
<?php 
    include('../config/session.php');
    include('../config/conexion.php');
    if (empty($_POST['productoId'])) {
        header("location: ../../principal/inicio/principal.php");
    }

    $idPro = $_POST['productoId'];

    $consultaTipEva = $con->query("SELECT       tblproducto.ProId, 
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
                                                
        $result_sql= mysqli_fetch_row($consultaTipEva);
        $ProId  = $result_sql[0];
        $nombreProducto = $result_sql[1];
        $referencia = $result_sql[2];
        $precio = $result_sql[3];
        $peso  = $result_sql[4];
        $categoria = $result_sql[5];
        $stock = $result_sql[6];
        $fechaRegistro = $result_sql[7];
        $idcategoria = $result_sql[8];

        if($idcategoria == 1) {            
            $option1 = ' <option value="'.$idcategoria.'"select>'.$categoria.'</option>';
        } else if ($idcategoria == 2) {
            $option1 = ' <option value="'.$idcategoria.'"select>'.$categoria.'</option>';
        } else if ($idcategoria == 3) {
            $option1 = ' <option value="'.$idcategoria.'"select>'.$categoria.'</option>';
        } else if ($idcategoria == 4) {
            $option1 = ' <option value="'.$idcategoria.'"select>'.$categoria.'</option>';
        } else if ($idcategoria == 5) {
            $option1 = ' <option value="'.$idcategoria.'"select>'.$categoria.'</option>';
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
        
                <div class="modalidad animated jackInTheBox"> 
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <h2 class="modal-title" id="exampleModalLabel">Modificar Producto </h2>
                        
                        </div>
                        <div class="modal-body">
                        <form action="" method="post"  id="form_modificar_producto" name="form_modificar_producto">

                                    <input type="hidden" name="ProId" value="<?php echo $ProId; ?>">
                                    <input type="hidden" name="dia" id="dia" value="" readonly> <!-- Muestra el dia actual -->
                                    <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['idUser']; ?>">

                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-nombreProducto" class="form-group row col-6">
                                            <label for="nombreProducto"><span class="icon-profile">&nbsp;</span> Nombre Producto</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" autocomplete="off"  placeholder="Ingrese el Nombre Producto" value="<?php echo $nombreProducto ?>"> </input>
                                            </div>
                                        </div>
                                        <div id="cont-referencia" class="form-group row col-6">
                                            <label for="referencia"><span class="icon-keyboard">&nbsp;</span>Referencia</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" name="referencia" id="referencia" autocomplete="off" placeholder="Ingrese la Referencia"  value="<?php echo $referencia; ?>"> </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-precio" class="form-group row col-6">
                                            <label for="precio"><span class="icon-user">&nbsp;</span>Precio</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese el Precio"   value="<?php echo $precio; ?>"> </input>
                                            </div>
                                        </div>
                                        <div id="cont-peso" class="form-group row col-6">
                                            <label for="peso"><span class="icon-user">&nbsp;</span>Peso</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="peso" id="peso" class="form-control" placeholder="Ingrese el Peso" value="<?php echo $peso; ?>"> </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-stock" class="form-group row col-6">
                                                <label for="categoria"> <span class="icon-drawer">&nbsp;</span> Categoría</label> 
                                                <div class="col-sm-11">
                                                    <?php $query_categoria= mysqli_query($con, "SELECT * FROM tblcategoria"); $result_categoria= mysqli_num_rows($query_categoria);?> 

                                                    <select class="form-control" name="categoria" id="categoria" class="form-control"><?php echo $option1; if ($result_categoria > 0 ){ 
                                                        
                                                        while($categoria = mysqli_fetch_array($query_categoria)){ ?> 

                                                            <option value="<?php echo $categoria["CatId"]; ?>"><?php echo $categoria["CatNombre"] ?> </option> 
                                                        <?php } } ?> 
                                                    </select> 
                                                </div>
                                        </div>
                                        <div id="cont-stock" class="form-group row col-6">
                                            <label for="stock"> <span class="icon-location">&nbsp;</span> Stock</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" name="stock" id="stock" autocomplete="off" placeholder="Ingrese el Stock" value="<?php echo $stock; ?>"> </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: center;">
                                        <div id="cont-fechaRegistro" class="form-group row col-6">
                                            <label for="fechaRegistro"> <span class="icon-mail">&nbsp;</span> Fecha de Registro</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" name="fechaRegistro" id="fechaRegistro" autocomplete="off" value="<?php echo $fechaRegistro; ?>" readonly> 
                                            </div>
                                        </div>
                                    </div>
                                  
                        </div>
                        <div class="modal-footer justify-content-center">
                            <input type="submit" id="btnEnviar_form_modificar_producto" name="btnEnviar_form_modificar_producto"  value="Actualizar" class="btn btn-primary">
                            <a href="listado_productos" class="btn btn-danger"> Cancelar</a>
                        </div>
                        </form>
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


    
    <script src="../sistema/js/ajax_formularios/crud_venta/form_modificar_producto.js"></script>
</html>
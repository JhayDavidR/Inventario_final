<?php 
if (!empty($_POST)) {

    if (empty($_POST['nombreProducto'])) {                
                    $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Todos los campos son obligatorios!'
                    })
                    </script>";

              
                    
    } else {
        
        require('../../../../config/db.php');
        require('../../../../config/conexion.php');


        $nombreProducto = $_POST['nombreProducto'];
        $referencia = $_POST['referencia'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stock'];
        $fechaModifica = $_POST['dia'];
        $userModifica = $_POST['user'];
        $ProId = $_POST['ProId'];
        


        $insertSsql = "UPDATE tblproducto SET   tblproducto_NombreProducto = '$nombreProducto',
                                                tblproducto_referencia = '$referencia',
                                                tblproducto_precio = '$precio',
                                                tblproducto_peso = '$peso',
                                                tblproducto_categoria = '$categoria',
                                                tblproducto_stock = '$stock',
                                                tblproducto_fechaModifica = STR_TO_DATE('$fechaModifica', '%d/%m/%Y'),
                                                tblproducto_userModifica  = '$userModifica'
                                                WHERE ProId = '$ProId'";

        $insertQslq = $con -> query($insertSsql);
       if($insertQslq){

                      
        $insertSsql2  = 

                        $alert="<script>
                                    Swal.fire({  
                                        icon: 'success',
                                        title: 'Producto actualizado Correctamente',
                                        text: 'Se ha guardado correctamente'
                                    }) 
                                </script>";

      
            
        }else{
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido actualizar el producto'

                    })
                    </script>";
            }
           
        mysqli_close($con);
    }

}
    echo $alert;

?>
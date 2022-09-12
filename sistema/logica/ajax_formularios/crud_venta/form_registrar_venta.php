<?php 
if (!empty($_POST)) {

    if (empty($_POST['precio'])) {                
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

        $userRegistra = $_POST['user'];
        $fechaCreacion = $_POST['dia'];
        $nombreProducto = $_POST['nombreProducto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $valorVenta = $precio * $cantidad;
        $stock = $_POST['stock'];
        $stockActual = $stock - $cantidad;

        if($cantidad > $stock){
                             $alert="<script>
                                    Swal.fire({  
                                        icon: 'error',
                                        title: 'No se ha podido registrar la venta',
                                        text: 'La cantidad a vender es mayor a la del stock disponible'
                                    }) 
                                </script>";
        }else{

            $insertSsql = "INSERT INTO  tblventa(
                                        tblventa_fechaVenta,
                                        tblventa_userRegistra,
                                        tblventa_valorVenta,
                                        tblventa_productoVendido,
                                        tbl_venta_cantidad)
                                VALUES  (STR_TO_DATE('$fechaCreacion', '%d/%m/%Y'),
                                        '$userRegistra',
                                        '$valorVenta',
                                        '$nombreProducto',
                                        '$cantidad')";

            $insertQslq = $con -> query($insertSsql);
            if($insertQslq){
                            
                                $alert="<script>
                                            Swal.fire({  
                                                icon: 'success',
                                                title: 'Venta registrada Correctamente',
                                                text: 'El total a pagar es: $ $valorVenta',
                                                allowOutsideClick: false
                                            }) 
                                        </script>";
                                        
                                $updateSsql2 = "UPDATE tblproducto SET  tblproducto_stock = '$stockActual' WHERE ProId = '$nombreProducto'";

                                $updateQslq2 = $con -> query($updateSsql2);

            
                    
                }else{
                    $alert="<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido guardar la venta'

                            })
                            </script>";
                    }
        }
        mysqli_close($con);
    }

}
    echo $alert;

?>
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

        $userRegistra = $_POST['user'];
        $fechaCreacion = $_POST['dia'];
        $nombreProducto = $_POST['nombreProducto'];
        $referencia = $_POST['referencia'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stock'];

        $insertSsql = "INSERT INTO  tblproducto(
            	                    tblproducto_fechaRegistro,
                                    tblproducto_userRegistra,
                                    tblproducto_NombreProducto,
                                    tblproducto_referencia,
                                    tblproducto_precio,
                                    tblproducto_peso,
                                    tblproducto_categoria,
                                    tblproducto_stock)
                            VALUES (STR_TO_DATE('$fechaCreacion', '%d/%m/%Y'),
                                    '$userRegistra',
                                    '$nombreProducto',
                                    '$referencia',
                                    '$precio',
                                    '$peso',
                                    '$categoria', 
                                    '$stock')";

        $insertQslq = $con -> query($insertSsql);
       if($insertQslq){

                      
        $insertSsql2  = 

                        $alert="<script>
                                    Swal.fire({  
                                        icon: 'success',
                                        title: 'Producto registrado Correctamente',
                                        text: 'Se ha guardado correctamente'
                                    }) 
                                </script>";

      
            
        }else{
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido guardar la venta'

                    })
                    </script>";
            }
           
        mysqli_close($con);
    }

}
    echo $alert;

?>
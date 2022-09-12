<?php 
    include('../config/session.php');
    include('../config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estado</title>
        <?php
            include '../sistema/scripts.php';
        ?>


</head>
<body>
        
<script>
        Swal.fire({
                icon: 'warning',
                title: 'Tu usuario no esta activo, por favor comunicate con el administrador <?php echo $_SESSION['nombres'] ?>',
                html: '<a href="../config/logout.php"> <button class="btn btn-primary"> Aceptar </button></a>',
                allowOutsideClick: false,
		showConfirmButton: false
              });
</script>
</body>

</html>

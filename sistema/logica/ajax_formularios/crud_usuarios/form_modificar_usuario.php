<?php 
if (!empty($_POST)) {

    if (empty($_POST['nombres'])) {                
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

        $idUsuario = $_POST['TerId'];
        $userModifica = $_POST['user'];
        $fechaModifica = $_POST['dia'];
        $horaModifica = $_POST['hora'];
        $tipDocumento = $_POST['tipDocumento'];
        $numDocumento = $_POST['numDocumento'];
        $nit = $_POST['nit'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = strtolower($_POST['usuario']);
        $contrasena = md5($_POST['contrasena']);
        $tipo = $_POST['tipo'];
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];

        
        $validarQsql = $con->query("SELECT * FROM tblusuario WHERE (tblusuario_nombreUsuario = '$correo' AND TerId != $idUsuario) OR (tbl_usuario_NumDoc = '$numDocumento' AND TerId != $idUsuario)");
        $result = mysqli_fetch_array($validarQsql);


        if($result > 0) {
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El correo o la Cedula ya existe'

                    })
            </script>";
        }else{ 
    
        if(empty($_POST['contrasena'])){
        $insertSsql = "UPDATE tblusuario SET FK_tbl_usuario_TipDoc = '$tipDocumento',
                                             tbl_usuario_NumDoc = '$numDocumento',
                                             tbl_usuario_Nit= '$nit',
                                             tbl_usuario_Nombres = '$nombres',
                                             tbl_usuario_Apellidos = '$apellidos',
                                             tbl_usuario_Direccion = '$direccion',
                                             tbl_usuario_Telefono = '$telefono',
                                             tblusuario_nombreUsuario = '$correo',
                                             FK_tbl_usuario_tblperfil = '$rol',
                                             FK_tbl_usuario_tblestado = '$estado',
                                             tbl_usuario_fechaModificacion = STR_TO_DATE('$fechaModifica', '%d/%m/%Y'),
                                             tbl_usuario_horaModificacion = '$horaModifica',
                                             Fk_tbl_usuario_userModifica = '$userModifica'
                                             WHERE TerId = '$idUsuario'";
        }else{
        $insertSsql = "UPDATE tblusuario SET FK_tbl_usuario_TipDoc = '$tipDocumento',
                                             tbl_usuario_NumDoc = '$numDocumento',
                                             tbl_usuario_Nit= '$nit',
                                             tbl_usuario_Nombres = '$nombres',
                                             tbl_usuario_Apellidos = '$apellidos',
                                             tbl_usuario_Direccion = '$direccion',
                                             tbl_usuario_Telefono = '$telefono',
                                             tblusuario_nombreUsuario = '$correo',
                                             tbl_usuario_Clave = '$contrasena',
                                             FK_tbl_usuario_tblperfil = '$rol',
                                             FK_tbl_usuario_tblestado = '$estado',
                                             tbl_usuario_fechaModificacion = STR_TO_DATE('$fechaModifica', '%d/%m/%Y'),
                                             tbl_usuario_horaModificacion = '$horaModifica',
                                             Fk_tbl_usuario_userModifica = '$userModifica'
                                             WHERE TerId = '$idUsuario'";
        }

        $insertQslq = $con -> query($insertSsql);
        
       if($insertQslq){
           
            $alert="<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Perfil Actualizado',
                        text: 'Se ha a guardado la actualización',
                        allowOutsideClick: false,
                        showConfirmButton: false

                    })
                    </script>";
        }else{
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido guardar la actualización'

                    })
                    </script>";
            }
        }
           
        mysqli_close($con);
    }

}
    echo $alert;

?>
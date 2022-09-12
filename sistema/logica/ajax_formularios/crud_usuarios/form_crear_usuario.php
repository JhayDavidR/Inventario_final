<?php 
if (!empty($_POST)) {

    if (empty($_POST['tipDocumento']) || empty($_POST['numDocumento']) || empty($_POST['nit'])
                || empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['direccion']) || empty($_POST['telefono'])
                || empty($_POST['usuario']) || empty($_POST['contrasena'])) {                
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
        $horaCreacion = $_POST['hora'];
        $tipDocumento = $_POST['tipDocumento'];
        $numDocumento = $_POST['numDocumento'];
        $nit = $_POST['nit'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $usuario = strtolower($_POST['usuario']);
        $contrasena = md5($_POST['contrasena']);
        $tipo = $_POST['tipo'];
        $rol = $_POST['rol'];
        $estado = $_POST['estadoUsu'];
        
        $validarQsql = $con->query("SELECT * FROM tblusuario WHERE tblusuario_nombreUsuario = '$usuario' OR tbl_usuario_NumDoc = '$numDocumento' ");
        $result = mysqli_fetch_array($validarQsql);


        if($result > 0) {
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El usuario o la Cedula ya existe'

                    })
            </script>";
        }else{ 
    
        $insertSsql = "INSERT INTO  tblusuario(
                                    tbl_usuario_fechaCreacion,
                                    tbl_usuario_horaCreacion,
                                    FK_tbl_usuario_TipDoc,
                                    tbl_usuario_NumDoc,
                                    tbl_usuario_Nit,
                                    tbl_usuario_Nombres,
                                    tbl_usuario_Apellidos,
                                    tbl_usuario_Direccion,
                                    tbl_usuario_Telefono,
                                    tblusuario_nombreUsuario,
                                    tbl_usuario_Clave,
                                    FK_tbl_usuario_tblperfil,
                                    FK_tbl_usuario_tblestado,
                                    Fk_tbl_usuario_userCrea)
                            VALUES (
                                    STR_TO_DATE('$fechaCreacion', '%d/%m/%Y'),
                                    '$horaCreacion',
                                    '$tipDocumento',
                                    '$numDocumento',
                                    '$nit',
                                    '$nombres',
                                    '$apellidos',
                                    '$direccion',
                                    '$telefono',
                                    '$usuario',
                                    '$contrasena',
                                    '$rol',
                                    '$estado',
                                    '$userRegistra')";

        $insertQslq = $con -> query($insertSsql);
       if($insertQslq){
            $alert="<script>
                    Swal.fire(
                        'Usuario Creado',
                        'Se ha a guardado el Usuario',
                        'success'
                    ) 
                    </script>";
        }else{
            $alert="<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido guardar el usuario'

                    })
                    </script>";
            }
        }
           
        mysqli_close($con);
    }

}
    echo $alert;

?>
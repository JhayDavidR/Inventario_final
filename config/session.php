<?php
// Estableciendo la conexion a la base de datos
include("db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("conexion.php");//Contiene de conexion a la base de datos
 
session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['usernames'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($con, "SELECT TerId, tblusuario_nombreUsuario, tbl_usuario_fechaCreacion, 
                                tbl_usuario_horaCreacion, Fk_tbl_usuario_userCrea, FK_tbl_usuario_TipDoc, tbl_usuario_NumDoc,
                                tbl_usuario_Nit,tbl_usuario_Nombres, tbl_usuario_Apellidos, tbl_usuario_Direccion,tbl_usuario_Telefono,
                                tbl_usuario_Clave,FK_tbl_usuario_tblperfil,FK_tbl_usuario_tblestado
                                FROM tblusuario WHERE tblusuario_nombreUsuario='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);

        $_SESSION['idUser'] = $row['TerId'];
        $_SESSION['nombres'] = $row['tbl_usuario_Nombres'];
        $_SESSION['apellidos'] = $row['tbl_usuario_Apellidos'];
        $_SESSION['perfilesInCa'] = $row['FK_tbl_usuario_tblperfil'];
        $_SESSION['estado'] = $row['FK_tbl_usuario_tblestado'];
        $_SESSION['userRegistrado'] = $row['tblusuario_nombreUsuario'];
        $login_session = $row['TerId'];
        
        $nombrePerfil = $con-> query("SELECT PerNombre FROM tblperfil WHERE PerId = '".$_SESSION['perfilesInCa']."'");

        if ($fila = mysqli_fetch_row($nombrePerfil)) {
                $perfil = $fila[0];
                $_SESSION['perfilesInCa'] = $perfil; 
        }
                
if(!isset($login_session)){
        mysqli_close($con); // Cerrando la conexion
        header('Location: index.php'); // Redirecciona a la pagina de inicio
}
?>
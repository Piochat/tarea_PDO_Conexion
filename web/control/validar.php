<?php
declare(strict_types=1);
require_once("../config/conexion.php");

session_start();

function validarUsuario()
{
    $conectar = new Conexion();
    $c = $conectar->openConn();
    $correo = strtoupper($_POST['email']);
    $pass = strtoupper($_POST['pwd']);

    $stmt = $c->query("select CORREOE, CLAVE, NOMBRECOMPLETO  from tb_usuarios where CLAVE = MD5('$pass') and CORREOE='$correo'");
    if ($stmt) {
        $name = $stmt->fetchObject();
        echo "pos si soy la verga";

        $_SESSION['USUARIO_LOGUEADO']  = true;
        $_SESSION['LOGIN']  = $name->CORREOE;
        $_SESSION['NOMBRE']  = $name->NOMBRECOMPLETO;

        echo '<script> window.location.href="../views/solicitud.php"</script>';
    } else {
        session_unset();
        echo'<script type="text/javascript">  alert("Usuario Incorrecto"); 
		window.location.href="../index.html";   </script>';
    }
}

validarUsuario();
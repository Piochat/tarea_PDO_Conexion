<?php
session_start();

if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="../index.html";   </script>';
}

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];

$conectar = new Conexion();
$c = $conectar->openConn();


?>
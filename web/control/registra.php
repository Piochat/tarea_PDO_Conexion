<?php
session_start();
require_once("../config/conexion.php");
require_once("../test.php");

if (!isset($_SESSION['USUARIO_LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="../index.html";   </script>';
}

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];
$archivo = $_FILES;
var_dump($archivo);

// echo "<h2>" . $archivo['userfile']['name'] . "</h2>";
if (!empty($archivo)) {
    try {
        subirArchivo($archivo['userfile']['tmp_name'].$archivo['userfile']['name']);

        $ruta = "https://storage.cloud.google.com/misegemnto64/";
        if (!is_dir($ruta)) {
            mkdir($ruta);
        }
        $ruta = $ruta . $archivo['userfile']['name'];
        move_uploaded_file($archivo['userfile']['tmp_name'], $ruta);

        $conectar = new Conexion();
        $c = $conectar->openConn();

        $sql = "INSERT INTO `tb_solicitud`(`NOMBREINGRESA`, `CORREOINGRESA`, `RUTAPDF`, `NOMBREARCHIVO`, `MOTIVO`) VALUES (?,?,?,?,?)";
        $stmt = $c->prepare($sql);
        $stmt->execute([$NOMBRECOMPLETO, $CORREO, $ruta, $archivo['userfile']['name'], $MOTIVO]);
        
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $archivo['userfile']['name'] . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo file_get_contents($ruta);
    } catch (\Throwable $th) {
        echo'<script type="text/javascript">alert("Falló la transferencia"); 
        window.location.href="../index.html";   </script>';
    }
} else {
    echo'<script type="text/javascript">alert("Falló la transferencia"); 
    window.location.href="../index.html";   </script>';
}

?>
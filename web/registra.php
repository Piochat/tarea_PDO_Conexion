<?php
session_start();
require_once("config/conexion.php");
require_once("test.php");

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];
$archivo = $_FILES;
var_dump($archivo);
echo "<br><br><br>" . $archivo['userfile']['tmp_name']. '/' .$archivo['userfile']['name'];
// echo 1"<h2>" . $archivo['userfile']['name'] . "</h2>"; $archivo['userfile']['tmp_name'].
if (!empty($archivo)) {
    try {
        subirArchivo($archivo['userfile']['tmp_name'],$archivo['userfile']['name']);

        $ruta = "https://storage.cloud.google.com/misegemnto64/";
        $ruta = $ruta . $archivo['userfile']['name'];

        $conectar = new Conexion();
        $c = $conectar->openConn();

        $sql = "INSERT INTO `tb_solicitud`(`NOMBREINGRESA`, `CORREOINGRESA`, `RUTAPDF`, `NOMBREARCHIVO`, `MOTIVO`) VALUES (?,?,?,?,?)";
        $stmt = $c->prepare($sql);
        $stmt->execute([$NOMBRECOMPLETO, $CORREO, $ruta, $archivo['userfile']['name'], $MOTIVO]);
        
        // header('Content-type: application/pdf');
        // header('Content-Disposition: inline; filename="' . $archivo['userfile']['name'] . '"');
        // header('Content-Transfer-Encoding: binary');
        // header('Accept-Ranges: bytes');
        // echo file_get_contents($ruta);
        echo '<script type="text/javascript">window.location.href="'.$ruta.'";</script>';
    } catch (\Throwable $th) {
        echo'<script type="text/javascript">alert("Falló la transferencia"); 
          </script>';
    }
} else {
    echo'<script type="text/javascript">alert("Fallo por culpa del archivo"); 
    window.location.href="../index.html";   </script>';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/main.css">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css"
        integrity="sha256-xpOKVlYXzQ3P03j397+jWFZLMBXLES3IiryeClgU5og= sha384-gP4DhqyoT9b1vaikoHi9XQ8If7UNLO73JFOOlQV1RATrA7D0O7TjJZifac6NwPps sha512-AKwIib1E+xDeXe0tCgbc9uSvPwVYl6Awj7xl0FoaPFostZHOuDQ1abnDNCYtxL/HWEnVOMrFyf91TDgLPi9pNg=="
        crossorigin="anonymous">

    <!-- Compressed JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js"
        integrity="sha256-/PFxCnsMh+nTuM0k3VJCRch1gwnCfKjaP8rJNq5SoBg= sha384-9ksAFjQjZnpqt6VtpjMjlp2S0qrGbcwF/rvrLUg2vciMhwc1UJJeAAOLuJ96w+Nj sha512-UMSn6RHqqJeJcIfV1eS2tPKCjzaHkU/KqgAnQ7Nzn0mLicFxaVhm9vq7zG5+0LALt15j1ljlg8Fp9PT1VGNmDw=="
        crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../public/img/icon/logo.png" type="image/x-icon">
    <title>Solicitud</title>
</head>
<?php
session_start();

if (!isset($_SESSION['USUARIO_LOGUEADO'])){
    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="../index.html";   </script>';
}
$USUARIO = $_SESSION['LOGIN'];
$NOMBRE = $_SESSION['NOMBRE'];
$_SESSION['USUARIO_LOGUEADO'] = true;
?>

<body>
<?php
    echo"<pre>".print_r($_FILES,true)."</pre>";
?>
<div class="contact1">
    <div class="grid-container">
        <div class="head">
        </div>

        <div>
            <img src="../public/img/other/darling.png" alt="IMG" height="256px" width="256px">
        </div>
        <span class="contact1-form-title">
					Solicitud de empleo
				</span>

        <!-- contact1-form   -->
        <form method="post" action="../control/registra.php" enctype="multipart/form-data">
				<span class="contact1-form-title">
					Datos de la solicitud
				</span>

            <div class="wrap-input1 validate-input">
                <input class="input1" type="text" name="LOGIN" value=" <?php echo $_SESSION['LOGIN']; ?>" readonly>
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" >
                <input class="input1" type="text" name="NOMBRECOMPLETO" value=" <?php echo $_SESSION['NOMBRE']; ?>" readonly>
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Las Placas son requeridas">
                <input class="input1" type="text" name="MOTIVO" placeholder="Motivo Solicitud de Empleo" required>
                <span class="shadow-input1"></span>
            </div>

            <span class="contact1-form-title">
					Datos del Empleado
				</span>

            <div class="container-contact1-form-btn">
                <button class="contact1-form-btn">
						<span>
							Enviar Informacion
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
                </button>
            </div>

            <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
            <h5 class="bg-white">Seleccione el archivo que da vida a la solicitud, (formato PDF).</h5> <input name="userfile" type="file"  class="form-control " accept="application/pdf" required/>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8"><input type="submit" value="Enviar Archivo" class="button extend"/></div>

            </div>

        </form>

    </div>
</div>
</body>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/main.css">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css"
        integrity="sha256-xpOKVlYXzQ3P03j397+jWFZLMBXLES3IiryeClgU5og= sha384-gP4DhqyoT9b1vaikoHi9XQ8If7UNLO73JFOOlQV1RATrA7D0O7TjJZifac6NwPps sha512-AKwIib1E+xDeXe0tCgbc9uSvPwVYl6Awj7xl0FoaPFostZHOuDQ1abnDNCYtxL/HWEnVOMrFyf91TDgLPi9pNg=="
        crossorigin="anonymous">

    <!-- Compressed JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js"
        integrity="sha256-/PFxCnsMh+nTuM0k3VJCRch1gwnCfKjaP8rJNq5SoBg= sha384-9ksAFjQjZnpqt6VtpjMjlp2S0qrGbcwF/rvrLUg2vciMhwc1UJJeAAOLuJ96w+Nj sha512-UMSn6RHqqJeJcIfV1eS2tPKCjzaHkU/KqgAnQ7Nzn0mLicFxaVhm9vq7zG5+0LALt15j1ljlg8Fp9PT1VGNmDw=="
        crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="public/img/icon/logo.png" type="image/x-icon">
    <title>Login</title>
</head>

<body class="login1">
    <div class="grid-container ">
        <div class="grid-x grid-margin-x">
            <form class="log-in-form" action="control/validar.php" method="POST">
                <h2 class="text-center">Ingresa al Sistema</h2>
                <label>Email
                    <input type="email" placeholder="somebody@example.com" name="email" id="email" required>
                </label>
                <label>Contraseña
                    <input type="password" placeholder="XXXXX" name="pwd" id="pwd" required>
                </label>
                <!-- <input id="show-password" type="checkbox"><label for="show-password">Show password</label> -->
                <label><input type="checkbox">Recordarme</label>
                <p><input type="submit" class="button expanded" value="Log in"></input></p>
                <!-- <p class="text-center"><a href="#">Forgot your password?</a></p> -->
            </form>
        </div>
    </div>
</body>

</html>
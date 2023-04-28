<?php
include 'caduca_sesion.php';
session_start();
include 'ConexionDB.php';
include 'validacionLoginRegister.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/LandingPage.css?version=1">
    <title>Document</title>
</head>

<body>

    <div class="Card">
        <div class="back-box">
            <div class="back-box-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="BackBoxButtonLogin">Login</button>
            </div>
            <div class="back-box-register">
                <h3>¿Aún no tienes cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="BackBoxButtonRegister">Registrar</button>
            </div>
        </div>
        <div class="data">

            //Formulario Login
            <form action="" class="form_block formulari-login" method="POST">
                <h2>Iniciar Sesión</h2><br>
                <div id="error-message"></div>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-login" name="usernameLogin">
                <input placeholder="Password" type="password" class="input-password-login" placeholder="Password"
                    name="passwordLogin">
                <!-- Mensaje de error Login -->
                <button id="buttonLogin" name="buttonLogin" value="1">
                    <h3>Login</h3>
                </button>
            </form>

            //Formulario Registro
            <form action="" id="formRegistre" class="form_block formulari-register" method="POST">
                <h2>Regístrate</h2>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-register"
                    id="input-nameuser-register" name="username">
                <input type="email" placeholder="Correo electrónico" class="input-mail-register"
                    id="input-mail-register" name="email">
                <input type="password" placeholder="Contrasena" class="input-password2-register"
                    id="input-password2-register" name="contrasena">
                <button type="submit" id="buttonRegister" name="buttonRegister" value="1">
                    <h3>Registrar</h3>
                </button>
            </form>
        </div>
    </div>
    <script src="../Scripts/LandingPage.js?version=1"></script>
</body>

</html>
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
    <link rel="stylesheet" href="../Styles/login_register.css?version=2">
    <title>Login</title>
</head>
<body>
  <div class="container">
    <form class="form-login-register" method="post">

        <h1 class="title-login-register">Regístrate</h1>

        <p>
            <input class="textfield-loginRegister" type="text" name="username" placeholder="Nombre de usuario">
        </p>

        <p>
            <input class="textfield-loginRegister" type="email" name="email" placeholder="Correo electrónico">
        </p>

        <p>
            <input class="textfield-loginRegister" type="password" name="password" placeholder="Contraseña">
        </p>

        <p>
            <input class="textfield-loginRegister" type="password" name="confirmPassword" placeholder="Confirmar contraseña">
        </p>

        <p>
            <input class="button button--blue" type="submit" value="Login!">
        </p>

        <p>¿Ya tienes una cuenta en nuestra página?  <a class="login-register-link" href="login.php">¡Inicia sesión!</a></p>
    </form>
  </div>
</body>
</html>
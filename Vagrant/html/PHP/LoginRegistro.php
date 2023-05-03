<?php

include 'ConexionDB.php';

if ((isset($_POST['buttonRegister']))) {
    $firstname = $_POST["username"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["contrasena"];


    $query = "INSERT INTO usuario (nombre,apellidos,email,contrasena) VALUES (:nombre,:apellidos,:email,:contrasena)";

    $consulta = $conexion->prepare($query);


    $consulta->bindParam(':nombre', $firstname);
    $consulta->bindParam(':apellidos', $lastname);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':contrasena', $password);



    if ($consulta->execute()) {
        header("location: index.php");
    } 


} else if ((isset($_POST['buttonLogin']))) {


    $nameuserL = $_POST['usernameLogin'];
    $passwordL = $_POST['passwordLogin'];


    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryLogin = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :nombreUser and 
    contrasena = :passwordUser");

    $queryLogin->bindParam(":nombreUser", $nameuserL);
    $queryLogin->bindParam(":passwordUser", $passwordL);


    $queryLogin->execute();

    $user = $queryLogin->fetch(PDO::FETCH_ASSOC);



    if ($user) {
        $_SESSION['usuario'] = $user['nombre'];
        header("location: bienvenida.php");
    } 
}

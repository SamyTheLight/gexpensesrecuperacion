<?php
function validarDadesFormulari($firstname, $email, $passwordReg, $valid, $conexion)
{
    // Verificar si el nombre de usuario o el correo electrónico ya existen
    $query = "SELECT COUNT(*) FROM usuario WHERE nombre = :nombre OR email = :email";
    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':nombre', $firstname);
    $consulta->bindParam(':email', $email);
    $consulta->execute();
    $count = $consulta->fetchColumn();

    if ($count > 0) {
        // El nombre de usuario o el correo electrónico ya existen
        $valid = false;
        echo "El nombre de usuario o el correo electrónico ya están en uso.";
        return false;
    }

    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/";
    if ((empty($firstname))) {
        $valid = false;
    }
    if (empty($email)) {
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    }

    if (empty($passwordReg)) {
        $valid = false;
    } else if (!preg_match($password_regex, $passwordReg)) {
        $valid = false;
    }

    return $valid;
}

if ((!empty($_POST))) {

    $firstname = $_POST["username"];
    $email = $_POST["email"];
    $passwordReg = $_POST["contrasena"];

    $valid = true;

    $resultatvalidacio = validarDadesFormulari($firstname, $email, $passwordReg, $valid, $conexion);

    if ($resultatvalidacio == true) {
        $hash_password = password_hash($passwordReg, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario (nombre,email,contrasena) VALUES (:nombre,:email,:contrasena)";

        $consulta = $conexion->prepare($query);
        $consulta->bindParam(':nombre', $firstname);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':contrasena', $hash_password);

        if ($consulta->execute()) {
            $registered = true;
        }
    }
}

if ((isset($_POST['buttonLogin']))) {

    $nameuserL = $_POST['usernameLogin'];

    $passwordL = $_POST['passwordLogin'];

    $hash_passwordLogin = password_hash($passwordL, PASSWORD_DEFAULT);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryLogin = $conexion->prepare("SELECT id_usuario,contrasena FROM usuario WHERE nombre = :nombreUser");

    $queryLogin->bindParam(':nombreUser', $nameuserL);

    $queryLogin->execute();

    $user = $queryLogin->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo '<div class="error-message">El usuario no existe en la base de datos.</div>';
    } else if (password_verify($passwordL, $user['contrasena'])) {
        $_SESSION['usuario'] = $nameuserL;
        $_SESSION['id_usuario'] = $user['id_usuario'];

        header("location: PHP/Home.php");
    } else {
        echo '<div class="error-message">Contraseña incorrecta.</div>';
    }
}
?>
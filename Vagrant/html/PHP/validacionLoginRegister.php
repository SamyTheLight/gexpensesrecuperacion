// Validación inputs Login y Registro
<?php
function validarDadesFormulari($firstname, $email, $passwordReg, $valid, $conexion)
{
    // Consulta SQL para verificar si el nombre de usuario o el correo electrónico ya existen
    $query = "SELECT COUNT(*) FROM usuario WHERE nombre = :nombre OR email = :email";
    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':nombre', $firstname);
    $consulta->bindParam(':email', $email);
    $consulta->execute();
    $count = $consulta->fetchColumn();

    //verifica si, la consulta SQL para comprobar si el nombre de usuario o el correo electrónico ya existen
    //en la base de datos, ha devuelto al menos una fila. Si la ha devuelto, quiere decir que el  registro no 
    //es valido
    if ($count > 0) {
        $valid = false;
        echo "El nombre de usuario o el correo electrónico ya están en uso.";
        return false;
    }

    //Expresion regular contraseña: 8 caracteres, 1 mayuscula, 1 minuscula y 1 caracter especial.
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/";

    //Si los inputs del registro o login están vacios, manda mensaje de error
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

//Si los inputs no están vacios, se recogen los valores enviados para el nombre de usuario, 
//correo electrónico y contraseña. 
if ((!empty($_POST))) {

    $firstname = $_POST["username"];
    $email = $_POST["email"];
    $passwordReg = $_POST["contrasena"];

    $valid = true;

    //Se llama a la función validarDadesFormulari para validar los datos del formulario. 
    $resultatvalidacio = validarDadesFormulari($firstname, $email, $passwordReg, $valid, $conexion);

    //Si esta función devuelve true, todos los campos del formulario han pasado la validación
    if ($resultatvalidacio == true) {

        //Generamos con la funcion password_hash un hash de la contraseña del usuario
        $hash_password = password_hash($passwordReg, PASSWORD_DEFAULT);

        //Guardamos los datos en la tabla usuario de la base de datos
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
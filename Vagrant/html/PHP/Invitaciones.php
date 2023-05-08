<?php
//Consulta tabla actividad ordenado por id descendente obteniendo sólo el último registro
$queryRegistro = "SELECT * FROM activitat ORDER BY id_activitat DESC limit 1";
//Almacenamos la consulta
$stmtRegistro = $conexion->query($queryRegistro);
$registroInvitacio = $stmtRegistro->fetchAll(PDO::FETCH_OBJ);

//Declaramos las 2 variables que usaremos más adelante en un bucle for-each para asignar valores del último registro
//obtenido de estas 2 variables.
$nombreActividadR = "";
$descripcionActividadR = "";

foreach ($registroInvitacio as $row) {
    $nombreActividadR = $row->Nombre;
    $descripcionActividadR = $row->Descripcion;
}

//Funcion que recibe 2 parametros: la conexión PDO y un correo electrónico. La funcion realiza una consulta SQL
//seleccionando el id_usuario que coincida con el email pasado. La función devuelve el resultado de la consulta 
//en un array.
function idUserInvitacion($conexion, $emailI)
{
    $queryUserInvitacio = $conexion->prepare("SELECT id_usuario FROM usuario WHERE email =:emailUserInvitacio ");
    $queryUserInvitacio->bindParam(":emailUserInvitacio", $emailI);
    $queryUserInvitacio->execute();
    $userIdInvitacio =  $queryUserInvitacio->fetch(PDO::FETCH_ASSOC);
    return $userIdInvitacio;
}

//Obtenemos los valores enviados a través del formulario con $_POST
$emailE = $_POST['emailEnviados'];

$cont = 0;

//Funcion que recibe 4 parametros: la conexión PDO, un correo electrónico, el nombre de la última actividad 
//registrada con su descripcion y el id de usuario obtenido a traves de la función idUserInvitacion().
//La función prepara una consulta SQL que inserta los valores correspondientes en la tabla "invitacio".
//El id de usuario se inserta como nulo si no se encuentra un usuario con el email proporcionado.
function insertarInvitacio($conexion, $mail,  $nombreActividadR, $descripcionActividadR, $idUserInvitacio1)
{
    $nombreI = $nombreActividadR;
    $descripcioI =  $descripcionActividadR;
    $idUserInvitacio1 = idUserInvitacion($conexion, $mail);
    $queryInvitacio = "INSERT INTO invitacio (Nombre,Descripcion,Email,usuario_id) VALUES (:nombreI,:descripcioI,:emailI,:userIdA)";
    $consultaInvitacio = $conexion->prepare($queryInvitacio);
    $consultaInvitacio->bindParam(':nombreI', $nombreI);
    $consultaInvitacio->bindParam(':descripcioI', $descripcioI);
    $consultaInvitacio->bindParam(':emailI', $mail);
    $nullV = null;
    if ($idUserInvitacio1 == false) $consultaInvitacio->bindParam(':userIdA',  $nullV);
    else {
        $aux = (int) $idUserInvitacio1;
        $consultaInvitacio->bindParam(':userIdA', $aux);
    }

    if ($consultaInvitacio->execute())
        echo 'Execute correcte';
}

//Funcion que genera un token aleatorio de una longitud 10 utilizando la función substr() y str_shuffle().
function generateToken($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

$tokenI = generateToken($length = 10);

//Funcion que recibe 4 parámetros: la conexión PDO, el token generado por la funcion generateToken(), el id del 
//usuario obtenido a través de la función idUserInvitacion() y el email.
//La función prepara una consulta SQL que inserta los valores proporcionados en la tabla "Token" de la base de datos.
function guardarToken($conexion, $token, $idUserInvitacio1, $rowEmail)
{
    $boolCreat = 1;
    $idUserInvitacio1 = idUserInvitacion($conexion, $rowEmail);
    $CurrentDateInv = date_create("now")->format("Y-m-d H:i:s");
    $queryToken = "INSERT INTO Token (token,invitacio_id,fecha,estado,EmailInvitacio) VALUES (:tokenI,:invitacio_idI,:fechaInv,:estadoI,:emailInvitacio)";
    $consultaToken = $conexion->prepare($queryToken);
    $consultaToken->bindParam(':tokenI', $token);
    $auxInvit = (int) $idUserInvitacio1;
    $consultaToken->bindParam(':invitacio_idI', $auxInvit);
    $consultaToken->bindParam(':fechaInv', $CurrentDateInv);
    $consultaToken->bindParam(':estadoI', $boolCreat);
    $consultaToken->bindParam(':emailInvitacio', $rowEmail);
    $consultaToken->execute();
}

// Se recorre el array $emailE que contiene los emails en un for each para:
// 1. Se comprueba si el email es valido usando filter_var().
// 2. Si es valido, se obtiene el id de usuario utilizando la función idUserInvitacion(), se inserta una invitación
// en la tabla "invitacio" utilizando la función insertarInvitacio(), se genera y se almacena un token aleatorio 
// utilizando la función generateToken() y se inserta en la tabla "Token" utilizando la función guardarToken().
// 3. Se comprueba si el email está registrado en la tabla "usuario". Si no lo está, se envía un correo
// electrónico con "sendMailRegister.php". Si está registrado, se envía un correo electrónico 
// con "sendMailVerify.php"
if (!empty($emailE)) {
    foreach ($emailE as $rowEmail) :
        if (filter_var($rowEmail, FILTER_VALIDATE_EMAIL)) {
            $idUserInvitacio1 = idUserInvitacion($conexion, $mail);
            insertarInvitacio($conexion, $rowEmail, $nombreActividadR, $descripcionActividadR, $idUserInvitacio1);
            guardarToken($conexion, $tokenI, $idUserInvitacio1, $rowEmail);
            $queryEmail = $conexion->prepare("SELECT email FROM usuario WHERE email = :emailP ");
            $queryEmail->bindParam(':emailP', $rowEmail);
            $queryEmail->execute();
            $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);
            $_SESSION['mailEnviat'] = $trobat;
            if ($trobat == false) {
                include 'sendMailRegister.php';
            } else {
                include 'sendMailVerify.php';
                echo 'enviado correctamente';
            }
        }
    endforeach;
}
?>
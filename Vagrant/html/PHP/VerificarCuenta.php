<?php
session_start();

include 'ConexionDB.php';


function verificarToken($conexion,  $inputTokenI)
{
    $queryUserId = $conexion->prepare("select id_usuario from usuario u INNER JOIN invitacio i ON i.usuario_id=u.id_usuario  INNER JOIN Token t ON i.id_invitacio=t.invitacio_id where t.token= :inputTokenI");

    $queryUserId->bindParam(':inputTokenI', $inputTokenI);

    $queryUserId->execute();

    $userId = $queryUserId->fetch(PDO::FETCH_ASSOC);

    return $userId;
}

if (isset($_POST['buttonVerify'])) {
    if (!empty($_POST['verifyCode'])) {
        $inputToken = $_POST['verifyCode'];

        $userId = verificarToken($conexion, $inputToken);

        $_SESSION['usuario'] = $userId;

        header("location: detallActivitat.php");
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/html/Code/Styles/VerificarCuenta.css">
    <title>Document</title>
</head>

<body>

    <div class="formVerifyAccount">
        <div class="formContent">
            <form action="" id="formVerifyAccount" method="POST">
                <h1>Verifica tu cuenta con el código dado</h1>
                <input type="text" class="verifyCode" name="verifyCode" id="verifyCode"
                    placeholder="Código de verificación">
                <button id="buttonVerifyAccount" name="buttonVerify">Verificar</button>
            </form>

        </div>

    </div>

</body>

</html>
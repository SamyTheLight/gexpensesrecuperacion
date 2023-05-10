<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'nav.php';
include 'ConexionDB.php';
include 'invitaciones.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="../Styles/Invitaciones.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="./Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">4 days ago</span>

                <?php foreach ($registroInvitacio as $rowR) { ?>
                <h1><?php echo $rowR->Nombre;
                        ?></h1>
                <hr>
                <div class="ex1">
                    <p id="description"><?php echo $rowR->Descripcion;
                                            ?></p>
                </div>
                <?php }
                ?>
                <div class="afegir-mail" id="addmail">
                    <input type="email" class="mails" name="emailEnviados[]" id="mails" placeholder="EMAIL">
                    <button class="btn-email" id="btn-emial">+</button>

                </div>
                <div class="missage-error" id="missage-error">
                    <p id="error">¡El correo no es correcto, porfavor introduzca los carácteres necesarios!</p>
                </div>
                <hr>
                <div class="emails" id="emails">
                    <h3 id="title-emails">¡ESTOS SON LOS CORREOS A LOS QUE DESEAS ENVIAR LA INVITACIÓN!</h3>
                </div>
            </div>
            <div class="card-stats">
                <button type="submit" class="btn-enviar" name="submit" id="btn-enviar">ENVIAR</button>
            </div>
        </div>




    </form>

</body>
<script src="../Scripts/Invitaciones.js"></script>

</html>
<?php

include 'footer.php';
?>
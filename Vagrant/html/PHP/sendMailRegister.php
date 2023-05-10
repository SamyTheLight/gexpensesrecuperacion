<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


try {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'mailcopernicprova@gmail.com';
    $mail->Password = 'tusuihvzulctfnta';
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->setFrom('mailcopernicprova@gmail.com');
    $mail->addAddress($rowEmail);

    $mail->Subject = 'Registro GExpenses';
    $mail->isHTML(true);

    $mailContent = "<head>
    <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .mail{
                display:flex;
                flex-direction: column;
            }
            .title-logo{
                display:flex;
                flex-direction: row;
            }
            .title1{
                color:#6CD4B5;
    
            }
            .title2{
            color: #1C3144;
            }
            .img-logo {
                margin-top: 15px;
                margin-right: 5px;
                width: 40px;
                height: 40px;
    
            }
        </style>
    </head>
    
    <body>
        <div class='mail'>
            <div class='title-logo'>
                <img class='img-logo' src='./Images/logo.PNG' />
                <h1 class='title1'>GE</h1>
                <h1 class='title2'>XPENSES</h1>
             </div>
            <div class='texto'>
                <h1 class=' inline m-L'>Bienvenido Usuario</h1>
                <p class='text'>Para aceptar la invitación a la actividad, por favor, haga click al enlace que aparece en pantalla.</p>
           <br />
                <h4 class='bold'>Atentamente:</h4>
                <p>Oscar Ramírez, Joan Canals y Samuel García</p>
               <p>Saludos.</p><br />
               <a href='http://localhost:8000/Code/GExpenses.php?aceptado=true' >Enviar</a>
            </div>
        </div>
    </body>;";



    //$mail->AddEmbeddedImage("Images/Logo.php", "Logo");



    // $mailink = "http://localhost/php/M07/GExpensesABP/gexpensesabp/Code/GExpenses.php?aceptado=true";
    $mail->Body =  $mailContent;

    $mail->AltBody = "Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece en pantalla.";








    if ($mail->send()) {
        echo 'Correo enviado';
    } else echo 'error al enviar correo';


    $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}

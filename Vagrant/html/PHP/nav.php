<?php
session_start();
include 'ConexionDB.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/nav.css">

</head>

<body>

    <div class="header">

        <!--Imagen/Logo-->
        <div class="header-img">
            <img class="img-logo" src="./Images/logo.PNG">
            <h1>GE</h1>
            <h1 class="h1">XPENSES</h1>
        </div>

        <div class="btn-menu">
            <label for="btn-menu" class="icon-menu"><i class="fa-solid fa-bars"></i></label>
        </div>

        <!--Menu del header-->
        <div class="header-nav">
            <nav class="navbar">
                <ul class="navbar-bar">
                    <a class="nav-item" href="#"><?php echo "Bienvenido, " . $_SESSION['usuario']; ?></a>
                    <li><a class="nav-item" href="#">Home</a></li>
                    <li><a class="nav-item" href="pagos.php">Pagos</a></li>
                    <li><a class="nav-item" href="cerrar_sesion.php">Logout</a></li>
                </ul>

                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>

    </div>
    <script src="Scripts/nav.js"></script>
</body>

</html>
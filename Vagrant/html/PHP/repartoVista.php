<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';
include 'reparto.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/pagos.css?version=1">
    <title>Pagos</title>
</head>

<body>
    <div id="back-form1">
        <div id="form-act1">
            <section class="cantact_info1">
                <section class="info_title1">
                    <h2>REPARTE TUS GASTOS</h2>
                    <section class="info_items1">
                        <p>¡Reparte el gasto con tus amigos! </p>
                    </section>
                </section>
            </section>
            <form action="" id="act-form1" method="POST">
                <button id="btn-cerrar1">X</button>
                <div id="form-pay1">
                    <label for="tipusAct1">Tipo de pago: </label>
                    <select name="tipusActivitat" id="tipusActivitat1" class="form-control1">
                        <option value="" selected disabled>Selecciona un pago</option>
                        <option value="Pago básico">Pago básico</option>
                        <option value="Pago avanzado">Pago avanzado</option>
                    </select>
                </div>
                <div id="reparto" class="oculto">
                    <div class="pago-total">
                    <!-- Mostramos el valor del pago total obtenido de la consulta en formato solo lectura -->
                        <label for="" class="despesa_total">Pago total: </label>
                        <?php foreach ($cantidad as $row) : ?>
                        <input type="number" value="<?php echo $row; ?>" id="despesaTotal" readOnly=true>
                        <?php endforeach; ?>

                    </div>
                    <hr>
                    <div class="pago-individual">
                        <!-- Mostramos la lista de usuarios que ha participado en el pago y la cantidad que 
                             ha pagado cada uno -->
                        <?php foreach ($reparto as $rowReparto) : ?>
                        <label for="" id="memberind"><?php echo  $rowReparto->user_member ?></label>
                        <input type="number" value="<?php echo $rowReparto->importe_repartido; ?>" id="despesaTotal"
                            readOnly=true><br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="btn-card1" id="afegirActivitat1">SELECCIONAR</button>
                <button class="btn-card2" id="aceptar">ACEPTAR</button>
        </div>
        </form>
    </div>

</body>
<script src="../Scripts/reparto.js?version=1"></script>
<?php
include 'footer.php';
?>

</html>
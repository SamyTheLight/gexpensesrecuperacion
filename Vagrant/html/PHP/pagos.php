<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';

if ((isset($_POST['enviarActivitat2']))) {

    if ((!empty($_POST['concepto'])) && (!empty($_POST['import']))) {

        $concepto = $_POST["concepto"];
        var_dump("concepto");
        $cantidad = $_POST["import"];
        var_dump("import");
        $pagador = $_POST["pagador"];
        var_dump("pagador");
        $membersPago = $_POST["members"];

        $countPago = count($membersPago);
        var_dump($countPago);


        $queryActividad = "INSERT INTO pagos (concepto,cantidad,pagador) VALUES (:conceptoA,:cantidadA,:pagadorA)";

        $consultaActivitat = $conexion->prepare($queryActividad);

        $consultaActivitat->bindParam(':conceptoA', $concepto);

        $consultaActivitat->bindParam(':cantidadA', $cantidad);

        $consultaActivitat->bindParam(':pagadorA', $pagador);


        $consultaActivitat->execute();

        $queryPago = $conexion->prepare("SELECT MAX(id_pago) FROM pagos 
            ");

        $queryPago->execute();

        $id_pago = $queryPago->fetch(PDO::FETCH_OBJ);
        var_dump($id_pago);



        foreach ($membersPago as $rowMembers) :
            $queryActividad1 = "INSERT INTO reparto (members,cantidad_pago,user_member,importe_repartido,pago_id) VALUES (:RowMembers,:cantidadA,:membersPagoA,:importeA,:id_pago)";

            $consultaActivitat1 = $conexion->prepare($queryActividad1);

            $consultaActivitat1->bindParam(':RowMembers', $countPago);
            $consultaActivitat1->bindParam(':cantidadA', $cantidad);
            $consultaActivitat1->bindParam(':membersPagoA', $rowMembers);
            $importe_repartidoA = $cantidad / $countPago;
            $consultaActivitat1->bindParam(':importeA', $importe_repartidoA);
            $auxPago = (int) $id_pago;
            $consultaActivitat1->bindParam(':id_pago', $auxPago);
            $consultaActivitat1->execute();

        endforeach;

        Header("Location: /Code/PHP/reparto.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/pagos.css?version=3">
    <title>Pagos</title>
</head>

<body>
    <!-- POP UP ================ -->
    <div id="btn-form">

    </div>
    <div id="back-form1">
        <div id="form-act">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>AÑADE UN PAGO</h2>
                    <section class="info_items">
                        <p>¡Añade un pago para poder gestionar tus deudas! </p>
                    </section>
                </section>
            </section>
            <form action="" id="act-form" method="POST">
                <h2>Actividad 3</h2>
                <div class=" user_info">
                    <label for="names">Concepto </label>
                    <input type="text" id="concepto" placeholder="Elige un concepto" class="form-control"
                        name="concepto">

                    <label for="description">Importe</label>
                    <input type="number" placeholder="Elige un importe" class="form-control" id="importe" name="import">

                    <label for="mensaje">Pagador</label>
                    <select name="pagador" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <option value="Oscar" class="pagador">User1</option>
                        <option value="Joan" class="pagador">User2</option>
                        <option value="Samuel" class="pagador">User3</option>
                    </select>
                    <label for="tipusAct">Miembros</label>
                    <label id="user" for="">User1 <input type="checkbox" value="User1" name="members[]" id="users" class="users"></label>
                    <label id="user" for="">User2 <input type="checkbox" value="User1" name="members[]" id="users" class="users"></label>
                    <label id="user" for="">User3 <input type="checkbox" value="User1" name="members[]" id="users" class="users"></label>
                    <button class="btn-card" name="enviarActivitat2">GUARDAR</button>
                </div>
            </form>
        </div>
</body>
<script src="../Scripts/pagos.js?version=1"></script>
<?php
include 'footer.php';
?>

</html>
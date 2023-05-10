<?php
//Consulta tabla pagos para obtener la cantidad de pago registrado
$queryPago = $conexion->prepare("SELECT cantidad FROM pagos order by id_pago desc");
$queryPago->execute();
// Obtenemos el resultado de la consulta y lo almacenamos en la variable $cantidad
$cantidad = $queryPago->fetch(PDO::FETCH_OBJ);

// Por cada pago obtenido, realizamos una consulta para obtener los usuarios que han contribuido a ese pago
foreach ($cantidad as $rowImport) :
    $queryReparto = $conexion->prepare("SELECT user_member,importe_repartido FROM reparto WHERE cantidad_pago = :cantidadP");
    $queryReparto->bindParam(':cantidadP', $rowImport);
    $queryReparto->execute();
    // Obtenemos el resultado de la consulta y lo almacenamos en la variable $reparto
    $reparto = $queryReparto->fetchAll(PDO::FETCH_OBJ);
endforeach;
?>

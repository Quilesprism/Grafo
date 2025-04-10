<?php

session_start();
$ident=$_GET['variable'];
$ident= trim($ident);
$nombre=$_GET['variable2'];

$today = date("YmdHi");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"".$nombre."_datEscaleraV1.csv\"");


include("conex_based.php");


// Check connection
if ($conex->connect_error) {
  die("La conexión falló: " . $conex->connect_error);
}

$query = "SELECT Jugadores.uid, nombre, institucion, edad, pais,pregunta_1,pregunta_2,pregunta_3,pregunta_4,pregunta_5,pregunta_6,fecha_hora, intento,movimiento,trayectoria
          FROM Jugadores 
          inner join cuestionario ON Jugadores.uid = cuestionario.uid
          inner join Movimientos ON Jugadores.uid = Movimientos.id
          WHERE Jugadores.uid = '$ident'";
$result = $conex->query($query);

if ($result->num_rows > 0) {
    $fields = $result->fetch_fields();
    
    // Prepare the header row
    $header = [];
    foreach ($fields as $field) {
        $header[] = $field->name;
    }
    $data = implode(";", $header) . "\n";

    // Fetch and process the data rows
    while ($row = $result->fetch_assoc()) {
        $rowValues = [];
        foreach ($fields as $field) {
            $rowValues[] = $row[$field->name];
        }
        $data .= implode(";", $rowValues) . "\n";
    }

    // Output the data
    echo $data;
} else {
    echo "No data found";
}

// Close the database connection
 include("cerrar_conexion.php");
 
?>
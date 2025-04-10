<?php
session_start();

include("conex_based.php");

// Create connection
if ($conex->connect_error) {
  die("La conexión falló: " . $conex->connect_error);
}



$id= trim($_SESSION["uid"]);
$intento= $_POST["intento"];
$movimiento= $_POST["movimiento"];
$trayectoria=$_POST["trayectoria"];

//% = $_POST["err"];



$sql = "INSERT INTO Movimientos (id,  intento, movimiento, trayectoria)
VALUES ('$id', '$intento', '$movimiento', '$trayectoria')";

if ($conex->query($sql) === TRUE) {
  echo "Continua Jugando";
} else {
  echo "Error: " . $sql . "<br>" . $conex->error;
}

include("cerrar_conexion.php");

?>

<?php
$servername = "localhost"; //El nombre FQDN del servidor donde corre el motor de base de datos, usualmente Localhost(mismo servidor donde corre PHP y almacenamos este archivo), pero puede usarse cualquiera al que se tenga acceso 
$username = "u573036680_rafa"; // Revisar en la configuración de la base de datos
$password = "Escalera2021#"; // Revisar en la configuración de la base de datos
$dbname = "u573036680_escalera";  //Revisar en la configuración de la base de datos

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("La conexión falló: " . $conn->connect_error);
}

$id= $_POST["id"];
$intento= $_POST["intento"];
$movimiento= $_POST["movimiento"];
$trayectoria=$_POST["trayectoria"];



$sql = "INSERT INTO Juegos (id,  intento, movimiento, trayectoria)
VALUES ('$id', '$intento', '$movimiento', '$trayectoria')";

if ($conn->query($sql) === TRUE) {
  echo "Continua Jugando";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo $$parametro1;
$conn->close();

?>
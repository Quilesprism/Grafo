<?php
$servername = "localhost"; //El nombre FQDN del servidor donde corre el motor de base de datos, usualmente Localhost(mismo servidor donde corre PHP y almacenamos este archivo), pero puede usarse cualquiera al que se tenga acceso 
$username = "id12924573_david"; // Revisar en la configuración de la base de datos
$password = "1141Hanoi32020-"; // Revisar en la configuración de la base de datos
$dbname = "id12924573_hanoi2";  //Revisar en la configuración de la base de datos

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("La conexión falló: " . $conn->connect_error);
}

$id_jugador_a = $_POST["id_jugador_a"];
$numero_jugadas = $_POST["numero_jugadas"];
$parametro1 = $_POST["parametro1"];
$parametro2 =$_POST["parametro2"];
$parametro3 = $_POST["parametro3"];
$parametro4 = $_POST["parametro4"];

$sql = "INSERT INTO juegos_anonimos (id_jugador_a,  numero_jugadas, parametro1, parametro2, parametro3, parametro4)
VALUES ('$id_jugador_a', $numero_jugadas, $parametro1, $parametro2, $parametro3, '$parametro4')";

if ($conn->query($sql) === TRUE) {
  echo "Continua Jugando";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo $$parametro1;
$conn->close();

?>
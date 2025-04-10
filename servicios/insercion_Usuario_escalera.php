<?php
session_start();

$_SESSION['uid'] = uniqid();


// Check the UID value for debugging
echo "UID: " . $_SESSION['uid'];  // For debugging

$_SESSION['nombre'] = $_POST["nombre"];
$_SESSION['edad'] = $_POST["edad"];
$_SESSION['pais'] = $_POST["pais"];
$_SESSION['institucion'] = $_POST["institucion"];
$_SESSION['correo'] = $_POST["correo"];
$uid = $_SESSION['uid'];

include("conex_based.php");

if ($conex->connect_error) {
    die("La conexión falló: " . $conex->connect_error);
}

$id = trim($_SESSION["uid"]);
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$edad = $_POST["edad"];
$pais = $_POST["pais"];
$institucion = $_POST["institucion"];

// Usamos sentencias preparadas para evitar inyección SQL
$sql = "INSERT INTO jugadores (uid, nombre, correo, edad, pais, institucion) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conex->prepare($sql);

if ($stmt === false) {
    die("Error al preparar la consulta: " . $conex->error);
}

// Vinculamos los parámetros a la consulta
$stmt->bind_param("ssssss", $uid, $nombre, $correo, $edad, $pais, $institucion);

if ($stmt->execute()) {
    $id_jugador = $conex->insert_id;
    echo "<h3 class=\"ok\">Todo ha salido muy bien, " . $nombre . "!</h3>";

    // Redirigir al cuestionario con el id del jugador
    echo "<script> setTimeout(function(){  window.location='../servicios/preguntas.php?id_jugador=$id_jugador'; }, 3500) </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la sentencia y la conexión
$stmt->close();
include("cerrar_conexion.php");
include("envio_correo.php");
?>

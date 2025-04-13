<?php
session_start();

$_SESSION['uid'] = uniqid();

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
$nombre = htmlspecialchars($_POST["nombre"]);
$correo = htmlspecialchars($_POST["correo"]);
$edad = htmlspecialchars($_POST["edad"]);
$pais = htmlspecialchars($_POST["pais"]);
$institucion = htmlspecialchars($_POST["institucion"]);

$sql = "INSERT INTO jugadores (uid, nombre, correo, edad, pais, institucion) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conex->prepare($sql);

if ($stmt === false) {
    die("Error al preparar la consulta: " . $conex->error);
}

$stmt->bind_param("ssssss", $uid, $nombre, $correo, $edad, $pais, $institucion);

if ($stmt->execute()) {
    $id_jugador = $conex->insert_id;


    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Registro exitoso!',
                text: 'Todo ha salido muy bien, $nombre.',
                icon: 'success',
                confirmButtonText: 'Continuar',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '../servicios/preguntas.php?id_jugador=$id_jugador';
                }
            });
        });
    </script>";
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al registrar los datos: " . htmlspecialchars($stmt->error) . "',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            });
        });
    </script>";
}

$stmt->close();
include("cerrar_conexion.php");
?>
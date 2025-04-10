<?php

session_start();
$ident = $_SESSION['uid'];  
$res_pre_1 = $_POST["pregunta_1"];
$res_pre_2 = $_POST["pregunta_2"];
$res_pre_3 = $_POST["pregunta_3"];
$res_pre_4 = $_POST["pregunta_4"];
$res_pre_5 = $_POST["pregunta_5"];
$res_pre_6 = $_POST["pregunta_6"];

if (isset($_POST['jugar'])) {
    include("conex_based.php");

    if ($conex->connect_error) {
        die("La conexión falló: " . $conex->connect_error);
    }

    $sql_nodo = "INSERT INTO nodo(id_nodo, tipo, descripcion) VALUES (NULL, ?, ?)";
    $stmt_nodo = $conex->prepare($sql_nodo);

    if ($stmt_nodo === false) {
        die("Error al preparar la consulta para el nodo: " . $conex->error);
    }

    $tipo_nodo = 'jugador';  
    $descripcion_nodo = "Nodo creado para el jugador $ident";  

    $stmt_nodo->bind_param("ss", $tipo_nodo, $descripcion_nodo);

    if ($stmt_nodo->execute()) {
        $id_nodo = $conex->insert_id;

        $sql_cuestionario = "INSERT INTO cuestionario(uid, id_nodo, pregunta_1, pregunta_2, pregunta_3, pregunta_4, pregunta_5, pregunta_6)
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_cuestionario = $conex->prepare($sql_cuestionario);

        if ($stmt_cuestionario === false) {
            die("Error al preparar la consulta para el cuestionario: " . $conex->error);
        }

        $stmt_cuestionario->bind_param("ssssssss", $ident, $id_nodo, $res_pre_1, $res_pre_2, $res_pre_3, $res_pre_4, $res_pre_5, $res_pre_6);

        if ($stmt_cuestionario->execute()) {
            echo "<h3 class=\"ok\">¡Cuestionario completado correctamente!</h3>";
            echo "<script> setTimeout(function(){ window.location='../main.php?id_jugador=$ident'; }, 2000) </script>";
        } else {
            echo "Error al insertar el cuestionario: " . $stmt_cuestionario->error;
        }

        $stmt_cuestionario->close();
    } else {
        echo "Error al crear el nodo: " . $stmt_nodo->error;
    }

    $stmt_nodo->close();

    include("cerrar_conexion.php");
}
?>

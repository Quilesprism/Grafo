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
            // Mostrar mensaje de éxito con SweetAlert
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Cuestionario completado!',
                        text: 'Tus respuestas han sido registradas correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Continuar',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = '../main.php?id_jugador=$ident';
                        }
                    });
                });
            </script>";
        } else {
            // Mostrar mensaje de error con SweetAlert
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al registrar tus respuestas: " . htmlspecialchars($stmt_cuestionario->error) . "',
                        icon: 'error',
                        confirmButtonText: 'Intentar de nuevo',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.history.back();
                        }
                    });
                });
            </script>";
        }

        $stmt_cuestionario->close();
    } else {
        // Mostrar mensaje de error con SweetAlert
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al crear el nodo: " . htmlspecialchars($stmt_nodo->error) . "',
                    icon: 'error',
                    confirmButtonText: 'Intentar de nuevo',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                });
            });
        </script>";
    }

    $stmt_nodo->close();

    include("cerrar_conexion.php");
}
?>
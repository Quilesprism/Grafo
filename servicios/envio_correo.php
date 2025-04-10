<?php


$name=$_SESSION['nombre'];
$insti=$_SESSION['institucion'];
$corr= $_SESSION['correo'];
$pais=$_SESSION['pais'];
$edad=$_SESSION['edad'];
$uid= $_SESSION['uid'];



    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "juegosmatematicos@juegosmatematicos.online";
    $to = "$corr";
    $subject = "Codigo identificador";
    $message = 
    "Los datos registrados son los siguientes:\r \n
    Nombre: $name \r\n
    Institucion: $insti \r\n
    Pais de residencia: $pais \r\n
    Edad: $edad \r\n
    Codigo identificador asignado: $uid";
                

    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "<h3 class=\"ok\">Te hemos enviado un correo con la información suministrada a: "  .$corr."</h3>";

   
?>
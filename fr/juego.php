<?php
session_start();
$_SESSION['ind_grafo'] = false;
$_SESSION['ind_agente'] = false;
$nombre = $_SESSION['nombre'];
$id = $_SESSION['uid'];
$idioma=$_SESSION['idioma'];
echo "<div id=\"uid\" style =\"display:none; \">$id</div>";
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- PLEASE NO CHANGES BELOW THIS LINE (UNTIL I SAY SO) -->
  <script language="javascript" type="text/javascript" src="libraries/p5.min.js"></script>
  <script language="javascript" type="text/javascript" src="AALG53P5JS.js"></script>
  <script language="javascript" type="text/javascript" src="libraries/sincroniza.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.min.js" integrity="sha512-N4kV7GkNv7QR7RX9YF/olywyIgIwNvfEe2nZtfyj73HdjCUkAfOBDbcuJ/cTaN04JKRnw1YG1wnUyNKMsNgg3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <!-- para usar JQUERY desde repo ONLINE -->

  <!-- OK, YOU CAN MAKE CHANGES BELOW THIS LINE AGAIN -->

  <!-- This line removes any default padding and style.
   You might only need one of these values set. -->
   <style> body { padding: 0; margin: 0; } </style>
 </head>

 <body>
  <?php
  echo "<div id=\"uid\" style =\"display:none; \">$id</div>";
  ?>

</body>
</html>

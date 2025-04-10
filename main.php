<?php
session_start();
$_SESSION['ind_grafo'] = false;
$_SESSION['ind_agente'] = false;
$nombre=$_SESSION['nombre']; 
$ident=$_SESSION['uid'];
//$nombre = $_SESSION['nombre'];
//$id = $_SESSION['uid'];
//$idioma=$_SESSION['idioma'];
//echo "<div id=\"uid\" style =\"display:none; \">$id</div>";
?>


<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ESCALERA V.01</title>
  <link rel="stylesheet"  href="css/estilojuego.css">
  <script language="javascript" type="text/javascript" src="libraries/p5.min.js"></script>
  <script language="javascript" type="text/javascript" src="Cod_Escalera_V1.js"></script>
  <!--<script language="javascript" type="text/javascript" src="libraries/sincroniza.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   <!-- para usar JQUERY desde repo ONLINE -->

  <!-- OK, YOU CAN MAKE CHANGES BELOW THIS LINE AGAIN -->

  <!-- This line removes any default padding and style.
   You might only need one of these values set. 
   <style> body { padding: 0; margin: 0; } </style>-->
 </head>

 <body>
     
     <div class="mensaje">
         <p>  El objetivo del juego es intercambiar de posición los grupos de fichas, el color rojo deben quedar en el lugar del azul y viceversa. </p>
         <ul>
             <li>Regla 1. Al hacer click sobre la ficha esta se desplaza al espacio vacio si las siguientes reglas lo permiten.<br> &nbsp;&nbsp;&nbsp;&nbsp;Caso contrario se reinicia.</li>
             <li>Regla 2. No puedes volver a la posición inmediatamente anterior.</li>
             <li>Regla 3. Solo puedes saltar una pieza de color contrario</li>
        </ul>
               
              

     </div>
     
 <div id ="uid" style="display: none" name = <?echo($_SESSION['uid'])?>>
      <?php
      echo($_SESSION['uid']);
      ?>
    </div>
    <div id ="gid" style="display: none"name = <?echo($_SESSION['gid'])?>>
    <?php
      echo($_SESSION['game-id']);
      ?>
    </div>
    <div id ="name" style="display: none"name = <?echo($_SESSION['nombre'])?>>
    <?php
      echo($_SESSION['nombre']);
      ?>
    </div>

     <a  style="bottom: 20px;right: 20px; position: fixed;" title="Descargar datos" href="/escalera/grafo/public/index.html"> <img src="images/icons8-grafico-80.png" alt="Descargar"> </a>
     

</body>
</html>

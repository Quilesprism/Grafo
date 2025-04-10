<?php
session_start();
$ident=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba registro</title>
    <link rel="stylesheet"  href="../css/estilop.css">
</head>
<body>
  
    <form action="insercion_cuestionario_escalera.php" method="post" onsubmit="return validarFormulario()">
      <div>
        <img class=ud src="../images/logoUD.png"/>
         <img class=met src="../images/logoMet2.png"/>
      </div>   

	  


        <h1>¡Cuestionario!</h1>

		<div class="preguntas">
        <label>
          ¿Cuál es la forma más efectiva de presentar un problema de matemáticas?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_1" value="1"> Con imágenes o gráficos</li>
          <li><input type="radio" name="pregunta_1" value="2"> Contándolo como una historia</li>
          <li><input type="radio" name="pregunta_1" value="3"> Usando letras y números, como en las ecuaciones</li>
        </ul>
      </div>
   
    <div class="preguntas">
       <label>
          ¿Qué haces primero para abordar un problema matemático?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_2" value="1"> Intento recordar problemas similares que he resuelto</li>
          <li><input type="radio" name="pregunta_2" value="2"> Busco regularidades en los números o formas</li>
          <li><input type="radio" name="pregunta_2" value="3"> Utilizo estrategias que me han enseñado</li>
        </ul>
    </div>

    <div class="preguntas">
       <label>
       ¿Cuál sería el orden de las acciones que le permitirían ganar un juego?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_3" value="1"> Identificar el objetivo del juego, identificar la lógica del juego, identificar las reglas del juego</li>
          <li><input type="radio" name="pregunta_3" value="2"> Identificar la lógica del juego, identificar el objetivo del juego, identificar las reglas del juego</li>
          <li><input type="radio" name="pregunta_3" value="3"> Identificar las reglas del juego, identificar el objetivo del juego, identificar la lógica del juego</li>
        </ul>
    </div>

    <div class="preguntas">
       <label>
       ¿Estás seguro de que puedes resolver cualquier tarea que te den los profesores?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_4" value="1"> Muy pocas veces </li>
          <li><input type="radio" name="pregunta_4" value="2"> A veces </li>
          <li><input type="radio" name="pregunta_4" value="3"> Siempre </li>
        </ul>
    </div>

    <div class="preguntas">
       <label>
       ¿Puedes concentrarte en una actividad?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_5" value="1"> Fácilmente </li>
          <li><input type="radio" name="pregunta_5" value="2"> Tengo dificultades </li>
          <li><input type="radio" name="pregunta_5" value="3"> No puedo </li>
        </ul>
    </div>

    <div class="preguntas">
       <label>
       ¿Con qué frecuencia usas aplicaciones de Inteligencia Artificial (IA) para tareas escolares?
       </label>
        <ul>
          <li><input type="radio" name="pregunta_6" value="1"> Siempre </li>
          <li><input type="radio" name="pregunta_6" value="2"> Algunas veces </li>
          <li><input type="radio" name="pregunta_6" value="3"> Pocas veces </li>
          <li><input type="radio" name="pregunta_6" value="3"> Nunca </li>
        </ul>
    </div>

    <input type="submit" name = "jugar" value="Continuar">
			

      </div>
    </form>

	<script>
    function validarFormulario() {
            // Obtener todas las preguntas
            var preguntas = document.querySelectorAll('.preguntas');
            var formularioValido = true;
            var preguntasSinResponder = [];

            // Iterar sobre cada pregunta
            preguntas.forEach(function(pregunta) {
                // Obtener todas las opciones de la pregunta actual
                var opciones = pregunta.querySelectorAll('input[type="radio"]');
                var seleccionada = false;

                // Verificar si se ha seleccionado alguna opción
                opciones.forEach(function(opcion) {
                    if (opcion.checked) {
                        seleccionada = true;
                    }
                });

                // Si ninguna opción está seleccionada, agregar la pregunta a la lista de preguntas sin responder
                if (!seleccionada) {
                    formularioValido = false;
                    preguntasSinResponder.push(pregunta);
                }
            });

            // Si hay preguntas sin responder, mostrar mensaje de advertencia
            if (!formularioValido) {
                alert("Por favor, selecciona una opción para todas las preguntas.");
                preguntasSinResponder[0].scrollIntoView({ behavior: 'smooth' }); // Desplazar la pantalla hacia la primera pregunta sin responder
            }

            return formularioValido;
        }
  </script>
 
</body>
</html>
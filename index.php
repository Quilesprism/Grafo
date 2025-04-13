<!-- filepath: c:\xampp\htdocs\Proyecto\Grafo\index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba registro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="formulario">
        <form action="servicios/insercion_Usuario_escalera.php" method="post">
            <div>
                <img class="ud" src="images/logoUD.png" alt="Logo UD">
                <img class="met" src="images/logoMet2.png" alt="Logo Met">
            </div>

            <div class="campos">
                <h1>¡Regístrate!</h1>

                <!-- Campo de nombre -->
                <input type="text" name="nombre" placeholder="Iniciales de tu nombre" required>

                <p>¿Cuántos años tienes?</p>
                <select name="edad" required>
                    <?php for ($i = 1; $i <= 80; $i++): ?>
                        <option value="<?= htmlspecialchars($i) ?>"><?= htmlspecialchars($i) ?></option>
                    <?php endfor; ?>
                </select>

                <p>¿De qué país eres?</p>
                <select name="pais" id="pais" required>
                    <?php
                    $paises = [
                        "AFGANISTAN", "ALBANIA", "ALEMANIA", "ANDORRA", "ANGOLA", "ARGENTINA", 
                        "AUSTRALIA", "AUSTRIA", "BELGICA", "BRASIL", "CANADA", "CHILE", 
                        "CHINA", "COLOMBIA", "CUBA", "DINAMARCA", "ESPAÑA", "ESTADOS UNIDOS DE AMERICA", 
                        "FRANCIA", "ITALIA", "JAPON", "MEXICO", "PERU", "REINO UNIDO", "RUSIA", 
                        "SUECIA", "VENEZUELA"
                    ];
                    foreach ($paises as $pais) {
                        $selected = $pais === "COLOMBIA" ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($pais) . "' $selected>" . htmlspecialchars($pais) . "</option>";
                    }
                    ?>
                </select>

                <input type="text" name="institucion" placeholder="Institución educativa" required>
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="submit" name="register" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora IMC</title>
</head>
<body>
    <h2>Calculadora de IMC</h2>

    <form method="post" action="">
        <input type="number" step="0.01" name="altura" placeholder="Ingrese su altura en m" required>
        <input type="number" step="0.01" name="peso" placeholder="Ingrese su peso en Kg" required>
        <button type="submit" name="calcular">Calcular</button>
        <button type="button" onclick="window.location.href='index.php'">Limpiar</button>
    </form>

    <?php
    // Comprobamos si se ha enviado el formulario
    if (isset($_POST['calcular'])) {
        // Los datos se procesan solo si se presiona el botón "Calcular"
        $altura = floatval($_POST['altura']);
        $peso = floatval($_POST['peso']);

        // Verificamos que la altura sea mayor que 0 para evitar división por cero
        if ($altura > 0) {
            // Cálculo del Índice de Masa Corporal
            $imc = round($peso / pow($altura, 2), 2);

            echo "<h3>Altura ingresada: " . htmlspecialchars($altura) . " m</h3>";
            echo "<h3>Peso ingresado: " . htmlspecialchars($peso) . " kg</h3>";
            echo "<h3>Su Índice de Masa Corporal es: " . htmlspecialchars($imc) . "</h3>";

            if ($imc < 18.5) {
                echo "<p>Resultado: <span style='color: blue;'>Bajo peso</span></p>";
            } elseif ($imc >= 18.5 && $imc < 25) {
                echo "<p>Resultado: <span style='color: green;'>Peso normal</span></p>";
            } elseif ($imc >= 25 && $imc < 30) {
                echo "<p>Resultado: <span style='color: orange;'>Sobrepeso</span></p>";
            } else {
                echo "<p>Resultado: <span style='color: red;'>Obesidad</span></p>";
            }

        } else {
            // Mensaje de error si la altura es inválida
            echo "<p style='color: red;'>La altura no puede ser cero o un valor negativo.</p>";
        }

    } else {
        // Este bloque se ejecuta cuando la página se carga por primera vez
        echo "<p>Ingrese su peso y altura para calcular el IMC.</p>";
    }
    ?>
</body>
</html>
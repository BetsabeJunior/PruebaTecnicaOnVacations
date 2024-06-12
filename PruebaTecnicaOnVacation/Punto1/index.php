<!-- 1) Haga una rutina que tome el parámetro de cadena de entrada, que contendrá
números de un solo dígito, letras y signos de interrogación, y verifique si hay
exactamente 3 signos de interrogación entre cada par de dos números que sumen
10. Si es así, entonces su programa debería devolver la cadena verdadera, de lo
contrario debería devolver la cadena falsa. Si no hay dos números que sumen 10
en la cadena, entonces su programa también debería devolver falso.
Por ejemplo: si la cadena de entrada es &#39;arrb6 ??? 4xxbl5 ??? eee5&#39;, entonces su
programa debería devolver verdadero porque hay exactamente 3 signos de
interrogación entre 6 y 4, y 3 signos de interrogación entre 5 y 5 al final de la
cadena.
Ejemplo:
Entrada: &quot;aa6?9&quot;
Salida: false
Entrada: &quot;acc?7??sss?3rr1??????5&quot;
Salida: true -->

<?php
/**
 * Función para verificar si hay exactamente 3 signos de interrogación entre cada par de números que sumen 10.
 *
 * @param string $cadena La cadena de entrada que contiene números, letras y signos de interrogación.
 * @return string "verdadero" si la condición se cumple, de lo contrario "falso".
 */
function verificarSignosInterrogacion($cadena) {
    // Buscar todos los números en la cadena y sus posiciones
    preg_match_all('/\d/', $cadena, $numeros, PREG_OFFSET_CAPTURE);
    $numeros = $numeros[0];
    
    // Si no hay al menos dos números, devolver "falso"
    if (count($numeros) < 2) {
        return "falso";
    }
    
    // Verificar pares de números que sumen 10
    for ($i = 0; $i < count($numeros) - 1; $i++) {
        for ($j = $i + 1; $j < count($numeros); $j++) {
            $numero1 = $numeros[$i][0];
            $numero2 = $numeros[$j][0];
            $posicion1 = $numeros[$i][1];
            $posicion2 = $numeros[$j][1];
            
            if ($numero1 + $numero2 == 10) {
                // Extraer la subcadena entre los dos números
                $subcadena = substr($cadena, $posicion1 + 1, $posicion2 - $posicion1 - 1);
                // Contar signos de interrogación en la subcadena
                if (substr_count($subcadena, '?') != 3) {
                    return "falso";
                }
            }
        }
    }
    
    return "verdadero";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Signos de Interrogación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004494;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Verificar Signos de Interrogación</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group mb-3">
                        <label for="inputCadena">Ingrese la cadena:</label>
                        <input type="text" class="form-control" id="inputCadena" name="inputCadena" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Verificar</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cadenaEntrada = $_POST["inputCadena"];
                    $resultado = verificarSignosInterrogacion($cadenaEntrada);
                    echo "<div class='mt-4 alert alert-" . ($resultado == "verdadero" ? "success" : "danger") . "'>";
                    echo $resultado == "verdadero" ? "Verdadero" : "Falso";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

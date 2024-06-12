<!-- 5) Hay un vendedor de libros que gana comisiones por sus ventas, estas
comisiones son de acuerdo al cumplimiento de sus metas mensuales.
Ejemplo: Si el vendedor solo llega al 60% de su meta solo se le paga el 60% de
sus comisiones, si llega al 70% se le paga el 70% de sus comisiones.
Pero si sus ventas superan sus metas se calcula diferente. Si la supera 120% se
le paga 102% de sus comisiones, si lo supera 125% se le paga 102% de sus
comisiones, si supera 130% se le paga 103% de sus comisiones, si supera 149%
se le paga 104% de sus comisiones etc.
Realice un código en PHP que calcule las comisiones al vendedor. -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Comisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8d7da;
            border-radius: 5px;
        }
        .resultado h3 {
            color: #721c24;
        }
        .resultado p {
            color: #721c24;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Calculadora de Comisiones de Vendedor</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="ventas" class="form-label">Ventas Mensuales (en pesos)</label>
                <input type="text" class="form-control" id="ventas" name="ventas" required>
            </div>
            <div class="mb-3">
                <label for="meta" class="form-label">Meta Mensual (en pesos)</label>
                <input type="text" class="form-control" id="meta" name="meta" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calcular Comisión</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ventas = str_replace(',', '', $_POST['ventas']);
            $meta = str_replace(',', '', $_POST['meta']);

            $cumplimiento = $ventas / $meta * 100;

            if ($cumplimiento < 100) {
                $comisiones = $cumplimiento;
            } elseif ($cumplimiento >= 100 && $cumplimiento <= 120) {
                $comisiones = $cumplimiento;
            } elseif ($cumplimiento > 120 && $cumplimiento <= 125) {
                $comisiones = 102;
            } elseif ($cumplimiento > 125 && $cumplimiento <= 130) {
                $comisiones = 102;
            } elseif ($cumplimiento > 130 && $cumplimiento <= 149) {
                $comisiones = 103;
            } else {
                $comisiones = 104;
            }
            ?>

            <div class="resultado">
                <h3 class="text-center">Resultado:</h3>
                <p>Ventas: $<?php echo number_format($ventas, 0, ',', '.'); ?></p>
                <p>Meta: $<?php echo number_format($meta, 0, ',', '.'); ?></p>
                <p>Cumplimiento de Meta: <?php echo number_format($cumplimiento, 2, ',', '.'); ?>%</p>
                <p>Comisiones: <?php echo number_format($comisiones, 2, ',', '.'); ?>%</p>
            </div>

        <?php } ?>
    </div>
    <script>
        // Formatear los números mientras se escriben
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="text"]').forEach(function(input) {
                input.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    e.target.value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                });
            });
        });
    </script>
</body>
</html>

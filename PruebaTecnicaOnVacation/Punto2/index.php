<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma Mínimo y Máximo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
        <h2 class="text-center mb-4">Suma Mínimo y Máximo</h2>
        <div id="matriz-container">
            <table class="table table-bordered">
                <tr>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                    <td><input type="number" class="form-control" required></td>
                </tr>
            </table>
        </div>
        <button class="btn btn-primary" onclick="calcularSuma()">Calcular Suma</button>
        <div id="resultado" class="mt-4"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
function calcularSuma() {
    const inputs = document.querySelectorAll('#matriz-container input');
    const matriz = [];
    for (let i = 0; i < 3; i++) {
        const fila = [];
        for (let j = 0; j < 4; j++) {
            fila.push(parseInt(inputs[i * 4 + j].value));
        }
        matriz.push(fila);
    }

    $.ajax({
        type: 'POST',
        url: 'calcular.php',
        data: { matriz: matriz },
        success: function(response) {
            document.getElementById('resultado').innerHTML = response;
        },
        error: function() {
            alert('Error al calcular la suma');
        }
    });
}
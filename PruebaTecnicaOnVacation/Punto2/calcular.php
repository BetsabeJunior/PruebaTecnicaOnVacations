<?php
function encontrarMinMax($matriz) {
    $min = $matriz[0][0];
    $max = $matriz[0][0];

    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            if ($valor < $min) {
                $min = $valor;
            }
            if ($valor > $max) {
                $max = $valor;
            }
        }
    }

    return array($min, $max);
}

$matriz = $_POST['matriz'];
list($minimo, $maximo) = encontrarMinMax($matriz);
$suma = $minimo + $maximo;

echo "La suma del número mínimo (<b>$minimo</b>) y el número máximo (<b>$maximo</b>) es: <b>$suma</b>";
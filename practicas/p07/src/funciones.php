<?php
function esMultiploDe5y7($numero) {
    if(isset($_GET['numero']))
    {
        $num = $numero;
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
    }
}
?>

<?php
function ParImpar() {
    // Inicializamos la matriz vacía
    $matriz = [];

    // Contador de iteraciones
    $iteraciones = 0;

    // Función para generar un número aleatorio de 3 dígitos
    function generarNumeroAleatorio() {
        return rand(100, 999); // Generar números aleatorios de 3 dígitos
    }

    // Función para verificar la secuencia impar, par, impar
    function esImparParImpar($num1, $num2, $num3) {
        return ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);
    }

    // Ciclo mientras no se cumpla la secuencia impar, par, impar
    $encontrado = false;
    while (!$encontrado) {
        // Generar una fila con 3 números aleatorios
        $fila = [
            generarNumeroAleatorio(), // Primer número
            generarNumeroAleatorio(), // Segundo número
            generarNumeroAleatorio()  // Tercer número
        ];
        
        // Guardar la fila en la matriz
        $matriz[] = $fila;
        
        // Incrementar el contador de iteraciones
        $iteraciones++;

        // Verificar si esta fila cumple con la estructura impar, par, impar
        if (esImparParImpar($fila[0], $fila[1], $fila[2])) {
            $encontrado = true; // Terminar el ciclo si se encuentra la secuencia deseada
        }
    }

    // Mostrar la matriz completa
    echo "Secuencias generadas:\n";
    echo'<br>';
    foreach ($matriz as $fila) {
        echo implode(", ", $fila) . "\n";
        echo'<br>';
    }

    // Mostrar resultados finales
    $totalNumeros = $iteraciones * 3;
    echo "\n$totalNumeros números obtenidos en $iteraciones iteraciones\n";

}
?>

<?php
function arrfor(){
    // Crear el arreglo con un ciclo for
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i); // chr() convierte el código ASCII en su correspondiente caracter
    }

    // Generar una tabla en XHTML usando foreach
    //echo "<table border='1' cellpadding='10' cellspacing='0'>";
    //echo "<tr><th>Código ASCII</th><th>Letra</th></tr>";


    foreach($arreglo as $key => $value){
        echo $key.' => '.$value.'<br>';
    }
    //echo "</table>";
}
?>
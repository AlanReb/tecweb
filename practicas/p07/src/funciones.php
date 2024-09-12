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
function numdado($numero2){
    // Obtener el número dado vía GET
    $numero = $numero2;
    if (isset($_GET['numero2'])) {
        $numero = intval($_GET['numero2']); // Convertir a entero el valor obtenido por GET

        if ($numero > 0) {
            // Iniciar el ciclo while
            $encontrado = false;
            $intento = 0; // Contador de intentos

            while (!$encontrado) {
                $aleatorio = rand(1, 1000); // Generar número aleatorio entre 1 y 1000
                $intento++;

                if ($aleatorio % $numero == 0) {
                    $encontrado = true;
                    echo "Número aleatorio múltiplo de $numero encontrado: $aleatorio (Intentos: $intento)";
                }
            }
        } else {
            echo "Por favor, proporciona un número mayor a 0.";
        }
    }
}
?>

<?php
function numdadodo($numero2){
    $numero = $numero2;
    // Obtener el número dado vía GET
    if (isset($_GET['numero2'])) {
        $numero = intval($_GET['numero2']); // Convertir a entero el valor obtenido por GET

        if ($numero > 0) {
            // Iniciar el ciclo do-while
            $intento = 0; // Contador de intentos

            do {
                $aleatorio = rand(1, 1000); // Generar número aleatorio entre 1 y 1000
                $intento++;
            } while ($aleatorio % $numero != 0); // Repetir mientras no sea múltiplo

            echo "Número aleatorio múltiplo de $numero encontrado: $aleatorio (Intentos: $intento)";
        } else {
            echo "Por favor, proporciona un número mayor a 0.";
        }
    } else {
        echo "Por favor, proporciona un número usando el parámetro 'numero' en la URL.";
    }
}
?>


<?php
function arrfor(){
    // Crear el arreglo con un ciclo for
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i); // chr() convierte el código ASCII en su correspondiente caracter
    }

    foreach($arreglo as $key => $value){
        echo $key.' => '.$value.'<br>';
    }

}
?>


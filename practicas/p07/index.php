<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        include_once('src/funciones.php');
        esMultiploDe5y7($_GET['numero']);

    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
secuencia compuesta por: impar, par, impar</p>
    <?php
        include_once('src/funciones.php');
       ParImpar();

    ?>

<h2>Ejercicio 3</h2>
    <p> Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado. </p>
    <?php
        include_once('src/funciones.php');
        numdado($_GET['numero2']);

    ?>

    <p> Crear una variante de este script utilizando el ciclo do-while, el número dado se debe obtener vía GET. </p>
    <?php
        include_once('src/funciones.php');
        numdadodo($_GET['numero2']);

    ?>

<h2>Ejercicio 4</h2>
    <p> Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la 'a'
    a la 'z'. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice. Es decir: <br>
    <br> [97] => a
    <br>[98] => b
    <br>[99] => c
    <br>...
    <br>[122] => z
    
    <br>✓ Crea el arreglo con un ciclo for
    <br>✓ Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach
    </p>
    <?php
        include_once('src/funciones.php');
        arrfor();

    ?>

<h2>Ejercicio 5</h2>
    <p> Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
bienvenida apropiado. </p>
    <?php
        include_once('src/funciones.php');


    ?>

<h2>Ejercicio 6</h2>
    <p> Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
    una ciudad.<br>
    Para hacer esto toma en cuenta las siguientes instrucciones:
    <br>✓ Crea en código duro el registro para 15 autos
    <br>✓ Utiliza un único arreglo, cuya clave de cada registro sea la matricula
    <br>✓ Lógicamente la matricula no se puede repetir.
    <br>✓ Los datos del Auto deben ir dentro de un arreglo.
    <br>✓ Los datos del Propietario deben ir dentro de un arreglo.




</p>
    <?php
        include_once('src/funciones.php');


    ?>
   
</body>
</html>
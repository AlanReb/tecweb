<?php

$a = "ManejadorSQL";
echo $a;
echo '<br>';

$b = 'MySQL';
echo $b;
echo '<br>';

$c = &$a;
echo $c;
echo '<br>';


$a = "PHP server";
$b = &$a;
echo $a;
echo '<br>';
echo $b;
echo '<br>';
echo '<br>';

// 3. Muestra el contenido de cada variable inmediatamente después de cada asignación
echo "Ejercicio 3: Evolución del tipo de variables\n";

$a = "PHP5";
echo "\$a = $a\n";
echo '<br>';

$z[] = &$a;
print_r($z);
echo '<br>';

$b = "5a version de PHP";
echo "\$b = $b\n";
echo '<br>';

$c = $b * 10; // Esto generará un error de tipo no numérico
echo "\$c = $c\n";
echo '<br>';

$a .= $b;
echo "\$a = $a\n";
echo '<br>';


$b *= $c;
echo "\$b = $b\n";
echo '<br>';

$z[0] = "MySQL";
print_r($z);

echo "\n\n";
echo '<br>';
echo '<br>';


// 4. Lee y muestra los valores de las variables del ejercicio anterior usando $GLOBALS
echo "Ejercicio 4: Lectura de variables usando \$GLOBALS\n";

echo "\$GLOBALS['a'] = " . $GLOBALS['a'] . "\n";
echo '<br>';
echo "\$GLOBALS['b'] = " . $GLOBALS['b'] . "\n";
echo '<br>';
echo "\$GLOBALS['c'] = " . $GLOBALS['c'] . "\n";
echo '<br>';
print_r($GLOBALS['z']);

echo "\n\n";
echo '<br>';
echo '<br>';


// 5. Valor de las variables $a, $b, $c al final del script
echo "Ejercicio 5: Valor de variables después de asignaciones y conversiones de tipo\n";

$a = "7 personas";
echo "\$a = $a\n";
echo '<br>';

$b = (integer) $a;
echo "\$b = $b\n";
echo '<br>';

$a = "9E3";
echo "\$a = $a\n";
echo '<br>';

$c = (double) $a;
echo "\$c = $c\n";

echo "\n\n";
echo '<br>';
echo '<br>';


// 6. Comprobar el valor booleano de las variables y mostrarlas con var_dump
echo "Ejercicio 6: Valores booleanos de las variables\n";

$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
var_dump($f);

echo '<br>';

// Transformar los valores booleanos de $c y $e para mostrarlos con echo
echo "\nTransformando valores booleanos para mostrar con echo\n";

echo "Valor de \$c: " . ($c ? 'true' : 'false') . "\n";
echo "Valor de \$e: " . ($e ? 'true' : 'false') . "\n";

echo "\n\n";
echo '<br>';
echo '<br>';


// 7. Usando la variable $_SERVER
echo "Ejercicio 7: Información del servidor\n";

// a. La versión de Apache y PHP
echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Versión de PHP: " . phpversion() . "\n";

// b. El nombre del sistema operativo (servidor)
echo "Sistema operativo del servidor: " . PHP_OS . "\n";

// c. El idioma del navegador (cliente)
echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\n";

?>
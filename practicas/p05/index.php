<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Ejercicios Práctica número 5</title>
    <style type="text/css">
        body {
            background-color: #e7f1eb;
            margin: 0 15%;
            font-family: 'sans-serif';
        }

        h1 {
            text-align: center;
            font-family: serif;
            font-weight: normal;
            text-transform: uppercase;
            border-bottom: 1px solid #15671b;
            margin-top: 30px;
        }

        h2 {
            color: #0d430b;
            font-size: 1em;
        }


    </style>
</head>



<body>
    <div style="text-align: center">


        <!-- Titulo principal -->
    <h1>Ejercicios Práctica número 5</h1>


     <!-- Titulo secundario -->
     <h3>1. Determina cual de las siguientes variables son validas y explica por que: <br />
        $_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5 </h3>

    <!-- Párrafo descriptivo -->
    <p> El único elemento que no es válido, dado que no tiene el $ es myvar </p>
    <!-- Salto de parrafo -->
    <br />


    <!-- Titulo secundario -->
    <h3>2. Proporcionar los valores de $a, $b, $c como sigue: <br />
        $a = &quot;ManejadorSQL&quot;;<br />
        $b = 'MySQL';<br />
        $c = &amp;$a;<br /> </h3>

    <!-- Párrafo descriptivo -->
    <p> Se muestran como:  </p>
    <!-- Lista -->
    <ul>
        <li> ManejadorSQL</li>
        <li> MySQL</li>
        <li> ManejadorSQL</li>
    </ul>
    <h2>Describe en y muestra en la pagina obtenida que ocurrio en el segundo bloque de
        asignaciones <br /></h2>
        <p> Se muestran como:  </p>
        <ul>
            <li> PHP Server</li>
            <li> PHP Server</li>
        </ul>

    <!-- Titulo secundario -->
    <h3> 3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):
    <br />$a = $a = &quot;PHP5&quot;;
    <br />$z[] = $c = &amp;$a;<br />
    <br />$b = &quot;5a version de PHP&quot;;
    <br />$c = $b*10;
    <br />$a .= $b;
    <br />$b *= $c;
    <br />$z[0] = &quot;MySQL&quot;;
    <br />
    <br />
    </h3>

    <!-- Párrafo descriptivo -->
    <p> Se muestran del modo siguiente:  </p>
        <!-- Lista -->
        <ul>
            <li> $a = PHP5 </li>
            <li> $z = Array ( [0] => PHP5 ) </li>
            <li> $b = 5a version de PHP </li>
            <li> Da warning c, dado que no se puede multiplicar un string, $c = 50</li>
            <li> $a = 5050</li>
            <li> $b = 25502500</li>
            <li> Array ( [0] => MySQL )            </li>
        </ul>

 
        <h3>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</h3>

    <!-- Párrafo descriptivo -->
    <p> Se muestran del modo siguiente:  </p>
            <!-- Lista -->
        <ul>
            <li> $GLOBALS['a'] = MySQL </li>
            <li> $GLOBALS['b'] = MySQL </li>
            <li> $GLOBALS['c'] = MySQL </li>
            <li> Array ( [0] => MySQL ) </li>
        </ul>
    <br />
    <br />


    <h3>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:
    <br />$a = &quot;7 personas&quot;;
    <br />$b = (integer) $a;
    <br />$a = &quot;9E3&quot;;
    <br />$c = (double) $a;
    </h3>
    <!-- Párrafo descriptivo -->
    <p> Se muestra correctamente y del modo siguiente:  </p>
        <!-- Lista -->
        <ul>
            <li> $a = 7 personas </li>
            <li> $b = 7 </li>
            <li> $b = 5a version de PHP </li>
            <li> $a = 9E3 </li>
            <li> $c = 9000 </li>
        </ul>
    <br />
    <br />


    <h3>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(datos).
    Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
    en uno que se pueda mostrar con un echo:
    <br />$a = &quot;0&quot;;
    <br />$b = &quot;TRUE&quot;;
    <br />$c = FALSE;
    <br />$d = ($a OR $b);
    <br />$e = ($a AND $c);
    <br />$f = ($a XOR $b);
    </h3>
    <!-- Párrafo descriptivo -->
    <p> En este hay una situación, al abrir el php del navegador, todas las variables muestran bool(false), sin embargo, en php tester se muestran los resultados siguientes:  </p>
        <!-- Lista -->
        <ul>
            <li> string(1) &quot;0&quot; </li>
            <li> string(4) &quot;TRUE&quot; </li>
            <li> bool(false) </li>
            <li> bool(true)</li>
            <li> bool(false)</li>
            <li> bool(true)</li>
        </ul>
    <p> Para mostrar el booleano se encotraron dos manera, una es con una funcion que sería: echo ($variable ? 'true' : 'false'), esta mostrará true o false. Otra manera es sencillamente casteando a int: echo (int)$variable y este mostrará 0 o 1  </p>
    <br />
    <br />


    <h3>7. Usando la variable predefinida $_SERVER, determina lo siguiente:
    <br />a. La versión de Apache y PHP,
    <br />b. El nombre del sistema operativo (servidor),
    <br />c. El idioma del navegador (cliente).
    </h3>
    <!-- Párrafo descriptivo -->
    <p> Se muestran del modo siguiente:  </p>
        <!-- Lista -->
        <ul>
            <li> Versión de Apache: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12 Versión de PHP: 8.2.12 </li>
            <li> Sistema operativo del servidor: WINNT  </li>
            <li> $b = 5a version de PHP </li>
            <li> Idioma del navegador: es-MX,es;q=0.8,en-US;q=0.5,en;q=0.3 </li>
        </ul>


    </div>
</body> 
</html>
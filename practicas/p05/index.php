<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios Práctica número 5</title>
    <style>
        body {
            background-color: #e7f1eb;
            margin: 0 15%;
            font-family: sans-serif;
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
            color: #0d430bdb;
            font-size: 1em;
        }


    </style>
</head>

<div style="text-align: center">
    
</div>

<body>
        <!-- Titulo principal -->
    <h1>Ejercicios Práctica número 5</h1>


     <!-- Titulo secundario -->
     <h3>1. Determina cual de las siguientes variables son validas y explica por que: <br>
        $_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5 </h3>

    <!-- Párrafo descriptivo -->
    <p> El único elemento que no es válido, dado que no tiene el $ es myvar </p>
    <!-- Salto de parrafo -->
    <br>


    <!-- Titulo secundario -->
    <h3>2. Proporcionar los valores de $a, $b, $c como sigue: <br>
        $a = ''ManejadorSQL'';<br>
        $b = 'MySQL';<br>
        $c = &$a;<br> </h3>

    <!-- Párrafo descriptivo -->
    <p> Se muestran como:  </p>
    <!-- Lista -->
    <ul>
        <li> ManejadorSQL</li>
        <li> MySQL</li>
        <li> ManejadorSQL</li>
    </ul>
    <h2>Describe en y muestra en la pagina obtenida que ocurrio en el segundo bloque de
        asignaciones <br></h2>
        <p> Se muestran como:  </p>
        <ul>
            <li> PHP Server</li>
            <li> PHP Server</li>
        </ul>

    <!-- Titulo secundario -->
    <h3> 3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):
    <br>$a = “PHP5”;
    <br>$z[] = &$a;
    <br>$b = “5a version de PHP”;
    <br>$c = $b*10;
    <br>$a .= $b;
    <br>$b *= $c;
    <br>$z[0] = “MySQL”;
    <br>
    <br>
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
    <br>
    <br>


    <h3>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:
    <br>$a = “7 personas”;
    <br>$b = (integer) $a;
    <br>$a = “9E3”;
    <br>$c = (double) $a;
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
    <br>
    <br>


    

</body> 
</html>
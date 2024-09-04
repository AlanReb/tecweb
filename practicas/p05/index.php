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
     <h2>1. Determina cual de las siguientes variables son validas y explica por que: <br>
        $_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5 </h2>

    <!-- Párrafo descriptivo -->
    <p> El único elemento que no es válido, dado que no tiene el $ es myvar </p>
    <!-- Salto de parrafo -->
    <br>

    <!-- Titulo secundario -->
    <h2>2. Proporcionar los valores de $a, $b, $c como sigue: <br>
        $a = ''ManejadorSQL'';<br>
        $b = 'MySQL';<br>
        $c = &$a;<br> </h2>

    <!-- Párrafo descriptivo -->
    <p> Se muestran como:  </p>
    <!-- Lista -->
    <ul>
        <li> ManejadorSQL</li>
        <li> MySQL</li>
        <li> ManejadorSQL</li>
    </ul>
    <h3>Describe en y muestra en la pagina obtenida que ocurrio en el segundo bloque de
        asignaciones <br></h3>
        <p> Se muestran como:  </p>
        <ul>
            <li> PHP Server</li>
            <li> PHP Server</li>
        </ul>
</body>


    
</html>
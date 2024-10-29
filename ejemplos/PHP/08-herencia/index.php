<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 8</title>
</head>
<body>
    <?php
    require_once __DIR__.'/Operacion.php';

    $suma = new Suma;
    $suma->set_valor1(10);
    $suma->set_valor2(10);
    $suma->operar();

    echo 'El resultado es: '.$suma->getResultado().'<br>';

    $resta = new Resta;
    $resta->set_valor1(10);
    $resta->set_valor2(5);
    $resta->operar();

    echo 'El resultado es: '.$resta->getResultado().'<br>';
    ?>
</body>
</html>
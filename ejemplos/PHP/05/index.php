<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 3</title>
</head>
<body>
    <?php
    require_once __DIR__.'/Pagina.php';

    $pag = new Pagina(
        'El rincon del Programador',
        'El sotano del Programador'
    );

    for($i=0; $i<15; $i++){
        $pag->insertar_cuerpo('Prueba No. '.($i+1).' que debe aparecer en la pagina');
    }
    $pag->graficar();

    ?>
</body>
</html>
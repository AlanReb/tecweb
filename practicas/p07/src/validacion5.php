<?php
    header('Content-Type: text/html; charset=utf-8');

    // Obtener las variables POST
    $edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

    // Verificar las condiciones
    if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Resultado</title>
        </head>
        <body>
            <h2>Bienvenida, usted está en el rango de edad permitido.</h2>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Resultado</title>
        </head>
        <body>
            <h2>Lo sentimos, usted no cumple con los requisitos.</h2>
        </body>
        </html>";
    }
?>

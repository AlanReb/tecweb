<?php
    $nombre = $_POST['name'];
    $marca  = 'marca_producto';
    $modelo = 'modelo_producto';
    $precio = 1.0;
    $detalles = 'detalles_producto';
    $unidades = 1;
    $imagen   = 'img/imagen.png';

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'nomeacuerdo', 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    /** Crear una tabla que no devuelve un conjunto de resultados */
    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
    if ( $link->query($sql) ) 
    {
        if($nombre && $marca && $modelo)
        {
            echo 'Producto insertado con ID: '.$link->insert_id;
        }
        else    
        {
            echo 'El Producto no pudo ser insertado =(';
        }
    }
    else
    {
        echo 'El Producto no pudo ser insertado =(';
    }

    $link->close();
?>
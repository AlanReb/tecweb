<?php
    $nombre = $_POST['name'];
    $marca  = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen   = $_POST['imagen'];
    $eliminado =0;

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'nomeacuerdo', 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    /** Crear una tabla que no devuelve un conjunto de resultados */
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades,imagen) VALUES ('{$nombre}', '{$marca}', '{$modelo}', '{$precio}', '{$detalles}', '{$unidades}', '{$imagen}');";
    
    
    
    if ( $link->query($sql) ) 
    {
        //if($nombre && $marca && $modelo)
        //{
            echo 'Producto insertado con ID: '.$link->insert_id;
        //}
        //else    
        //{
        //    echo 'El Producto no pudo ser insertado =(';
        //}
    }
    else
    {
        echo 'El Producto no pudo ser insertado =(';
    }

    $link->close();
?>
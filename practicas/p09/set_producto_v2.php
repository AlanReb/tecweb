<?php
    // Obtener los valores del formulario
    $nombre = $_POST['name'];
    $marca  = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $eliminado = 0;

    // Conectar a la base de datos
    @$link = new mysqli('localhost', 'root', 'nomeacuerdo', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    // Ruta por defecto si no se sube una imagen
    $defaultImagePath = 'tecweb\practicas\p08\img\defecto.jpg';

    // Verificar si se ha subido una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Información de la imagen subida
        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];
        
        // Mover la imagen a un directorio en el servidor
        $uploadDir = '../p08/img/'; // Carpeta donde se almacenarán las imágenes
        $rutaImagen = $uploadDir . basename($nombreImagen);

        // Intentar mover el archivo subido al directorio de destino
        if (move_uploaded_file($tmpImagen, $rutaImagen)) {
            echo "La imagen ha sido subida correctamente.";
        } else {
            echo "Error al subir la imagen.";
            $rutaImagen = $defaultImagePath; // Usar la imagen por defecto en caso de error
        }
    } else {
        // Si no se ha subido una imagen, usar la ruta por defecto
        $rutaImagen = $defaultImagePath;
    }

    // Crear la consulta para insertar el producto
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
            VALUES ('{$nombre}', '{$marca}', '{$modelo}', '{$precio}', '{$detalles}', '{$unidades}', '{$rutaImagen}', '{$eliminado}')";

    if ($link->query($sql)) {
        echo 'Producto insertado con ID: ' . $link->insert_id;
    } else {
        echo 'Error al insertar el producto: ' . $link->error;
    }

    $link->close();
?>

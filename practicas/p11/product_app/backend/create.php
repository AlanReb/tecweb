
<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');

if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // SE OBTIENEN LOS VALORES DEL OBJETO JSON
    $nombre = utf8_decode($jsonOBJ->nombre);
    $precio = $jsonOBJ->precio;
    $unidades = $jsonOBJ->unidades;
    $modelo = utf8_decode($jsonOBJ->modelo);
    $marca = utf8_decode($jsonOBJ->marca);
    $detalles = utf8_decode($jsonOBJ->detalles);
    $imagen = $jsonOBJ->imagen;

    // SE CREA LA CONSULTA SQL PARA INSERTAR EL NUEVO PRODUCTO
    $sql = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen)
            VALUES ('$nombre', '$precio', '$unidades', '$modelo', '$marca', '$detalles', '$imagen')";

    // SE VERIFICA SI LA CONSULTA SE EJECUTA CORRECTAMENTE
    if ($conexion->query($sql) === TRUE) {
        // RESPUESTA DE ÉXITO
        echo json_encode(["mensaje" => "Producto agregado exitosamente."]);
    } else {
        // RESPUESTA DE ERROR
        echo json_encode(["error" => "Error al agregar el producto: " . $conexion->error]);
    }

    // SE CIERRA LA CONEXIÓN
    $conexion->close();
} else {
    // RESPUESTA DE ERROR SI NO HAY DATOS
    echo json_encode(["error" => "No se recibieron datos."]);
}
?>

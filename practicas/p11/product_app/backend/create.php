<?php
// Obtener el JSON enviado desde el cliente
$data = json_decode(file_get_contents("php://input"), true);

// Validar los datos recibidos
if (isset($data['nombre']) && isset($data['marca']) && isset($data['modelo']) && isset($data['precio']) && isset($data['unidades']) && isset($data['detalles']) && isset($data['imagen'])) {
    // Conectar a la base de datos (ajusta los parámetros según tu configuración)
    $conn = new mysqli("localhost", "usuario", "contraseña", "basedatos");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validar si el producto ya existe (comprobando el nombre y la columna 'eliminado')
    $nombre = $conn->real_escape_string($data['nombre']);
    $query = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Error: El producto ya existe en la base de datos.";
    } else {
        // Preparar la consulta de inserción
        $marca = $conn->real_escape_string($data['marca']);
        $modelo = $conn->real_escape_string($data['modelo']);
        $precio = $data['precio'];
        $unidades = $data['unidades'];
        $detalles = $conn->real_escape_string($data['detalles']);
        $imagen = $conn->real_escape_string($data['imagen']);

        $insertQuery = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen, eliminado) VALUES ('$nombre', '$marca', '$modelo', $precio, $unidades, '$detalles', '$imagen', 0)";

        // Ejecutar la inserción
        if ($conn->query($insertQuery) === TRUE) {
            echo "Éxito: Producto agregado a la base de datos.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Error: Datos incompletos.";
}
?>
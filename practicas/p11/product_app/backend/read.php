<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA SI SE RECIBIÓ EL TÉRMINO A BUSCAR
    if (isset($_POST['termino'])) {
        $termino = $_POST['termino'];

        // SE ESCAPA EL TÉRMINO PARA EVITAR INYECCIÓN SQL
        $termino = $conexion->real_escape_string($termino);

        // SE REALIZA LA CONSULTA UTILIZANDO LIKE PARA BUSCAR EN "nombre", "marca" Y "detalles"
        $query = "
            SELECT * FROM productos 
            WHERE nombre LIKE '%{$termino}%'
            OR marca LIKE '%{$termino}%'
            OR detalles LIKE '%{$termino}%'
        ";

        if ($result = $conexion->query($query)) {
            // SE OBTIENEN LOS RESULTADOS Y SE AGREGAN AL ARREGLO DE RESPUESTA
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $producto = array();
                foreach ($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                $data[] = $producto;
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }

        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON Y SE ENVÍA AL CLIENTE
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
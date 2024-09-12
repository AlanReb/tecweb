<?php
    header('Content-Type: text/html; charset=utf-8');

    // Crear el arreglo asociativo con 15 vehículos
    $vehiculos = array(
        "UBN6338" => array( 
            "Auto" => array("marca" => "HONDA", "modelo" => 2020, "tipo" => "camioneta"),
            "Propietario" => array("nombre" => "Alfonzo Esparza", "ciudad" => "Puebla", "direccion" => "C.U., Jardines de San Manuel")
        ),
        "UBN6339" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        
        "UBN6340" => array( 
            "Auto" => array("marca" => "MINI COOPER", "modelo" => 2010, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Armando Durain", "ciudad" => "Monterrey", "direccion" => "13 norte")
        ),
        "TFP1985" => array( 
            "Auto" => array("marca" => "FREIGHTLINER", "modelo" => 1980, "tipo" => "FL86"),
            "Propietario" => array("nombre" => "Optimus Prime", "ciudad" => "Cybertron", "direccion" => "Diacon")
        ),
        "DPW1991" => array( 
            "Auto" => array("marca" => "HONDA", "modelo" => 2024, "tipo" => "oddesey"),
            "Propietario" => array("nombre" => "Wade Wilson", "ciudad" => "Regina", "direccion" => "21 avenue")
        ),
        "UBN6343" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6344" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6345" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6346" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6347" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "AAA1111" => array( 
            "Auto" => array("marca" => "SUZUKI", "modelo" => 2015, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Mariano Perez", "ciudad" => "CDMX", "direccion" => "97 poniente")
        ),
        "UBN6349" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6350" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "UBN6351" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "XYZ3333" => array( 
            "Auto" => array("marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla", "direccion" => "97 oriente")
        ),
        "XYZ1234" => array(
            "Auto" => array("marca" => "TOYOTA", "modelo" => 2018, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Carlos Hernández", "ciudad" => "Ciudad de México", "direccion" => "Col. Centro")
        )
        // Completar los demás registros
    );

    // Verificar si se ha enviado una solicitud por matrícula
    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consulta Vehicular</title>
    </head>
    <body>
        <h2>Formulario de Consulta Vehicular</h2>
        <form action="parque_vehicular.php" method="POST">
            <label for="matricula">Ingrese la matrícula:</label>
            <input type="text" id="matricula" name="matricula"><br><br>

            <input type="submit" value="Consultar por Matrícula">
        </form>

        <h2>Consulta de todos los vehículos</h2>
        <?php
        // Mostrar todos los vehículos si no se ha buscado una matrícula específica
        if (empty($matricula)) {
            echo "<pre>";
            print_r($vehiculos);
            echo "</pre>";
        } else {
            // Consultar por una matrícula específica
            if (array_key_exists($matricula, $vehiculos)) {
                echo "<h3>Información del vehículo con matrícula $matricula:</h3>";
                echo "<pre>";
                print_r($vehiculos[$matricula]);
                echo "</pre>";
            } else {
                echo "<h3>No se encontró un vehículo con la matrícula $matricula.</h3>";
            }
        }
        ?>
    </body>
</html>

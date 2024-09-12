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
        "BTF1985" => array( 
            "Auto" => array("marca" => "DELOREAN", "modelo" => 1985, "tipo" => "sport"),
            "Propietario" => array("nombre" => "Emmet Brown", "ciudad" => "Hill Valley", "direccion" => "1640 Riverside Drive")
        ),
        "TFB2007" => array( 
            "Auto" => array("marca" => "CAMARO", "modelo" => 2007, "tipo" => "sport"),
            "Propietario" => array("nombre" => "Sam Witwicky", "ciudad" => "Detroit", "direccion" => "2187 West 24th Street")
        ),
        "FAF2001" => array( 
            "Auto" => array("marca" => "DOGDE", "modelo" => 1970, "tipo" => "charger"),
            "Propietario" => array("nombre" => "Dominic Toretto", "ciudad" => "Los Angeles", "direccion" => "722 East Kensington Road")
        ),
        "KNR1982" => array( 
            "Auto" => array("marca" => "PONTIAC", "modelo" => 1982, "tipo" => "firebird"),
            "Propietario" => array("nombre" => "Michael Knight", "ciudad" => "Los Angeles", "direccion" => "Greystone Mansion")
        ),
        "DHH2006" => array( 
            "Auto" => array("marca" => "HUDSON", "modelo" => 1951, "tipo" => "race"),
            "Propietario" => array("nombre" => "Hudson Hornett", "ciudad" => "Radiador Springs", "direccion" => "Ruta 66")
        ),
        "AAA1111" => array( 
            "Auto" => array("marca" => "SUZUKI", "modelo" => 2015, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Mariano Perez", "ciudad" => "CDMX", "direccion" => "97 poniente")
        ),
        "UBN6349" => array( 
            "Auto" => array("marca" => "TESLA", "modelo" => 2020, "tipo" => "sedan"),
            "Propietario" => array("nombre" => "Juan Carlos", "ciudad" => "Puebla", "direccion" => "2 norte")
        ),
        "TFS2011" => array( 
            "Auto" => array("marca" => "MERCEDES_BENZ", "modelo" => 2011, "tipo" => "sls"),
            "Propietario" => array("nombre" => "Dylan Goul", "ciudad" => "Chicago", "direccion" => "Main avenue")
        ),
        "TFS2009" => array( 
            "Auto" => array("marca" => "CHEVROLET", "modelo" => 2009, "tipo" => "spark"),
            "Propietario" => array("nombre" => "Seymour Simmons", "ciudad" => "Egipto", "direccion" => "El cairo")
        ),
        "XYZ3333" => array( 
            "Auto" => array("marca" => "FERRARI", "modelo" => 2009, "tipo" => "sport"),
            "Propietario" => array("nombre" => "Jose Martin Orato", "ciudad" => "Puebla", "direccion" => "14 sur")
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

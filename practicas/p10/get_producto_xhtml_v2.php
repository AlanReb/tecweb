<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    //header("Content-Type: application/json; charset=utf-8"); 
    $data = array();

	if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'nomeacuerdo', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado = 0") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = utf8_encode($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
        //echo json_encode($data, JSON_PRETTY_PRINT);
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script>
        	function show() {
                // se obtiene el id de la fila donde está el botón presionado
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                /**
                querySelectorAll() devuelve una lista de elementos (NodeList) que 
                coinciden con el grupo de selectores CSS indicados.
                (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

                En este caso se obtienen todos los datos de la fila con el id encontrado
                y que pertenecen a la clase "row-data".
                */
			   
                // Obtener los valores de las columnas de la fila
                var name = data[0].innerHTML;
                var brand = data[1].innerHTML;
                var model = data[2].innerHTML;
                var price = data[3].innerHTML;
                var units = data[4].innerHTML;
                var details = data[5].innerHTML;
				var image = data[6].querySelector("img").src; // Obtener la URL de la imagen

                // Mostrar una alerta con el nombre del producto
                alert("Nombre: " + name);

                // Llamar a la función para enviar los datos al formulario
                send2form(name, brand, model, price, units, details, image);
            }
    </script>
	</head>
	<body>
		<h3>MARKETABLE PLUSHIES</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Submit</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($data as $index => $row): ?>
                        <tr id="row-<?= $index ?>">
                            <th scope="row"><?= htmlspecialchars($row['id']) ?></th>
                            <td class="row-data"><?= htmlspecialchars($row['nombre']) ?></td>
                            <td class="row-data"><?= htmlspecialchars($row['marca']) ?></td>
                            <td class="row-data"><?= htmlspecialchars($row['modelo']) ?></td>
                            <td class="row-data"><?= htmlspecialchars($row['precio']) ?></td>
                            <td class="row-data"><?= htmlspecialchars($row['unidades']) ?></td>
                            <td class="row-data"><?= utf8_encode($row['detalles']) ?></td>
                            <td><img src="<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen del producto" /></td>
                            <td><input type="button" value="submit" onclick="show()" /></td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
			<script>
            function send2form(name, brand, model, price, units, details, image) {
				var form = document.createElement("form");

				// Crear campos ocultos para enviar los datos al formulario
				var nombreIn = document.createElement("input");
				nombreIn.type = 'hidden';
				nombreIn.name = 'nombre';
				nombreIn.value = name;
				form.appendChild(nombreIn);

				var marcaIn = document.createElement("input");
				marcaIn.type = 'hidden';
				marcaIn.name = 'marca';
				marcaIn.value = brand;
				form.appendChild(marcaIn);

				var modeloIn = document.createElement("input");
				modeloIn.type = 'hidden';
				modeloIn.name = 'modelo';
				modeloIn.value = model;
				form.appendChild(modeloIn);

				var precioIn = document.createElement("input");
				precioIn.type = 'hidden';
				precioIn.name = 'precio';
				precioIn.value = price;
				form.appendChild(precioIn);

				var unidadesIn = document.createElement("input");
				unidadesIn.type = 'hidden';
				unidadesIn.name = 'unidades';
				unidadesIn.value = units;
				form.appendChild(unidadesIn);

				var detallesIn = document.createElement("input");
				detallesIn.type = 'hidden';
				detallesIn.name = 'detalles';
				detallesIn.value = details;
				form.appendChild(detallesIn);

				var imagenIn = document.createElement("input");
				imagenIn.type = 'hidden';
				imagenIn.name = 'imagen';
				imagenIn.value = image; // Aquí se pasa la URL de la imagen
				form.appendChild(imagenIn);

				// Configurar el método y la acción del formulario
				form.method = 'POST';
				form.action = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";  

				// Agregar el formulario al cuerpo del documento y enviarlo
				document.body.appendChild(form);
				form.submit();
			}
        </script>
    <?php else: ?>
        <script>
            alert('No se encontraron productos disponibles.');
        </script>
    <?php endif; ?>
	</body>
</html>
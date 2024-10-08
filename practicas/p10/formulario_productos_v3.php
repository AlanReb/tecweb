<!DOCTYPE html >
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>

    <title>Registro de productos</title>
    <?php
    // Verificamos si se ha recibido el producto para editar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idp = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $unidades = $_POST['unidades'];
        $detalles = $_POST['detalles'];
        $imagen = $_POST['imagen']; // Se recibe la URL de la imagen
    } else {
        die("Error: No se recibieron datos del producto.");
    }

    // Lista de marcas disponibles
    $opcionesMarca = ['MndMeld', 'CAPCOM', 'DISNEY', 'Make a Bear', 'DC', 'POKEMON', 'marcas'];

  ?>
  </head>

  <body>
    <h1>Registro de productos &ldquo;marketzone&rdquo;</h1>
    
    <!-- Otros campos aquí -->
    <p>Insete la Información del producto</p>
 
    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p10/update_producto.php" method="post" enctype="multipart/form-data">

    <h2>Información del producto</h2>

      <fieldset>
        <legend>Información del producto</legend>

        <ul>
          <li><label for="form-idp">ID:</label> <input type="text" name="idp" value="<?= htmlspecialchars($idp) ?>" readonly/><br/></li>
          <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" id="form-name" value="<?= htmlspecialchars($nombre) ?>" required/><br/></li>
          <li><label for="form-brand">Marca:</label>
            <select name="marca" id="form-brand">
              <?php
              // Recorrer las opciones de marca y marcar la seleccionada si coincide con el valor enviado por POST
              foreach ($opcionesMarca as $opcion) {
                  // Verificar si la opción coincide con la marca recibida por POST
                  $selected = ($opcion == $marca) ? 'selected' : '';
                  echo "<option value='$opcion' $selected>$opcion</option>";
              }
              ?>
            </select>
          </li>
          <li><label for="form-model">Modelo:</label> <input type="text" name="modelo" id="form-model" value="<?= htmlspecialchars($modelo) ?>"></li>
          <li><label for="form-price">Precio:</label> <input type="number" name="precio" id="form-price" value="<?= htmlspecialchars($precio) ?>"></li>
          <li><label for="form-units">Unidades:</label> <input type="number" name="unidades" id="form-units" value="<?= htmlspecialchars($unidades) ?>"></li>
          <li><label for="form-details">Mencione detalles generales y destacables del produtcto</label><br><textarea name="detalles" rows="4" cols="60" id="form-details" placeholder="No más de 300 caracteres de longitud"><?= htmlspecialchars($detalles) ?></textarea></li>
          <li><label for="form-image">Path de la Imagen:</label> <input type="text" name="imagen" id="form-image" value="<?= htmlspecialchars($imagen) ?>"></li>
        </ul>
      </fieldset>  
    </fieldset>

      <p>
        <input type="submit" value="Guardar producto">
        <input type="reset">
      </p>

    </form>
    <script>
      function validarFormulario(event) {
        // Mensaje en consola para ver si la validación se ejecuta
        console.log("Validando el formulario...");

        // Previene el envío del formulario si hay errores
        event.preventDefault();

        // Obtener los valores de los campos
        var nombre = document.getElementById('form-name').value.trim();
        var marca = document.getElementById('form-brand').value.trim();
        var modelo = document.getElementById('form-model').value.trim();
        var precio = document.getElementById('form-price').value.trim();
        var unidades = document.getElementById('form-units').value.trim();
        var detalles = document.getElementById('form-details').value.trim();
        var imagen = document.getElementById('form-image').value.trim();

        // Validaciones
        var errores = [];

        // a. El nombre debe ser requerido y tener 100 caracteres o menos
        if (nombre === "" || nombre.length > 100) {
          errores.push("El nombre es requerido y debe tener 100 caracteres o menos.");
        }

        // b. La marca debe ser requerida (por ahora como input) y seleccionarse de una lista de opciones
        if (marca === "") {
          errores.push("La marca es requerida.");
        }

        // c. El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos
        var regexAlfanumerico = /^[a-zA-Z0-9\s]+$/; // Expresión regular para validar alfanumérico
        if (modelo === "" || modelo.length > 25 || !regexAlfanumerico.test(modelo)) {
          errores.push("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
        }

        // d. El precio debe ser requerido y mayor a 99.99
        if (precio === "" || isNaN(precio) || parseFloat(precio) <= 99.99) {
          errores.push("El precio es requerido y debe ser mayor a 99.99.");
        }

        // e. Los detalles deben ser opcionales pero con un máximo de 250 caracteres
        if (detalles.length > 250) {
          errores.push("Los detalles deben tener 250 caracteres o menos.");
        }

        // f. Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0
        if (unidades === "" || isNaN(unidades) || parseInt(unidades) < 0) {
          errores.push("Las unidades son requeridas y deben ser mayores o iguales a 0.");
        }

        // g. La ruta de la imagen debe ser opcional, pero si está vacía, se asigna una por defecto
        if (imagen === "") {
          document.getElementById('imagen').value = 'ruta/a/imagen/por/defecto.jpg'; // Puedes cambiar esta ruta según tus necesidades
        }

        // Mostrar errores o enviar el formulario si todo es correcto
        if (errores.length > 0) {
          alert("Errores en el formulario:\n" + errores.join("\n"));
        } else {
          // Si todo es correcto, se envía el formulario
          document.getElementById('formularioProductos').submit();
        }
      }

      // Asignar la función de validación al evento onsubmit del formulario
      window.onload = function() {
        console.log("Asignando evento onsubmit...");
        document.getElementById('formularioProductos').onsubmit = validarFormulario;
      };
    </script>
  </body>
</html>
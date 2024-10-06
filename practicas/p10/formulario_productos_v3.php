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
          <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required/><br/></li>
          <li><label for="form-brand">Marca:</label> <input type="text" name="marca" id="form-brand" value="<?= htmlspecialchars($marca) ?>"></li>
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
  </body>
</html>
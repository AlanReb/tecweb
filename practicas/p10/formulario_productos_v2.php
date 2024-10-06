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
  </head>

  <body>
    <h1>Registro de productos &ldquo;marketzone&rdquo;</h1>

    <p>Insete la Información del producto</p>
 
    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p10/update_producto.php" method="post" enctype="multipart/form-data">

    <h2>Información del producto</h2>

      <fieldset>
        <legend>Información del producto</legend>

        <ul>
          <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
          <li><label for="form-brand">Marca:</label> <input type="text" name="marca" id="form-brand" value="<?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?>"></li>
          <li><label for="form-model">Modelo:</label> <input type="text" name="modelo" id="form-model" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
          <li><label for="form-price">Precio:</label> <input type="number" name="precio" id="form-price" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
          <li><label for="form-units">Unidades:</label> <input type="number" name="unidades" id="form-units" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li>
          <li><label for="form-details">Mencione detalles generales y destacables del produtcto</label><br><textarea name="detalles" rows="4" cols="60" id="form-details" placeholder="No más de 300 caracteres de longitud"><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea></li>
          <li><label for="form-image">Path de la Imagen:</label> <input type="text" name="imagen" id="form-image" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>"></li>
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
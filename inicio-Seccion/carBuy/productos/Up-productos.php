<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GALERIA</title>
</head>
<body>
    <form action="insertar-pro.php" method="post" enctype="multipart/form-data">
        <label for="nombre">nombre</label>
        <input type="text" name="nombreImagen" value="" required>

        <label for="detalle">Descripcion corta</label>
        <input type="text" name="detalle" value="" required>

        <label for="imagen">FOTO</label>
        <input type="file" name="imagen" value="" required>

        <label for="precio">precio si aplica</label>
        <input type="text" name="precio" value="" required>

        <input type="submit" name="enviar" value="Enviar">
    </form>
    
</body>
</html>
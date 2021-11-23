<?php //Proceso actualizacion de datos del usuario
    //print_r($_POST);
    if (!isset($_POST['oculto'])) {
        //exit();
        header("Location: index.php");
    }
    include '../modelo/conexion.php';
    $E_id = $_POST['E_id'];
    $E_nombre = $_POST['E_nombre'];
    $E_descripcion = $_POST['E_descripcion'];
    $E_vacunas = $_POST['E_vacunas'];
    $E_tipoComida = $_POST['E_tipoComida'];
    $E_estado = $_POST['E_estado'];


    $sentencia = $bd->prepare("UPDATE detalleproducto SET nombre= ?,
                                                    descripcion= ?,
                                                    vacunas= ?,
                                                    tipoComida= ?,
                                                    estado= ?
                                WHERE id = ?; ");
    $resultado = $sentencia->execute([$E_nombre,$E_descripcion,$E_vacunas,$E_tipoComida,$E_estado,$E_id]);
    
    if ($resultado === TRUE) {
        //echo "<strong><h2>Los datos del usuario han sido actualizados exitosamente!!!</h2></strong>";
        header("Location: index.php");
    } else {
        echo "<h2>Ups! ocurrio un error al actualizar los datos del usuario</h2>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización Mascota</title>
    <link rel="stylesheet" href="../estilos/css.css">
</head>
<body>
    
</body>
</html>
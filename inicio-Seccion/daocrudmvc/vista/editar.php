<?php
    //print_r($_GET);
    if (!isset($_GET['id'])) {
        //exit();
        header("Location: index.php");
    }

    include '../modelo/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM detalleproducto WHERE id = ?;");
    $sentencia->execute([$id]);
    $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($cliente);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos Mascota</title>
    <link rel="stylesheet" href="../estilos/css.css">
</head>
<body>
    <center>
        <h2>Editar Mascota</h2>
        <form method="POST" action="editar_proceso.php">
                <table>
                    <tr>
                        <td>Nombre de mascota si lo tiene</td>
                        <td><input type="text" name="E_nombre" value="<?php echo $cliente->nombre?>"></td>
                    </tr>
                    <tr>
                        <td>Descripcion de la mascota</td>
                        <td><input type="text" name="E_descripcion" value="<?php echo $cliente->descripcion?>"></td>
                    </tr>
                    <tr>
                        <td>Vacunas aplicadas</td>
                        <td><input type="text" name="E_vacunas" value="<?php echo $cliente->vacunas?>"></td>
                    </tr>
                    <tr>
                        <td>Alimentado con</td>
                        <td><input type="text" name="E_tipoComida" value="<?php echo $cliente->tipoComida?>"></td>
                    </tr>
                    <tr>
                        <td>Estado en el que se encuentra</td>
                        <td><input type="text" name="E_estado" value="<?php echo $cliente->estado?>"></td>
                    </tr>
                    <input type="hidden" name="oculto">
                    <input type="hidden" name="E_id" value="<?php echo $cliente->id ?>">
                    <tr>
                        <td><input type="reset" id="reset"></td>
                        <td><input type="submit" value="Registrar Datos" id="enviar"></td>
                    </tr>
                </table>
            </form>
    </center>
</body>
</html>
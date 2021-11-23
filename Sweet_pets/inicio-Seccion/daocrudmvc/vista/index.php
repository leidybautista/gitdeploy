<?php
    include '../modelo/conexion.php';
    $sentencia = $bd->query("SELECT * FROM detalleproducto;");
    $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    /*fetchAll guardar en formato de objeto 
    FETCH_OBJ sea de tipo objeto*/
    //print_r($usuarios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles mascota</title>
    <link rel="stylesheet" href="../estilos/css.css">
    <link rel="icon" href="../../../img/imagenes/logoPNG.png">
</head>
<body>
        <h1>Descripccion Mascota</h1>
        <div id="main-container-tabla">
            <table>
                <thead>
                    <tr id="header">
                        <th>id</th>
                        <th>nombre</th>
                        <th>descripcion</th>
                        <th>vacunas</th>
                        <th>tipoComida</th>
                        <th>estado</th>
                    </tr>
                </thead>
                <?php
                    foreach ($usuarios as $dato) {
                        ?>
                        <tr>
                            <td><?php echo $dato->id; ?></td>
                            <td><?php echo $dato->nombre; ?></td>
                            <td><?php echo $dato->descripcion; ?></td>
                            <td><?php echo $dato->vacunas; ?></td>
                            <td><?php echo $dato->tipoComida; ?></td>
                            <td><?php echo $dato->estado; ?></td>
                            <td><a class="editar" href="editar.php?id=<?php echo $dato->id; ?>" id="editar">Editar</a></td>
                            <td><a class="eliminar" href="eliminar.php?id=<?php echo $dato->id; ?>" id="eliminar">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        <!-- inicio insert -->
        <div id="main-container">
            <form method="POST" action="insertar.php">
            <h2>Ingresar Datos</h2>
                <table>
                    <tr>
                        <td>Nombre de mascota si lo tiene</td>
                            <td><input type="text" name="nombre" required></td>
                    </tr>
                    <tr>
                        <td>Descripcion de la mascota</td>
                        <td><input type="text" name="descripcion" required></td>
                    </tr>
                    <tr>
                        <td>Vacunas aplicadas</td>
                        <td><input type="text" name="vacunas" required></td>
                    </tr>
                    <tr>
                        <td>Alimentado con</td>
                        <td><input type="text" name="tipoComida" required></td>
                    </tr>
                    <tr>
                        <td>Estado en el que se encuentra</td>
                        <td><input type="text" name="estado" required></td>
                    </tr>
                    <!-- <input type="hidden" name="oculto" value="1"> -->
                    <tr>
                        <td><input type="reset" id="reset"></td>
                        <td><input type="submit" value="Registrar Datos" id="enviar"></td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- fin del insert -->

</body>
</html>
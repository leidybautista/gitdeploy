<?php
    //print_r($_GET);
    if (!isset($_GET['id'])) {
        //exit();
        header("Location: index.php");
    }

    $codigo = $_GET['id'];
    include '../modelo/conexion.php';
    $sentencia = $bd->prepare("DELETE FROM detalleproducto WHERE id = ?; ");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        //echo "<strong><h2>Los datos del usuario han sido eliminados exitosamente!!!</h2></strong>";
        header("Location: index.php");
    } else {
        echo "<h2>Ups! ocurrio un error al eliminar los datos del usuario</h2>";
    }
?>
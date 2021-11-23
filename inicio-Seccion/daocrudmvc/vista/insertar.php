<?php
    //rectificar que se reguistren los datos
    //print_r($_POST);
    // if (!isset($_POST['oculto'])) {
    //     exit();
    // }

    include '../modelo/conexion.php';
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $vacunas = $_POST['vacunas'];
    $tipoComida = $_POST['tipoComida'];
    $estado = $_POST['estado'];



    $sentencia = $bd->prepare("INSERT INTO detalleproducto (nombre,descripcion,vacunas,tipoComida,estado) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$descripcion,$vacunas,$tipoComida,$estado]);

    if ($resultado === TRUE) {
        //echo "<strong><h2>Los datos del usuario han sido ingresados exitosamente!!!</h2></strong>";
        header("Location: index.php");
    } else {
        echo "<h2>Ups! ocurrio un error al ingresar los datos del usuario</h2>";
    }
?>
<?php
    //rectificar que se reguistren los datos
    //print_r($_POST);
    // if (!isset($_POST['oculto'])) {
    //     exit();
    // }

    include '../modelo/conexion.php';
    $nombreCom = $_POST['nombreCom'];
    $email = $_POST['email'];
    $foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $contraseña = $_POST['contraseña'];

    $sentencia = "INSERT INTO usuario (nombreCom,email,foto,contraseña) VALUES ('$nombreCom','$email','$foto','$contraseña')";
    // $resultado = mysqli_query ($conn,$sentencia);
    $resultado = $conn->query($sentencia);

    if ($resultado) {
        //echo "<strong><h2>Los datos del usuario han sido ingresados exitosamente!!!</h2></strong>";
        header("location: index.php");
    } else {
        echo "<h2>Ups! ocurrio un error al ingresar los datos del usuario</h2>";
    }
?>
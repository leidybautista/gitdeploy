<?php
    include("../../modelo/conexion.php");
$nombre=$_POST["nombreImagen"];
$detalle=$_POST["detalle"];
$precio=$_POST["precio"];
$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$consulta= "INSERT INTO productos (nombre,detalle,imagen,precio) values('$nombre','$detalle','$imagen','$precio')";
$resultado = $conn->query($consulta);

if($resultado){
    echo "si se inserto";
}
else{
    echo "NOOO AS";
}
header("Location: ../index.php");
?>
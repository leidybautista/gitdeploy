<?php 

    include("../../modelo/conexion.php");
    
	session_start();
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: ../../vista/index.php");
    }

    $iduser = $_SESSION['id_usuario'];

	$sentencia = "SELECT id_user,nombreCom,email,foto FROM usuario WHERE id_user = '$iduser'";
    $consulta = $conn->query($sentencia);
    $row = $consulta->fetch_assoc();
        ?>
            <tr>
                <td><?php echo $row['nombreCom'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>"></td>
            </tr>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Sweet Pets</title>
    <link rel="icon" href="../../../img/imagenes/logoPNG.png">
</head>
<body>
    <h1>Esoo</h1>
    <form method="POST" action="../../modelo/cerrar-sesion.php">
        <button type="submit"  name="cerrar-sesion" >Cerrar sesion</button>
    </form>
</body>
</html>
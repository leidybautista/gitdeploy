<?php 
include ("../modelo/conexion.php");


session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("Location: ../carBuy/index.php");
    }

$email = $_REQUEST['email'];
$contraseña = $_REQUEST['contraseña'];


$sentencia = "SELECT id_user FROM usuario  WHERE email = '$email' AND contraseña = '$contraseña'";
$consulta = $conn->query($sentencia);

$lista = $consulta->num_rows;

if($lista > 0) {
	$row = $consulta->fetch_assoc();
	$_SESSION['id_usuario']=$row["id_user"]; 
	// window.location = "../inicioSweet/inicioSweet.php";
	header("location:../carBuy/index.php");
}else{
	echo "<script>alert('Querido usuario la contraseña y/o usuario No corresponden!... Por favor verificar');
		window.location = 'index.php';
		</script>";
}
?>
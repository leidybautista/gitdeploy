<?php
    include '../modelo/conexion.php';
    $sentencia = $conn->query("SELECT * FROM usuario;");
    // fetchAll guardar en formato de objeto 
    // FETCH_OBJ sea de tipo objeto
    // print_r($usuarios);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    <link rel="icon" href="../../img/imagenes/logoPNG.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                        <button><a href="../../index.html">Inicio</a></button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form method="POST" action="login.php" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="email" name="email" placeholder="Correo Electronico">
                        <input type="password" name="contraseña" placeholder="Contraseña">
                        <button type="submit">Entrar</button>
                    </form>

                    <!--Register-->
                        <!-- inicio insert -->
                    <form method="POST" action="insertar.php" class="formulario__register" enctype="multipart/form-data">
                        <h2>Ingresar Datos</h2>
                        <input type="text" name="nombreCom" placeholder="Nombre completo" required>
                        <input type="email" name="email"  placeholder="Correo electronico" required>
                        <input type="file" name="foto" placeholder="Foto de perfil" required>
                        <input type="password" name="contraseña" placeholder="Contraseña" required>
                        <!-- <input type="hidden" name="oculto" value="1"> -->
                        <button type="reset" id="reset">Restaurar</button>
                        <button type="submit">Registrar Datos</button>
                    </form>
                    <!-- fin del insert -->
                </div>
            </div>

        </main>
        <script src="../assets/js/script.js"></script>
</body>
</html>
<?php 
session_start();
include './conexion.php';
if (isset($_SESSION['carrito'])) {
    if(isset($_GET['id'])){
            $arreglo=$_SESSION['carrito'];
            $encontro=false;
            $numero=0;
            
            for ($i=0; $i < count($arreglo) ; $i++) { 
                if ($arreglo[$i]['Id'] == $_GET['id']) {
                    $encontro=true;
                    $numero=$i;
                }
            }
            if ($encontro==true) {
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito'] = $arreglo;
            }else {
                $nombre = "";
                $precio = 0;
                $imagen ="";
                $re = $conn->query("SELECT * FROM productos WHERE id=".$_GET['id']);
                while ($f = mysqli_fetch_array($re)) {
                    $nombre = $f['nombre'];
                    $precio = $f['precio'];
                    $imagen = $f['imagen'];
                }
                $datosNuevos= Array("Id"     =>$_GET['id'],
                "Nombre" =>$nombre,
                "Precio" =>$precio,
                "Imagen" =>$imagen, 
                "Cantidad" => 1
                );
                array_push($arreglo, $datosNuevos);
                $_SESSION['carrito'] = $arreglo;
            }
}
    
    
}else {
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = 0;
        $imagen ="";
        $re = $conn->query("SELECT * FROM productos WHERE id=".$_GET['id']);
        while ($f = mysqli_fetch_array($re)) {
            $nombre = $f['nombre'];
            $precio = $f['precio'];
            $imagen = $f['imagen'];
        }
        $arreglo[]= Array("Id"     =>$_GET['id'],
        "Nombre" =>$nombre,
        "Precio" =>$precio,
        "Imagen" =>$imagen, 
        "Cantidad" => 1
        );
        $_SESSION['carrito']=$arreglo;
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Carrito de Compras</title>

    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/mis_productos/ab-sec.css">
    <link rel="stylesheet" href="./assets/css/mis_productos/glob.css">
    <link rel="stylesheet" href="./assets/css/mis_productos/hed-sect.css">
    <link rel="stylesheet" href="./assets/css/mis_productos/nav-section.css">
    <link rel="stylesheet " href="./assets/css/mis_productos/serv-sect.css">

    <!-- boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- default color skin -->
    <link rel="stylesheet " type="text/css " href="./assets/css/skin/col-1.css ">
    <link rel="stylesheet " type="text/css " href="./assets/css/skin/col-2.css ">
    <link rel="stylesheet " type="text/css " href="./assets/css/skin/col-3.css ">
    <link rel="stylesheet " type="text/css " href="./assets/css/skin/col-4.css ">
    <link rel="stylesheet " type="text/css " href="./assets/css/skin/col-5.css ">


    <script type="text/javascript " href="./js/scripts.js "></script>
    <script type="text/javascript " href="js/hamburguer.js "></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>

<body>
    <!-- header start -->

    <header class="header ">
        <div class="container ">
            <div class="row justify-content-between ">
                <div class="logo ">
                    <a href="index.html ">sweet pets</a>
                </div>
                <div class="ham-cart ">

                    <a title="Consultar carrito compras" href="./misProductos.php " class="cart hover-in-shadow "><i class='bx bx-cart-alt'></i></a>

                    <a title="Consulta tu perfil de usuario" href="./perfil-usuario/perfil-usuario.php" class="user hover-in-shadow "><i class='bx bxs-user-circle'></i></a>

                    <div title="Menu" class="hamburger-btn hover-in-shadow ">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header end -->


    <!-- menu navegacion start -->

    <nav class="nav-menu ">
        <div class="close-nav-menu outer-shadow hover-in-shadow ">&times;</div>
        <div class="nav-menu-inner ">
            <ul>
                <li><a href="index.php" class="link-item inner-shadow active ">productos</a></li>
                <!-- <li><a href="detalles.php" class="link-item outer-shadow hover-in-shadow ">productos</a></li> -->
            </ul>
        </div>
        <!-- copyright text -->
        <p class="copyright-text ">&copy; 2021 Sweet Pets</p>
    </nav>

    <!-- menu navegacion end -->




    <section class="service-section section ">
        <div class="container ">
            <div class="row ">
                <div class="section-title ">
                    <h2 data-heading='productos'>mis Mascotas</h2>
                </div>
            </div>
            <div class="row ">


                <?php 
                
                $total=0;
                if(isset($_SESSION['carrito'])){
                    $datos=$_SESSION["carrito"];
                    
                    for ($i=0; $i < count($datos); $i++) { 
                        ?>
                <div class="service-item producto">
                    <div class="service-item-inner">
                        <!-- <img class="icon" src="./productos/<?php// echo $datos[$i]['Imagen'];?>"> -->
                        <img class="icon" src="data:image/jpg;base64,<?php echo base64_encode($datos[$i]['Imagen']);?>">
                        <span> <?php echo $datos[$i]['Nombre']; ?></span><br>
                        <span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
                        <label>cantidad: 
                            <input type="text"  value="<?php echo $datos[$i]['Cantidad'] ?>"  data-precio="<?php echo $datos[$i]['Precio'];?>" data-id="<?php echo $datos[$i]['Id'];?>" class="cantidad" >
                        </label><br>
                        <span class="subtotal">Subtotal: <?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
                    </div>
                </div>


                <?php 
                    $total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
                    
                    }
                
                }else{
                    echo "<center><h2>no hay mascotas añadidas </h2></center>";
                }                        
            ?>
                    
            </div>
            <div>
                <center><h2 class='total'>total: "<?php echo $total ?>"</h2></center>
            </div>
            <center><a href="./" class="btn btn-1 hover-in-shadow outer-shadow">ver catalogo</a></center>

    </section>


    <!-- MOSTRAR IMG como lo puse YO -->
    <?php /*
        include ('conexion.php');

        $consulta = "SELECT * FROM productos";
        $resultado= $conn->query($consulta);
        
        while($mostrar =$resultado->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $mostrar['nombre'];?></td>
            <td><?php echo $mostrar['detalle'];?></td>
            <td><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']);?>"/></td>
            <td><?php echo $mostrar['precio'];?></td>
        </tr>
    <?php        
        }
        */?> 
    

    <!-- service section end -->


    <script src="./assets/scripts/hamburger.js"></script>
    <script src="./assets/scripts/modificar.js"></script>
</body>

</html>
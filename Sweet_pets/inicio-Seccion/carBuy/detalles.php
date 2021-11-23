<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Carrito de Compras</title>

    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/detalles/ab-sec-det.css">
    <link rel="stylesheet" href="./assets/css/detalles/glob-det.css">
    <link rel="stylesheet" href="./assets/css/detalles/hed-sect-det.css">
    <link rel="stylesheet" href="./assets/css/detalles/nav-sec-det.css">
    <link rel="stylesheet" href="./assets/css/detalles/serv-sec-det.css">

    <!-- boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- default color skin -->
    <link rel="stylesheet" type="text/css" href="./assets/css/skin/col-1.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/skin/col-2.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/skin/col-3.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/skin/col-4.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/skin/col-5.css">


    <script type="text/javascript" href="./js/scripts.js"></script>
    <script type="text/javascript" href="js/hamburguer.js">
    </script>
</head>

<body>
    <!-- header start -->

    <header class="header">
        <div class="container">
            <div class="row justify-content-between">
                <div class="logo">
                    <a href="index.html">sweet pets</a>
                </div>
                <d class="ham-cart">
                    
                        <a href="misProductos.php" class="cart hover-in-shadow"><i class='bx bx-cart-alt'></i></a>
                        <a href="./perfil-usuario/perfil-usuario.php" class="user hover-in-shadow"><i class='bx bxs-user-circle'></i></a>

                    <div class="hamburger-btn hover-in-shadow">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header end -->


    <!-- menu navegacion start -->

    <nav class="nav-menu">
        <div class="close-nav-menu outer-shadow hover-in-shadow">&times;</div>
        <div class="nav-menu-inner">
            <ul>
                <li><a href="" class="link-item inner-shadow active">Home</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">About</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">Servicios</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">Portafolio</a></li>
                <li><a href="../funciones/" class="olink-item outer-shadow hover-in-shadow">funciones flecha</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">crud</a></li>
                <li><a href="" class="outer-shadow hover-in-shadow">fracciones</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">herencia</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">Testimonios</a></li>
                <li><a href="" class="link-item outer-shadow hover-in-shadow">Contacto</a></li>
            </ul>
        </div>
        <!-- copyright text -->
        <p class="copyright-text">&copy; 2021 Sweet Pets</p>
    </nav>

    <!-- menu navegacion end -->

    <section class="service-section section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2 data-heading='Principal'>Nuestras Mascotas</h2>
                </div>
            </div>
            <div class="row">
            

                <?php 
                include "conexion.php";
                $re = $conn->query("SELECT * FROM productos WHERE id = ".$_GET['id']);
                while($f = mysqli_fetch_array($re)) {
                    
                    ?>

                
                    <!-- service item start -->
                        <div class="service-item">
                            <div class="service-item-inner outer-shadow">
                                <div class="icon ">
                                    <!-- <img src="./productos/<?php// echo $f['imagen'];?>" alt=""> -->
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($f['imagen']);?>"/>
                                </div>
                                <h3><?php echo $f['nombre'];?></h3>
                                <p><?php echo $f['precio'];?></p><br>
                                <a class="btn btn-1 hover-in-shadow" href="./misProductos.php?id=<?php echo $f['id']; ?>">añadir</a>
                            </div>
                        </div>
                    <!-- service item end -->	
                
                <?php	
                        
                }
                ?>

                

            </div>
        </div>
    </section>
    <!-- service section end -->


    <script src="./assets/scripts/hamburger.js"></script>
</body>
</html>
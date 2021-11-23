<?php

if(isset($_POST['cerrar-sesion'])){
    session_start();
    session_destroy();
    echo ("SESION CERRADA");
    exit();
}

?>
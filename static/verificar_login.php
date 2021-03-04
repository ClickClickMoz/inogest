<?php

//session_start();

if(!$_SESSION['usuario']){
    header('Location:indexx.php');
    exit();
}


?>
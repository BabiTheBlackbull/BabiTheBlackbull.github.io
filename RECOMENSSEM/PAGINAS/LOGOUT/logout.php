<?php 
    session_start();
    $_SESSION['history'] = "iniciarsesionSalir";  
    header('Location: \RECOMENSSEM\index.php');    
    exit();
?>
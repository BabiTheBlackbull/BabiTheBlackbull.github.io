<?php 
    session_start();
    session_destroy();
    header('Location: \RECOMENSSEM\index.php');    
    exit();
?>
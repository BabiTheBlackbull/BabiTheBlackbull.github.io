UpdateJuego

<?php
    require_once("../php_librarys/bd.php");

        if(isset($_POST['UpdateJuego'])){
       
            updateJuego($_POST['cbxJuego'], $_POST['puntos']);

            header('Location: \RECOMENSSEM\PAGINAS\JUEGOS\juegos.php');
            exit();
        } 


?>
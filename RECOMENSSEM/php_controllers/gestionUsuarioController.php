<?php

    require_once("../php_librarys/bd.php");

        if(isset($_POST['uploadTrash'])){

                deleteUser( $_POST['idUsuarioTrash'] );

                header('Location: \RECOMENSSEM\PAGINAS\GESTION_USUARIOS\gestionUsuarios.php');
                exit();

        }   elseif(isset($_POST['update'])){

            updateUsuario($_POST['idUsuario'], $_POST['nombre'],  $_POST['cognom'],  $_POST['correu'],  $_POST['contrasenya'], $_POST['rbAd'], $_POST['puntos']);

                header('Location: \RECOMENSSEM\PAGINAS\GESTION_USUARIOS\gestionUsuarios.php');
                exit();
        }  

?>
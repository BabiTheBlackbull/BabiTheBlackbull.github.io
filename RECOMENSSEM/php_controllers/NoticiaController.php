<?php

    require_once("../php_librarys/bd.php");



        if (isset($_POST['insert'])){
                $file_name = $_FILES['file']['name'];
                $file_type = $_FILES['file']['type'];
                $file_size = $_FILES['file']['size'];
                $file_tem_loc = $_FILES['file']['tmp_name'];
                $file_store = "../media/".$file_name;

                move_uploaded_file($file_tem_loc, $file_store);

                insertarNoticia( $_POST['nombre'],$_POST['desc'], $file_name);

                header('Location: \RECOMENSSEM\PAGINAS\INFO_NOTICIAS\infonoti.php');
                exit();

        }elseif(isset($_POST['Eliminar'])){

                deleteNoticia( $_POST['id'] );

                header('Location: \RECOMENSSEM\PAGINAS\INFO_NOTICIAS\infonoti.php');
                exit();

        }elseif(isset($_POST['update'])){
                $file_name = $_FILES['file']['name'];
                $file_type = $_FILES['file']['type'];
                $file_size = $_FILES['file']['size'];
                $file_tem_loc = $_FILES['file']['tmp_name'];
                $file_store = "../media/".$file_name;

                move_uploaded_file($file_tem_loc, $file_store);

                updateNoticia($_POST['id'], $_POST['nombre'],  $_POST['desc'], $file_name);

                header('Location: \RECOMENSSEM\PAGINAS\INFO_NOTICIAS\infonoti.php');
                exit();
        }elseif(isset($_POST['nada'])){

                header('Location: \RECOMENSSEM\PAGINAS\INFO_NOTICIAS\infonoti.php');
                exit();
        }

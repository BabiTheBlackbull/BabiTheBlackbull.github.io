<?php
    require_once("../php_librarys/bd.php");

    if (isset($_POST['insert'])){
        session_start();

        if(!consultarCorreoIfExist($_POST['Correo'])){

            if($_POST['Contraseña']==$_POST['Contraseña2']){

                InsertarUsuarios($_POST['Nombre'],$_POST['Apellidos'],$_POST['Correo'],$_POST['Contraseña']);
                $_SESSION['history'] = "registroOK";
                ?>
                <script>
                window.location= '/RECOMENSSEM/PAGINAS/INICIAR_SESION/iniciarSesion.php';
                </script>
                <?php

                exit();
            }
            else{


                $_SESSION['history'] = "registroPasswdNoOK";
                ?>
                <script>
                    location.href = "/RECOMENSSEM/PAGINAS/REGISTRO/registro.php";		
                </script>

                <?php
            }

        }else{

            $_SESSION['history'] = "RegistroCORREONoOK";
            ?>
            <script>
                location.href = "/RECOMENSSEM/PAGINAS/REGISTRO/registro.php";		
            </script>

            <?php

        }




    }

 

?>
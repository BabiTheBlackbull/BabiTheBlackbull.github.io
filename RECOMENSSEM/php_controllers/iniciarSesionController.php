
<?php

if (isset($_POST['get'])){
    session_start();

    require_once( $_SERVER['DOCUMENT_ROOT'] . '/RECOMENSSEM/php_librarys/bd.php');
    $usuario = consultarUsuario($_POST['Correo'], $_POST['Contraseña']);
    if ($usuario == null){

      $_SESSION['history'] = "iniciarsesionDisapprove";
      ?>
      <script>
        window.location= '/RECOMENSSEM/PAGINAS/INICIAR_SESION/iniciarSesion.php';
      </script>
      <?php
      exit();

    }else{

      $_SESSION['user'] = $usuario[0]['nombre'];
      $_SESSION['points'] = $usuario[0]['puntosObtenidos'];
      $_SESSION['userID'] = $usuario[0]['idUsuario'];
    

      if($usuario[0]['admin']){
        $_SESSION['admin'] = "es admin";
      } 

      
      $_SESSION['history'] = "iniciarsesionOK";
      ?>
      <script>
        window.location= '/RECOMENSSEM/index.php';
      </script>
      <?php

      exit();

    }
  }

?> 
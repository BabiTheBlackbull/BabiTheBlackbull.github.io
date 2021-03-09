<?php 

  session_start();
  
  include_once  $_SERVER['DOCUMENT_ROOT'] . '/RECOMENSSEM/php_config/config.php' ;
  include_once  $_SERVER['DOCUMENT_ROOT'] . '/RECOMENSSEM/php_librarys/bd.php' ;


  $url= $_SERVER["REQUEST_URI"];

  if(isset($_SESSION['user'])){

    $_SESSION['points'] = selectPuntosUsuario($_SESSION['userID']);

  }

?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <a href="/RECOMENSSEM/index.php">
    <img src="/RECOMENSSEM/media/logo-ninot-small.png" alt="logo" width="100" height="45">

    </a>
    
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent" 
  >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <?php if(isset($_SESSION['user'])){?>
          <a class="navbar-brand lang" key="Noticias" href="/RECOMENSSEM/PAGINAS/INFO_NOTICIAS/infonoti.php" style="padding-left: 20px;"><?php echo $lang['Noticias'] ?></a>
          <a class="navbar-brand lang" key="Juegos" href="/RECOMENSSEM/PAGINAS/JUEGOS/juegos.php"><?php echo $lang['Juegos'] ?></a>
          <a class="navbar-brand lang" key="Ofertas" href="/RECOMENSSEM/PAGINAS/OFERTAS/ofertas.php"><?php echo $lang['Ofertas'] ?></a>
          <?php
          }?>
      </li>
      
    </ul>
   <?php 
   //GET URL CHANGE LANG
   $uri = $_SERVER['REQUEST_URI'];
   $uriParts = explode("?", $uri);
   $uriLang = $uriParts[0];
   
   ?>
    <ul class="navbar-nav" style="align-items: center;">
      <div style="margin-right: 25px;">
      <a href="<?php echo $uriLang."?lang=cat"?>">
        <img  src="/RECOMENSSEM/media/catalonia.png"   width="25" height="25" style="cursor: pointer;">
      </a>
      &nbsp
      &nbsp
      <a href="<?php echo $uriLang."?lang=es"?>">
        <img  src="/RECOMENSSEM/media/spain.png"   width="25" height="25" style="cursor: pointer;">
      </a>
      &nbsp
      &nbsp
      <a href="<?php echo $uriLang."?lang=en"?>">
        <img  src="/RECOMENSSEM/media/unitedKingdom.png"   width="25" height="25" style="cursor: pointer;">
      </a>
      </div>
   
      <?php if(isset($_SESSION['user']) && $url != "/RECOMENSSEM/index.php" && $url != "/RECOMENSSEM/PAGINAS/INFO_NOTICIAS/infonoti.php"){?>
        &nbsp
        &nbsp
		  	<p style="margin:0; color:white;">Puntos: <?php echo $_SESSION['points']?>  </p>
        &nbsp
        &nbsp
      <?php
      }?>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <?php if(isset($_SESSION['user'])){?>
            <?php if(isset($_SESSION['admin'])){ ?>
              <a class="dropdown-item lang" key="GestionUser" href="/RECOMENSSEM/PAGINAS/GESTION_USUARIOS/gestionUsuarios.php" id="gestionUsuarios" ><?php echo $lang['GestionUser'] ?></a>
            <?php }?>
              <a class="dropdown-item lang" key="CerrarSesion" href="/RECOMENSSEM/PAGINAS/LOGOUT/logout.php" id="cerrarSesion" ><?php echo $lang['CerrarSesion'] ?></a>
              
            <?php
        }else{?>
            <a class="dropdown-item lang" key="IniciarSesion" href="/RECOMENSSEM/PAGINAS/INICIAR_SESION/iniciarSesion.php" id="iniciarSesion"><?php echo $lang['IniciarSesion'] ?></a>
            <a class="dropdown-item lang" key="Registrarse" href="/RECOMENSSEM/PAGINAS/REGISTRO/registro.php" id="Registrarse"><?php echo $lang['Registrarse'] ?></a>
        <?php } ?>
          
        </div>
      </li>


      <?php if(isset($_SESSION['user'])){?>

        &nbsp
        &nbsp
        <p style="margin:0; color:white; font-weight: bold;"><?php echo $_SESSION['user']?></p>
        &nbsp
        &nbsp 

        <?php
      }?>
     
    </ul>
  </div>
</nav>
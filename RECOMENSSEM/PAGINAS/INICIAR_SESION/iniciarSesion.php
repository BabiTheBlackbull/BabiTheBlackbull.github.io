<?php
  include_once("../../php_partials/menu.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- <link rel="stylesheet" href="style/stilos.css"> -->
		<!-- <script src="js/script.js"></script> -->
        <link rel="stylesheet" href="../../style/bootstrap.min.css">
        <link rel="stylesheet" href="../../style/registro.css">

       <!-- ICONOS -->
	   <link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
    <title>Inició sesión</title>
</head>
<body>
<div class="container mt-5 col-sm-5" >
    <div class="card">
      <div class="card-header text-white bg-primary">
      Inició sesión
        </a>
      </div>
      <div class="card-body">
        <form action="/RECOMENSSEM/php_controllers/iniciarSesionController.php" method="POST"  enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label lang" key="Correo">Correo</label>
            <div class="col-sm-9">
              <input type="email" name="Correo" id="Correo" class="form-control" placeholder="Correo Electronico" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label lang" key="Contrasenya">Contraseña</label>
            <div class="col-sm-9">
              <input type="password" name="Contraseña" id="Contraseña" class="form-control" placeholder="Contraseña" required>
            </div>
          </div>
          <div class="float-right">
            <button type="submit" name="get" class="btn btn-primary">Iniciar sesión</button>
          </div>
          </form>
          
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUauarioMal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">No se puede iniciar sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Credenciales no validas
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUauarioRegistroOK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Registro completado con exito, hora de iniciar sesion...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../js/script.js" charset="utf-8"></script> 


<?php
 
  if(isset($_SESSION['history'])){
      if( $_SESSION['history'] == "iniciarsesionDisapprove"){
          ?>
          <script>

            jQuery.noConflict(); 
            $('#modalUauarioMal').modal('show');
            
          </script>
          <?php
          $_SESSION['history']= "";

      }elseif( $_SESSION['history'] == "registroOK"){
        ?>
        <script>
          jQuery.noConflict(); 
          $('#modalUauarioRegistroOK').modal('show');
          
        </script>
        <?php
        $_SESSION['history']= "";
      }  
  }



?>


</html>
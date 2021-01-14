<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="style/estils.css"
      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../../../style/bootstrap.min.css">
    
</head>

<body>

<?php
			include_once("../../../../php_partials/menu.php");
		?>

    
  <div id="body">
    <button id="timer"></button>
      <div id="overlay">
        <div id="divButtons">
            <button id="StartButton" onclick="playGame()" >START</button>
            <button id="CancelButton" onclick="goOut()" >CANCEL</button>
          </form>
        </div>
      </div>
      <audio id="audio">
          <source src="media/Bohemian-Rhapsody.mp3">
      </audio>
      <audio id="moneda">
        <source src="media/coinEffect.mp3">
      </audio>
      <audio id="error">
        <source src="media/error.mp3">
      </audio>
      <h1><button id="PuntuacioMomentania"></button></h1>
      <footer><img id="imagenCarrito" src="media/carrito.png" width="100" height="100"></footer>
  </div>
  <div id="menuFinal">
    <audio id="lose">
      <source src="media/defeat.mp3">
    </audio>
    <audio id="win">
      <source src="media/winTheme.mp3">
    </audio>
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="" alt="imagenResultado" id="imagenResultado">
        </div>
      </div>
      <form action="\RECOMENSSEM\PAGINAS\JUEGOS\juegos.php" method="POST" >
        <div class="row">
          <div class="col">
          <button class="btn btn-outline-primary" type="submit" name="vengoJUEGO"> SALIR </button>

          <input type="hidden" id="infoGanador" name="infoGanador" value="GANADOR">
          <input type="hidden" id="idJuego" name="idJuego" value=2 >
          </div>
        </div>
			</form>
    </div>
  </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="\RECOMENSSEM\js\script.js" charset="utf-8"></script>
    <script  src="js/config.js"></script>
    <script  src="js/jocAlbert.js"></script>
    <script  src="js/events.js"></script>
</html>
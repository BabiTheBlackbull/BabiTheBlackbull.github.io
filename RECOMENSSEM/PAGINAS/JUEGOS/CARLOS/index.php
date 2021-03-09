<!DOCTYPE html>

<html>
	<head>
		 <?php 
			include_once  $_SERVER['DOCUMENT_ROOT'] . '/RECOMENSSEM/php_partials/menu.php' ;

		?> 

<link rel="stylesheet" href="/RECOMENSSEM/style/bootstrap.min.css">
<link href="/RECOMENSSEM/FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> 
	   


		<title>Pagina Carlos Aguilar</title>
		<link rel="stylesheet" href="style/stilos.css">
	
	</head>



	<body id="bodyJuego" style="overflow:hidden;">


<!-- http://localhost:8080/RECOMENSSEM/PAGINAS/JUEGOS/CARLOS/index.php -->

		<div id="inicio">
			<button id="play" onclick="reproducirMusica()">
				CLICKA AQUI PARA JUGAR
			</button>
			<p>
				Ordena los productos arrastrando, ya sea nevera, frutero, armario....
			</p>
		</div> 



		<audio id="musica">
			<source src="media/sonidos/musicaFondo.m4a">
		</audio>
		
		<audio id="sonidoOK">
			<source src="media/sonidos/acierto.m4a">
		</audio>
	
		<audio id="sonidoFallo">
			<source src="media/sonidos/fallo.m4a">
		</audio>
		
		<audio id="sonidoPerdido">
			<source src="media/sonidos/game over.m4a">
		</audio>
		
	
		<audio id="sonidoGanador">
			<source src="media/sonidos/Victoria.m4a">
		</audio>
		
		<audio id="sonidoSegundo">
			<source src="media/sonidos/segundaP.m4a">
		</audio>
		
		<div id="espacio">
		

		</div> 
		
		<div id="juego">
			<div id="h">
			<section id="cajonEstanteria">
			</section>
			
			<div id="cuentaAtras">
				Seconds:
				<div id="cuentaAtras1">
					120.
				</div>
			</div>
			
			<div id="neveraYcongelador">
			
				<div id="nevera">
					<section id="cajaSoltarNevera1">
					</section>
					<section id="cajaSoltarNevera2">
					</section>
					<section id="cajaSoltarNevera3">
					</section>
				
					<section id="cajaSoltarCongelador1">
					</section>
					<section id="cajaSoltarCongelador2">
					</section>
				</div>
				
				<div id="puertanevera">
					<section id="puertanevera1">
					
						<img id="imagen100" src="media/cocina/Capa 1.png" width="100%" height="100%" style="position: absolute; top: 0px; left: 0px; position: absolute ; z-index: 10;"/>

					</section>
					<section id="puertanevera2">
					
						<img id="imagen101" src="media/cocina/Capa 2.png" width="100%" height="100%" style="position: absolute; top: 0px; left: 0px; position: absolute; z-index: 10;"/>

					</section>
					<section id="puertanevera3">
					
						<img id="imagen102" src="media/cocina/Capa 3.png" width="100%" height="100%" style="position: absolute; top: 0px; left: 0px; position:absolute; z-index: 10;"/>
						
					</section>
				</div>
				
			</div>
			
			<section id="cajaSoltarFruta">	
			</section>
			
			
			<img id="imgCheck" src="media/checkk.gif" width="100px" height="100px">
			<img id="imgCros" src="media/wrong.gif" width="100px" height="100px">
			
			
			<!-- prooductos a arrastrar -->
			<footer id="cajaimagenes">
				<img id="imagen1" data-lugar1="cajaSoltarFruta" src="media/platanos.png" width="40px" height="40px"/>
				<img id="imagen2" data-lugar1="cajaSoltarFruta" src="media/manzana.png" width="40px" height="40px"/>


				<img id="imagen3" data-lugar1="cajonEstanteria" src="media/chocolate.png" width="40px" height="40px"/>
				<img id="imagen4" data-lugar1="cajonEstanteria" src="media/nuez.png" width="40px" height="40px"/>
				<img id="imagen5" data-lugar1="cajonEstanteria" src="media/almendra.png" width="40px" height="40px"/>
				
				
				<img id="imagen6" data-lugar1="puertanevera3" src="media/botella-de-agua.png" width="40px" height="40px"/>
				<img id="imagen7" data-lugar1="puertanevera3" src="media/caja-de-leche.png" width="40px" height="40px"/>
				<img id="imagen8" data-lugar1="puertanevera3" src="media/soda.png" width="40px" height="40px"/>
				<img id="imagen9" data-lugar1="puertanevera3" src="media/botella-de-vino.png" width="40px" height="40px"/>
				
				
				<img id="imagen10" data-lugar1="puertanevera2" src="media/ketchup.png" width="40px" height="40px"/>
				<img id="imagen11" data-lugar1="puertanevera2" src="media/mayonesa.png" width="40px" height="40px"/>
				
				
				<img id="imagen13" data-lugar1="puertanevera1" src="media/huevos.png" width="40px" height="40px"/>
				<img id="imagen14" data-lugar1="puertanevera1" src="media/mermelada.png" width="40px" height="40px"/>
				
				
				<img id="imagen15" data-lugar1="cajaSoltarCongelador2" data-lugar2="cajaSoltarCongelador1" src="media/caja-de-hielo.png" width="40px" height="40px"/>
				<img id="imagen16" data-lugar1="cajaSoltarCongelador2" data-lugar2="cajaSoltarCongelador1" src="media/helado.png" width="40px" height="40px"/> 
				<img id="imagen17" data-lugar1="cajaSoltarCongelador2" data-lugar2="cajaSoltarCongelador1" src="media/cucurucho-de-helado.png" width="40px" height="40px"/>
				<img id="imagen18" data-lugar1="cajaSoltarCongelador2" data-lugar2="cajaSoltarCongelador1" src="media/helado2.png" width="40px" height="40px"/>
				
				<img id="imagen20" data-lugar1="cajaSoltarNevera1" src="media/yogurt1.png" width="40px" height="40px"/>
				<img id="imagen21" data-lugar1="cajaSoltarNevera1" src="media/pastel.png" width="40px" height="40px"/>
				<img id="imagen22" data-lugar1="cajaSoltarNevera1" src="media/postre.png" width="40px" height="40px"/>
				<img id="imagen23" data-lugar1="cajaSoltarNevera1" src="media/gelatina.png" width="40px" height="40px"/>
				
				
				<img id="imagen24" data-lugar1="cajaSoltarNevera3" src="media/maiz.png" width="40px" height="40px"/>
				<img id="imagen25" data-lugar1="cajaSoltarNevera3" src="media/zanahorias.png" width="40px" height="40px"/>
				<img id="imagen26" data-lugar1="cajaSoltarNevera3" src="media/lechuga.png" width="40px" height="40px"/>
				<img id="imagen27" data-lugar1="cajaSoltarNevera3" src="media/tomate.png" width="40px" height="40px"/>
				
				<img id="imagen28" data-lugar1="cajaSoltarNevera2" data-lugar2="cajaSoltarCongelador1" data-lugar3="cajaSoltarCongelador2" src="media/carne.png" width="40px" height="40px"/>
				<img id="imagen29" data-lugar1="cajaSoltarNevera2" data-lugar2="cajaSoltarCongelador1" data-lugar3="cajaSoltarCongelador2" src="media/pescado.png" width="40px" height="40px"/>
				<img id="imagen30" data-lugar1="cajaSoltarNevera2" src="media/salchicha.png" width="40px" height="40px"/>
				<img id="imagen31" data-lugar1="cajaSoltarNevera2" data-lugar2="cajaSoltarCongelador1" data-lugar3="cajaSoltarCongelador2" src="media/pierna-de-pollo.png" width="40px" height="40px"/>
				
				<img id="imagen32" data-lugar1="cajaSoltarCongelador1" data-lugar2="cajaSoltarNevera2" data-lugar3="cajaSoltarCongelador2" src="media/atun.png" width="40px" height="40px"/>
			</footer>



			</div>
		
		</div>
		
		
		<!-- cuando acaba el juego resultado -->
		<div id="resumen">
			<div id="res">
				<div id="res1">
					<h2>
						Tiempo finalizado 
					</h2>
					<h2>
						Total de puntos:
					</h2>
					<h2 id="puntos">
						0
					</h2>
					<img id="imagenFinal" width="80px" height="80px"/>


					<form action="\RECOMENSSEM\PAGINAS\JUEGOS\juegos.php" method="POST" >

						<button class="btn btn-outline-primary" type="submit" name="vengoJUEGO"> SALIR </button>

						<input type="hidden" id="infoGanador" name="infoGanador" value="GANADOR">
						<input type="hidden" id="idJuego" name="idJuego" value=4 >
		
					</form>

				</div>
			</div>
		</div>
		
		
		
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


		<script src="./js/script.js"></script>
</html>






















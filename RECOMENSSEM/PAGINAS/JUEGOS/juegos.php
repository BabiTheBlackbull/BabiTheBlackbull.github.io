<?php

	include_once("../../php_partials/menu.php");
	require_once("../../php_librarys/bd.php");
	
	$_SESSION['points'] = selectPuntosUsuario($_SESSION['userID']);

	if (isset($_POST['vengoJUEGO'])){

		$haJugado = consultaJuegoUsuario($_SESSION['userID'], $_POST['idJuego']);

		if(!$haJugado){
			$checkWin = $_POST['infoGanador'];
			if($checkWin == "GANADOR"){
				insertJuegoUsuario($_SESSION['userID'],$_POST['idJuego'],true);
				updatePuntosUsuario( $_SESSION['userID'], 100 + $_SESSION['points'] );
			}
		}
	}


?>


<html>

	<head>
	
		<!-- <link rel="stylesheet" href="style/stilos.css"> -->
		<!-- <script src="js/script.js"></script> -->
		<link rel="stylesheet" href="../../style/bootstrap.min.css">
		<link rel="stylesheet" href="../../style/juegos.css"> 
		
		<!-- ICONOS -->
		<link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
      

	</head>
	<body>
	<br>

		<div class="container">
			<div class="row">
				<div class="col-sm-6" onclick="window.location.href='ARNAU/proyecto/index.html'" style="cursor: pointer;">
					<div class="card mb-3 	
					<?php
						if(consultaJuegoUsuario($_SESSION['userID'], 1)){
							echo 'bg-success';
						}else{
							echo 'bg-danger';
						}
					?>">	
									
							<img src="/RECOMENSSEM/media/FotoJuegoArnau.png" class="card-img-top" alt="Enviar formulario"> 
							<div class="card-body">
								<strong class="lang" key="Juego1"> Juego 1</strong>   
								<br>    
							</div>
						
						
					</div>
				</div>			
				<div class="col-sm-6 mb-3" onclick="window.location.href='ALBERT/juego-proyecto/index.php'" style="cursor: pointer;">
					<div class="card 	
					<?php
						if(consultaJuegoUsuario($_SESSION['userID'], 2)){
							echo 'bg-success';
						}else{
							echo 'bg-danger';
						}
					?>">
							
							
								
					<img src="/RECOMENSSEM/media/FotoJuegoAlbert.png" class="card-img-top" alt="Enviar formulario"> 

							<div class="card-body">
								<strong class="lang" key="Juego2"> Juego 2</strong>   
								<br>    
							</div>
						
						
					</div>
				</div>	
			
	
				<div class="col-sm-6 mb-3" onclick="window.location.href='Dani/Inicio.php'" style="cursor: pointer;">
				<div class="card 
					<?php
						if(consultaJuegoUsuario($_SESSION['userID'], 3)){
							echo 'bg-success';
						}else{
							echo 'bg-danger';
						}
					?>">
									
							<img src="/RECOMENSSEM/media/FotoJuegoDani.png" class="card-img-top" alt="Enviar formulario"> 
							<div class="card-body">
								<strong class="lang" key="Juego3"> Juego 3</strong>   
								<br>    
							</div>
						
						
					</div>
				</div>	
				<div class="col-sm-6 mb-3" onclick="window.location.href='CARLOS/index.php'" style="cursor: pointer;">
					<div class="card 	
					<?php
						if(consultaJuegoUsuario($_SESSION['userID'], 4)){
							echo 'bg-success';
						}else{
							echo 'bg-danger';
						}
					?>">
						
							<img src="/RECOMENSSEM/media/FotoJuegoCarlos.png" class="card-img-top" alt="Enviar formulario"> 
							<div class="card-body">
								<strong class="lang" key="Juego4"> Juego 4</strong>   
								<br>    
							</div>
			
						
					</div>
				</div>	

			</div>	

		</div>


    <!-- Modal -->
	<div class="modal fade" id="modalJuegoSuperado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">JUEGO </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					Juego superado, enorabuena, ya tiens 100 puntos mas, que los podras gastar en las ofertas. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>


      <!-- Modal -->
	  <div class="modal fade" id="modalJuegoNoSuperado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">JUEGO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					Juego no superado, ha seguir intentandolo!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>


      <!-- Modal -->
	  <div class="modal fade" id="modalJuegoYaSuperadoAntes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">JUEGO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					Juego ya superado anteriormente, enhorabuena!
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
	<script src="\RECOMENSSEM\js\script.js" charset="utf-8"></script>



	<?php
	
	if (isset($_POST['vengoJUEGO'])){

		if(!$haJugado){
			$checkWin = $_POST['infoGanador'];
			if($checkWin == "GANADOR"){

				
				?>
					<script>
						jQuery.noConflict(); 
						$('#modalJuegoSuperado').modal('show');
					</script>
				<?php
					
			}else{
				?>
					<script>
						jQuery.noConflict(); 
						$('#modalJuegoNoSuperado').modal('show');
					</script>
				<?php
			}

		}else{
			?>
				<script>
					jQuery.noConflict(); 
					$('#modalJuegoYaSuperadoAntes').modal('show');
				</script>
			<?php
		}
	}

?>

</html>
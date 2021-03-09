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

	if( isset($_SESSION['admin']) ){
		$admin = true;
	}else{
		$admin = false;
	}

	$listaJuegos = selectJuegos();

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
		<?php
			if( !$admin ){
		?>


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
								<strong class="lang" key="Juego1"> <?php echo $lang['Juego1'] ?></strong>   
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
								<strong class="lang" key="Juego2"> <?php echo $lang['Juego2'] ?></strong>   
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
								<strong class="lang" key="Juego3"> <?php echo $lang['Juego3'] ?></strong>   
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
								<strong class="lang" key="Juego4"> <?php echo $lang['Juego4'] ?></strong>   
								<br>    
							</div>
			
						
					</div>
				</div>	

			</div>	

		</div>

		<?php
			}else{
		?>

			<div class="card" >
				<div class="card-body">
					<form action="/RECOMENSSEM/php_controllers/JuegosController.php" method="POST">	

			
						<label for="cbxJuego"><?php echo $lang['ModificarPuntosJuego'] ?></label>
						<select name="cbxJuego" id="cbxJuego">
							<option value="1"> <?php echo $lang['Juego1'] ?> </option>
							<option value="2"> <?php echo $lang['Juego2'] ?> </option>
							<option value="3"> <?php echo $lang['Juego3'] ?> </option>
							<option value="4"> <?php echo $lang['Juego4'] ?> </option>
						</select>
					
						<input required placeholder="Puntos" type="number" id="puntos" name="puntos" min="1" style="margin:0;" >
						<label> <?php echo $lang['SaveGame'] ?> </label>
						<button class="btn btn-outline-primary" type="submit" name="UpdateJuego" style="vertical-align: inherit;"> <i class="fas fa-save"></i> </button>
				
					

					</form>  
				
			
				<table class="table table-responsive table-bordered" style="text-align:center">
					<thead>
						<tr>
							<th><?php echo $lang['JuegoAdmin'] ?></th>
							<th><?php echo $lang['JuegoPuntos'] ?></th>
							<th><?php echo $lang['JuegoFoto'] ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> <?php echo $listaJuegos[0]["nombre"] ?> </td>
							<td> <?php echo $listaJuegos[0]["puntos"] ?> </td>
							<td> <div style="width: 200px; height: 100px;">
								<img src="/RECOMENSSEM/media/FotoJuegoArnau.png" class="card-img-top" alt="Enviar formulario"> 
							</div> </td> 
						</tr>
						<tr>
						<td> <?php echo $listaJuegos[1]["nombre"] ?> </td>
							<td> <?php echo $listaJuegos[1]["puntos"] ?> </td>
							<td> <div style="width: 200px; height: 100px;">
								<img src="/RECOMENSSEM/media/FotoJuegoAlbert.png" class="card-img-top" alt="Enviar formulario"> 
							</div> </td> 
						</tr>
						<tr>
						<td> <?php echo $listaJuegos[2]["nombre"] ?> </td>
							<td> <?php echo $listaJuegos[2]["puntos"] ?> </td>
							<td> <div class="img"style="width: 200px; height: 100px;">
								<img src="/RECOMENSSEM/media/FotoJuegoDani.png" class="card-img-top" alt="Enviar formulario"> 
							</div> </td> 
						</tr>
						<tr>
						<td> <?php echo $listaJuegos[3]["nombre"] ?> </td>
							<td> <?php echo $listaJuegos[3]["puntos"] ?> </td>
							<td> <div style="width: 200px; height: 100px;">
								<img src="/RECOMENSSEM/media/FotoJuegoCarlos.png" class="card-img-top" alt="Enviar formulario"> 
							</div> </td> 
						</tr>
					</tbody>
				</table>

			</div>
		<?php
			}
		?>


    <!-- Modal -->
	<div class="modal fade" id="modalJuegoSuperado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['JuegoAdmin'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo $lang['JuegoNotText'] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['BtnCerrar'] ?></button>
                </div>
                </div>
            </div>
        </div>


      <!-- Modal -->
	  <div class="modal fade" id="modalJuegoNoSuperado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['JuegoAdmin'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo $lang['JuegoNotText2'] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['BtnCerrar'] ?></button>
                </div>
                </div>
            </div>
        </div>


      <!-- Modal -->
	  <div class="modal fade" id="modalJuegoYaSuperadoAntes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['JuegoAdmin'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo $lang['JuegoNotText3'] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['BtnCerrar'] ?></button>
                </div>
                </div>
            </div>
        </div>

	
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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




<script>

	function selecionarJuego(juego) {
		document.getElementById("botonMenuJuegos").innerHTML = juego;
		document.getElementById("botonMenuJuegos").value = juego;
	
	}

</script>


</html>
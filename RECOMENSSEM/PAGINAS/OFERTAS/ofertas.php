<?php
include_once("../../php_partials/menu.php");
require_once("../../php_librarys/bd.php");

//http://localhost:8080/RECOMENSSEM/Paginas/OFERTAS/ofertas.php

$listaOfertas = selectOferta();


$_SESSION['points'] = selectPuntosUsuario($_SESSION['userID']);
if (isset($_SESSION['admin'])) {
	$admin = true;
} else {
	$admin = false;
}

$listaOfertasYaCopradas = selectIdOfertaYaAdquiridas($_SESSION['userID']);

?>

<html>

<head>

	<!-- <link rel="stylesheet" href="style/stilos.css"> -->
	<!-- <script src="js/script.js"></script> -->
	<link rel="stylesheet" href="../../style/bootstrap.min.css">
	<link rel="stylesheet" href="../../style/ofertas.css">

	<!-- ICONOS -->
	<link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
	<!--load all styles -->



</head>

<body>


	<br>
	<div class="mr-1 row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin: 10px;">

		<?php
		foreach ($listaOfertas as $oferta) {
		?>

			<div class="col mb-4">


				<form action="\RECOMENSSEM\php_controllers\OfertaController.php" method="POST">


					<div id="<?php echo $oferta["idOferta"] ?>" class="card h-100 bg-info 
							<?php
							foreach ($listaOfertasYaCopradas as $ofe) {
								if ($ofe['Oferta_idOferta'] == $oferta["idOferta"]) {
									echo ' bg-danger';
								}
							}
							?>" style="cursor: pointer;">


						<center>
							<img src="/RECOMENSSEM/media/IMGoferta.png" width="80%">

							<div class="card-body">
								<strong><?php echo $oferta["nombre"] ?></strong>
								<br>
								<strong><?php $tienda = selectTiendaConID($oferta["Tienda_idTienda"]);
										echo $tienda["nombre"] ?></strong>
								<br>
							</div>

						</center>

						<div class="card-footer badge-secondary ">
							<label for="puntos">
								<p class="lang" key="Coste"><?php echo $lang['Coste'] ?></p> <?php echo $oferta['precioOferta'] ?>
							</label>
							<?php
							if ($admin == true) {
							?>


								<form action="RECOMENSSEM/php_controllers/OfertaController.php" method="POST">
									<input value="<?php echo $oferta["idOferta"] ?>" type="hidden" name="idOferta">
									<button style="float: right" class="btn btn-outline-danger" type="submit" name="Eliminar"> <i class="far fa-trash-alt"></i> </button>
								</form>				
								<form action="crearYmodificarOferta.php" method="POST">
									<input value="<?php echo $oferta["idOferta"] ?>" type="hidden" name="idOferta">
									<button style="float: right" class="btn btn-outline-primary" type="submit" name="Update"> <i class="far fa-edit"></i> </button>
								</form>



							<?php
							} else {
							?>

								<button class="btn btn-outline-primary lang" key="Adquirir" type="submit" name="AdquirirOFERTA" style="float: right;"> <?php echo $lang['Adquirir'] ?></i> </button>

							<?php
							}
							?>

						</div>
					</div>

					<input type="hidden" id="idOfertaSelecionada" name="idOfertaSelecionada" value=<?php echo $oferta["idOferta"] ?>>
					<input type="hidden" id="precioOferta" name="precioOferta" value=<?php echo $oferta["precioOferta"] ?>>

				</form>
			</div>

		<?php
		}
		?>

	</div>

	<?php
	if ($admin == true) {
	?>
		<a href="crearYmodificarOferta.php" class="btn btn-success boton"> + </a>
	<?php
	}
	?>


	<!-- Modal -->
	<div class="modal fade" id="modalPuntosInsuficientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['ComprarOferta'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $lang['ComprarOfertaText'] ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['BtnCerrar'] ?></button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalofertaYaFueAdquiridaAntes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['ComprarOferta'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $lang['ComprarOfertaText2'] ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['BtnCerrar'] ?></button>
				</div>
			</div>
		</div>
	</div>





	<!-- Modal -->
	<div class="modal fade" id="modalofertacomprada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['ComprarOferta'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $lang['ComprarOfertaText3'] . " id: " . rand(10000, 99999) ;?>
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

if (isset($_SESSION['history'])) {

	if ($_SESSION['history'] == "puntosInsuficientes") {
?>
		<script>
			jQuery.noConflict();
			$('#modalPuntosInsuficientes').modal('show');
		</script>
	<?php
		$_SESSION['history'] = "";
	} elseif ($_SESSION['history'] == "ofertaYaFueAdquiridaAntes") {
	?>
		<script>
			jQuery.noConflict();
			$('#modalofertaYaFueAdquiridaAntes').modal('show');
		</script>
	<?php
		$_SESSION['history'] = "";
	} elseif ($_SESSION['history'] == "modalofertacomprada") {
	?>
		<script>
			jQuery.noConflict();
			$('#modalofertacomprada').modal('show');
		</script>
<?php
		$_SESSION['history'] = "";
	}
} else {

	$_SESSION['history'] = "";
}



?>





</html>
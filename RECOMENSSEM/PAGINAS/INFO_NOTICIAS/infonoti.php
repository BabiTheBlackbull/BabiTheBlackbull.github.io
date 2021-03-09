<?php
require_once("../../php_librarys/bd.php");
$ListaInfo = SelectInfo();
include_once("../../php_partials/menu.php");

// PRUEBAS

if (isset($_SESSION['admin'])) {
	$admin = true;
} else {
	$admin = false;
}

// PRUEBAS


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
	<link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
	<!--load all styles -->
	<title>INFORMACIÓN</title>
	<style>
		.boton {
			border-color: #4FE781;
			background-color: #4FE781;
			color: white;

			font-size: 28px;
			height: 60;
			width: 60;
			border-radius: 100%;
			position: fixed;
			margin: 10px;
			bottom: 0;
			left: 0;
			z-index: 100;
		}
	</style>
</head>

<body>
	<div style="height: 90vh;">
		<div class="row justify-content-center" style="margin: 10px; ">
			<?php
			foreach ($ListaInfo as $Info) {
			?>
				<div class="card col-8" style="margin: 10px; padding: 15px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="/RECOMENSSEM/media/<?php echo $Info["img"] ?>" class="card-img" height="150px" width="100px">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo $Info["titulo"] ?></h5>
								<p class="card-text"><?php echo $Info["texto"] ?></p>



								<?php
								if ($admin == true) {
								?>


									<form action="../../php_controllers/NoticiaController.php" method="POST">
										<input value="<?php echo $Info["id"] ?>" type="hidden" name="id">
										<button style="float: right; margin-left: 5px;" class="btn btn-outline-danger" type="submit" name="Eliminar"> <i class="far fa-trash-alt"></i> </button>
									</form>

									<form action="crearYmodificarNoticias.php" method="POST">
										<input value="<?php echo $Info["id"] ?>" type="hidden" name="id">
										<button style="float: right" class="btn btn-outline-primary" type="submit" name="Update"> <i class="far fa-edit"></i> </button>
									</form>



								<?php
								}
								?>


							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>

	<?php
	if ($admin == true) {
	?>
		<a href="crearYmodificarNoticias.php" class="btn btn-success boton"> + </a>
	<?php
	}
	?>



	<footer class="bg-primary">
		<?php
		include_once("../../php_partials/footer.php");
		?>
	</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../js/script.js" charset="utf-8"></script>
<script src="../../js/events.js" charset="utf-8"></script>

</html>
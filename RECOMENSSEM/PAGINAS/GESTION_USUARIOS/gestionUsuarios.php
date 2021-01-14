<?php
	include_once("../../php_partials/menu.php");
    require_once("../../php_librarys/bd.php");
	$listaUsuarios = selectUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="../../style/bootstrap.min.css">
		<link rel="stylesheet" href="../../style/ofertas.css">
       <!-- ICONOS -->
	    <link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
	   
</head>
<body>
<div class="mr-1 row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" style="margin: 10px;">
			
			<?php
				foreach ($listaUsuarios as $usuario){
                    if($usuario["admin"]){
                    $admin = "Sí";
                    }
                    else{
                    $admin = "No";
                    }
			?>
                <div class="col mb-4">
                    <div class="card h-100" style="margin-top: 10px;">
                        <div class="card-body">
                            <p style="font-weight: bold;"><?php echo "Nombre: ".$usuario["nombre"];?></p>
                            <p style="font-weight: bold;"><?php echo "Cognoms: ".$usuario["cognoms"];?></p>
                            <p style="font-weight: bold;"><?php echo "Correu: ".$usuario["mail"];?></p>
                            <p style="font-weight: bold;"><?php echo "Admin: ".$admin;?></p>
                            
                        </div>
                        <div class="card-footer">
                        <form action="../../php_controllers/gestionUsuarioController.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="uploadTrash" class="btn btn-outline-danger float-right" style="margin-left: 2px;" ><i class="fa fa-trash"></i></button>
                                <input type="hidden" id="idUsuarioTrash" name="idUsuarioTrash" value=<?php echo $usuario["idUsuario"]?>>
                        </form>
                        <form action="editarUsuario.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="uploadEdit" class="btn btn-outline-primary float-right"  ><i class="fa fa-edit"></i></button>
                                <input type="hidden" id="idUsuarioUpdate" name="idUsuarioUpdate" value=<?php echo $usuario["idUsuario"] ?>>
                        </form>
                        </div>
                    </div>
                </div>
			<?php
				}
			?>

		</div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>


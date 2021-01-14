<?php
require_once("..\..\php_librarys\bd.php");
$listaTIENDAS = selectTienda();
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
    <title>Inició sesión</title>
</head>

<body>

    <?php
    include_once("../../php_partials/menu.php");

    if (isset($_POST['Update'])) {

        $form = 1;


        $Info = selectUnaNoticia($_POST['id']);


        $id = $Info[0]['id'];
        $nombre = $Info[0]['titulo'];
        $texto = $Info[0]['texto'];
        $img = $Info[0]['img'];
    } else {
        $form = 0;
        $id = 0;
    }

    ?>


    <div class="container mt-5 col-sm-6">
        <div class="card">

            <div class="card-header text-white bg-primary">
                <?php  if ($form == false) {echo 'Crear Noticia';} else { echo 'Editar Noticia';} ?>
            </div>
            <div class="card-body">
                <form action="../../php_controllers/NoticiaController.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre de la tienda" required value="<?php  if ($form == true) {echo $nombre;} ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Escribe una descricion para la tienda" required value="<?php  if ($form == true) {echo $texto;} ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Imagen</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="file">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                            </div>
                            
                        </div>
                    </div>


                    <input type="hidden" id="id" name="id" value="<?php echo $id?>">

                    <div class="float-right">
                        <button type="submit" name="<?php if ($form == true) { echo "update";} else {echo "insert";} ?>" class="btn btn-primary"><?php if ($form == true) {echo "Editar noticia";} else {echo "Crear noticia"; } ?></button>
                    </div>

                    <div class="float-right">
                        <button onclick="quitar()" href="\RECOMENSSEM\PAGINAS\NOTICIAS\infonoti.php" type="submit" name="nada" class="btn btn-secondary">Cerrar</button>
                    </div>



                </form>
            </div>

            
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js" charset="utf-8"></script>

<script>
    function quitar() {

        document.getElementById('desc').removeAttribute("required");
        document.getElementById('nombre').removeAttribute("required");

    }
</script>


</html>
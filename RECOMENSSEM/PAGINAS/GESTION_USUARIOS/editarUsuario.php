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
        <link href="../../FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <title>Editar Usuario</title>
    </head>
    <body>

    


        <?php
        include_once("../../php_partials/menu.php");
        
        if (isset($_POST['uploadEdit'])){

            $usuario = selectUnUsuario($_POST['idUsuarioUpdate']);
            
            

            $id = $usuario[0]['idUsuario'];
            $nombre = $usuario[0]['nombre'];
            $cognom = $usuario[0]['cognoms'];
            $mail = $usuario[0]['mail'];
            $contrasenya = $usuario[0]['contrasenya'];
            $admin = $usuario[0]['admin'];
            $puntosObtenidos = $usuario[0]['puntosObtenidos'];
            }
             ?>

        <div class="container mt-5 col-sm-5" >
            <div class="card">
                
                <div class="card-header text-white bg-primary">
                    Editar usuario
                </div>
                <div class="card-body">
                    <form action="../../php_controllers/gestionUsuarioController.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required value="<?php echo $nombre?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cognom</label>
                            <div class="col-sm-10">
                                <input type="text" name="cognom" id="cognom" class="form-control" placeholder="cognom" required value="<?php echo $cognom?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Correu</label>
                            <div class="col-sm-10">
                                <input type="text" name="correu" id="correu" class="form-control" placeholder="correu" required value="<?php echo $mail?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contrasenya</label>
                            <div class="col-sm-10">
                                <input type="password" disabled="disabled" name="contrasenya42432" id="contrasenya23424332" class="form-control" placeholder="contrasenya" required value="<?php echo $contrasenya?>"> 
                                <input type="hidden" name="contrasenya" id="contrasenya" class="form-control" placeholder="contrasenya" required value="<?php echo $contrasenya?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Puntos</label>
                            <div class="col-sm-10">
                                <input type="number" name="puntos" id="puntos" class="form-control"  required value="<?php echo $puntosObtenidos?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rbAdmin" class="col-sm-4 col-form-label">Admin</label>
                            <div class="col-sm-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="rbAd" id="rbSi" class="custom-control-input" value="1"
                                    <?php if($admin){ echo ' checked="checked"'; } ?>>
                                    <label for="rbSi" class="custom-control-label" >Sí</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline" >
                                    <input type="radio" name="rbAd" id="rbNo" class="custom-control-input" value="0" 
                                    <?php if(!$admin){ echo ' checked="checked"'; }?>>
                                    <label for="rbNo" class="custom-control-label" >No</label> 
                                </div>
                            </div>
                        </div>
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $id?>">
                            <button type="submit" name="update"  class="btn btn-primary">Editar</button>

                            <a class="btn btn-secondary " href="../../PAGINAS/GESTION_USUARIOS/gestionUsuarios.php">Cancelar</a> 
        
                        </div>



                    </form>  
                </div>
            </div>
        </div>  
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>
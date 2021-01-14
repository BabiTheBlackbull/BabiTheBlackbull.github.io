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
        <title>Inició sesión</title>
    </head>
    <body>

    


        <?php
        include_once("../../php_partials/menu.php");
        $idTienda = 33;
        if (isset($_POST['Update'])){

            $form = 1;
            
            
            $oferta = selectUnaOferta($_POST['idOferta']);
            
            
            
            $id = $oferta[0]['idOferta'];
            $nombre = $oferta[0]['nombre'];
            $idTienda = $oferta[0]['Tienda_idTienda'];
            $puntos = $oferta[0]['precioOferta'];

            
            }
            else{
                $form = 0;
                $id = 0;
            }
             
             
             ?>
        ?>



        <div class="container mt-5 col-sm-5" >
            <div class="card">
                
                <div class="card-header text-white bg-primary">
                    Crear Oferta
                </div>
                <div class="card-body">
                    <form action="../../php_controllers/OfertaController.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required value="<?php  if($form == true){ echo $nombre; }?>"> 
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="cbxTienda"class="col-sm-2 col-form-label">Tiendas</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="cbxTienda" id="cbxTienda" >
                                <?php
                                    foreach ($listaTIENDAS as $tienda) {    
                                ?>
                                    <option value="<?php echo $tienda['idTienda']?>"<?php if ($tienda['idTienda'] == $idTienda){ echo "selected"; } ?>> 
                                        <?php echo $tienda['nombre']?> 
                                    </option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Puntos oferta </label>
                            <div class="col-sm-10">
                                <input type="number" name="puntos" id="puntos" class="form-control" placeholder="puntos" min="1" max="300" required value="<?php  if($form == true){ echo $puntos; }?>">
                            </div>
                        </div>
                        


                        <input type="hidden" id="idOferta" name="idOferta" value="<?php echo $id?>">
                        <div class="float-right">
                            <button type="submit" name="<?php if($form == true){ echo "update"; } else{echo "insert";} ?>" class="btn btn-primary"><?php  if($form == true){ echo "Editar oferta"; } else{echo "Crear oferta";}?></button>
                        </div>
                        
                        <div class="float-right">
                            <button onclick="quitar()" href="\RECOMENSSEM\PAGINAS\OFERTAS\ofertas.php" type="submit" name="nada" class="btn btn-secondary">Cerrar</button>
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
      
            document.getElementById('puntos').removeAttribute("required");
            document.getElementById('nombre').removeAttribute("required");

        }
    </script>


</html>
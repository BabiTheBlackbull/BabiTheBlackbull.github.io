<?php
include_once('php_partials/menu.php');
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="/RECOMENSSEM/style/index.css">
        <!-- ICONOS -->
        <link href="FONTAWESOME/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">


    
        <style>
            body {
                background-image: url("media/fondo.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body>
        <!-- Contenedor principal -->
        <div class="container mt-3 w-50" style="height: 78vh; min-height: auto; background-color: rgba(44, 62, 80, 0.8);">
            <div style="position: relative;
                        top:50%;
                        left: 50%;
                        transform: translate(-50%,-50%);
                        text-align: center;">

                <div class="row w-100 align-items-center">
                    <div class="col text-center">
                        <a href="PAGINAS/INFO_NOTICIAS/infonoti.php" class="btn btn-warning regular-button w-50 lang" key="Noticias" style="height: 100px; font-size: 30px; line-height:85px;"> Noticias </a>
                    </div>
                </div>

                <?php if (isset($_SESSION['user'])) { ?>
                    <div class="row w-100 align-items-center mt-4" style="display: block">
                        <div class="col text-center">
                            <a href="PAGINAS/JUEGOS/juegos.php" class="btn btn-warning regular-button w-50 lang" key="Juegos" style="height: 100px; font-size: 30px; line-height:85px;"> Juegos </a>
                        </div>
                    </div>

                    <div class="row w-100 align-items-center mt-4" style="display: block">
                        <div class="col text-center">
                            <a href="PAGINAS/OFERTAS/ofertas.php" class="btn btn-warning regular-button w-50 lang" key="Ofertas" style="height: 100px; font-size: 30px; line-height:85px;"> Ofertas </a>
                        </div>
                    </div>

                <?php
                } else { ?>
                <div class="row w-100 align-items-center mt-4" style="display: none">
                    <div class="col text-center">
                        <a href="PAGINAS/JUEGOS/juegos.php" class="btn btn-warning regular-button w-50 lang" key="Juegos" style="height: 100px; font-size: 30px; line-height:85px;"> Juegos </a>
                    </div>
                </div>

                    <div class="row w-100 align-items-center mt-4" style="display: none">
                        <div class="col text-center">
                            <a href="PAGINAS/OFERTAS/ofertas.php" class="btn btn-warning regular-button w-50 lang" key="Ofertas" style="height: 100px; font-size: 30px; line-height:85px;"> Ofertas </a>
                        </div>
                    </div>
                <?php } ?>

                <div class="row mt-4" data-toggle="modal" data-target="#exampleModal">
                    <div class="" style="width: 71%; text-align:right; font-size:20px;">
                        <a href="#" class="lang" key="Ayuda">Ayuda</a>
                    </div>
                </div>


            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title lang" key="ComoFunciona" id="exampleModalLabel">Como funciona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <p class="lang" key="Ayuda1">
                            - Noticias: En la sección Noticias encontrarás toda la actualidad del Mercat del Ninot, y de información de
                            quienes somos
                        </p>
                            <br><br>
                        <p class="lang" key="Ayuda2">
                            - Juegos: En la sección Juegos, exlusiva para usuarios de nuestra página, podrás acceder a los cuatro juegos que tenemos disponibles en nuestra página web,
                            con los cuales podras conseguir puntos para canjear en nuestros productos
                        </p>
                            <br><br>
                        <p class="lang" key="Ayuda3">
                            - Ofertas: En la sección Ofertas, exclusiva para usuarios registrados en nuestra página, podras ver todas las ofertas que
                            ofrecemos, y gracias a los puntos conseguidos en los juegos, podrás canjearlos en estas
                        </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary lang" key="AyudaCerrar" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalUauarioOK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bien venido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Iniciado sesion correctamente 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>



    </body>
    <footer class="bg-primary">
        <?php
        include_once("php_partials/footer.php");
        ?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js" charset="utf-8"></script> 
  
	 

    <?php
        if(isset($_SESSION['history'])){
            if( $_SESSION['history'] == "iniciarsesionOK"){
                ?>
                <script>
                    jQuery.noConflict(); 
                    $('#modalUauarioOK').modal('show');
                </script>
                <?php
                $_SESSION['history'] = "HOME";
            }
        }else{

            $_SESSION['history'] = "HOME";

        }
    ?>


</html>


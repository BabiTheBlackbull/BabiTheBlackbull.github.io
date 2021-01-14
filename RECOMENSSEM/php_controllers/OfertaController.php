<?php

    require_once("../php_librarys/bd.php");



        if (isset($_POST['insert'])){

                insertarOferta( $_POST['nombre'],$_POST['cbxTienda'],$_POST['puntos']);

                header('Location: \RECOMENSSEM\PAGINAS\OFERTAS\ofertas.php');
                exit();

        }elseif(isset($_POST['Eliminar'])){

                deleteOferta( $_POST['idOferta'] );

                header('Location: \RECOMENSSEM\PAGINAS\OFERTAS\ofertas.php');
                exit();

        }elseif(isset($_POST['update'])){

                updateOferta($_POST['idOferta'],  $_POST['nombre'],  $_POST['cbxTienda'],  $_POST['puntos']);

                header('Location: \RECOMENSSEM\PAGINAS\OFERTAS\ofertas.php');
                exit();
        }elseif(isset($_POST['nada'])){

                header('Location: \RECOMENSSEM\PAGINAS\OFERTAS\ofertas.php');
                exit();
        }

      
        if (isset($_POST['AdquirirOFERTA'])){
                session_start();

                $puntosObtenidos = $_SESSION['points'];

                $listaOfertasYaCopradas = selectIdOfertaYaAdquiridas($_SESSION['userID']);
        
                $ofertaSelecionID = 0;
                $ofertaSelecionPrecio = 0;

                if( $_POST['idOfertaSelecionada'].EXTR_IF_EXISTS ){
                        $ofertaSelecionID = $_POST['idOfertaSelecionada'];
                        $ofertaSelecionPrecio = $_POST['precioOferta'];
                }
        


                if( $puntosObtenidos >= $ofertaSelecionPrecio ){

                        // CANJEAR OFERTA OK
                        $SePuedeComprar=true;
                        foreach($listaOfertasYaCopradas as $ofertaaa){
                                if($ofertaaa['Oferta_idOferta'] == $ofertaSelecionID){
                                        $SePuedeComprar=false;
                                }
                        }
                

                        if($SePuedeComprar){
                                updatePuntosUsuario($_SESSION['userID'], $puntosObtenidos - $ofertaSelecionPrecio);
                                insertUsuarioOferta( $_SESSION['userID'], $ofertaSelecionID ); 

                                $_SESSION['history'] = "modalofertacomprada";
                                ?>
                                        <script>
                                        location.href = "/RECOMENSSEM/PAGINAS/OFERTAS/ofertas.php";		
                                        </script>
                                <?php
                
                        }else{
                
                               $_SESSION['history'] = "ofertaYaFueAdquiridaAntes";
                               ?>
                                       <script>
                                       location.href = "/RECOMENSSEM/PAGINAS/OFERTAS/ofertas.php";		
                                       </script>
                               <?php
                        }
                      
                        
                }else{

                        $_SESSION['history'] = "puntosInsuficientes";
                        ?>
                                <script>
                                location.href = "/RECOMENSSEM/PAGINAS/OFERTAS/ofertas.php";		
                                </script>
                        <?php
                }


        }







?>
<?php

    function openBD(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        

        try{
            $conexion = new PDO("mysql:host=$servername;dbname=db_recomencem", $username, $password);
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("set names utf8");

            return $conexion;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    
        
    }

    function closeBD(){
        return null;
    }


    
    //FUNCIONES PARA COMPROVAR EL JUEGO
    function consultaJuegoUsuario($Usuario_idUsuario, $Juego_idJuego){
        $conexion = openBD();

        try{
            $sentenciaText = "select * from usuario_has_juego where Usuario_idUsuario=$Usuario_idUsuario and Juego_idJuego=$Juego_idJuego";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    function selectJuegos(){
        $conexion = openBD();

        $sentenciaText = "select * from juego ";

        $sentencia =$conexion->prepare($sentenciaText);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        $conexion = closeBD();
        
        return $resultado;
    }






    function insertUsuarioOferta($Usuario_idUsuario,$Oferta_idOferta){

        try{
            if(!empty($Oferta_idOferta) && !empty($Usuario_idUsuario)){

                $conexion = openBD();
    
                $sentenciaText = "insert into usuario_has_oferta (Usuario_idUsuario,Oferta_idOferta) values (:Usuario_idUsuario,:Oferta_idOferta)";
    
                $sentencia =$conexion->prepare($sentenciaText);
    
                $sentencia->bindParam(":Usuario_idUsuario", $Usuario_idUsuario);
                $sentencia->bindParam(":Oferta_idOferta", $Oferta_idOferta);
    
                $sentencia->execute();
    
                $conexion = closeBD();
                
            }
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    function insertJuegoUsuario($Usuario_idUsuario,$Juego_idJuego,$juego_pasado){
        $conexion = openBD();

        try{
            $sentenciaText = "insert into usuario_has_juego (Usuario_idUsuario,Juego_idJuego,juego_pasado) values (:Usuario_idUsuario,:Juego_idJuego,:juego_pasado)";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":Usuario_idUsuario", $Usuario_idUsuario);
            $sentencia->bindParam(":Juego_idJuego", $Juego_idJuego);
            $sentencia->bindParam(":juego_pasado", $juego_pasado);
            $sentencia->execute();
    
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        

    }

    function updatePuntosUsuario($idUsuario, $puntosObtenidos){
        $conexion = openBD();
    
        try{
            $sentenciaText = "update usuario  SET  puntosObtenidos = :puntosObtenidos where idUsuario = $idUsuario";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':puntosObtenidos',$puntosObtenidos);
            
    
            $sentencia->execute();
        
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    function selectUsuarios(){
        $conexion = openBD();

        try{
            $sentenciaText = "
            select * from usuario
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    function deleteUser($idUsuario){
        $conexion = openBD();

        deleteHasJuegoUser($idUsuario);
        deleteHasOfertaUser($idUsuario);

        try{
		
            $sentenciaText = "
            DELETE FROM usuario WHERE idUsuario=:idUsuario;
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":idUsuario",$idUsuario);
            $sentencia->execute();
    
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
  

    function deleteHasJuegoUser($Usuario_idUsuario){
        $conexion = openBD();

        $sentenciaText = "
        DELETE FROM usuario_has_juego WHERE Usuario_idUsuario=:Usuario_idUsuario;
        ";
        $sentencia =$conexion->prepare($sentenciaText);
        $sentencia->bindParam(":Usuario_idUsuario",$Usuario_idUsuario);
        $sentencia->execute();

        $conexion = closeBD();
    }
  
    function deleteHasOfertaUser($Usuario_idUsuario){
        $conexion = openBD();

        $sentenciaText = "
        DELETE FROM usuario_has_oferta WHERE Usuario_idUsuario=:Usuario_idUsuario;
        ";
        $sentencia =$conexion->prepare($sentenciaText);
        $sentencia->bindParam(":Usuario_idUsuario",$Usuario_idUsuario);
        $sentencia->execute();

        $conexion = closeBD();
    }
  


    function selectPuntosUsuario($idUsuario){
        $conexion = openBD();

        try{
            $sentenciaText = "
            SELECT puntosObtenidos FROM usuario where idUsuario=$idUsuario;
            ";
    
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
    
            $conexion = closeBD();
    
            return $resultado[0];
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }







    function selectUnUsuario($idUsuario){
        $conexion = openBD();

        try{
            $sentenciaText = "select * from usuario where idUsuario=$idUsuario";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    function updateUsuario($idUsuario, $nombre, $cognoms, $mail, $contrasenya, $admin, $puntosObtenidos){

        $conexion = openBD();
    
        try{
            $sentenciaText = "update usuario  SET nombre = :nombre, cognoms = :cognoms, mail = :mail, contrasenya = :contrasenya, admin = :admin, puntosObtenidos = :puntosObtenidos where idUsuario = $idUsuario";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':cognoms',$cognoms);
            $sentencia->bindParam(':mail',$mail);
            $sentencia->bindParam(':contrasenya',$contrasenya);
            $sentencia->bindParam(':admin',$admin);
            $sentencia->bindParam(':puntosObtenidos',$puntosObtenidos);
            
    
            $sentencia->execute();
        
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    function selectOferta(){
        $conexion = openBD();

        try{
            $sentenciaText = "
            select * from oferta
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    function selectIdOfertaYaAdquiridas($Usuario_idUsuario){
        $conexion = openBD();

        try{
            $sentenciaText = "
            SELECT * FROM usuario_has_oferta where Usuario_idUsuario = $Usuario_idUsuario;
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    function selectTiendaConID($idTienda){
   
        $conexion = openBD();

        try{
            $sentenciaText = 
            "
            SELECT * FROM tienda where idTienda=:idTienda
            ;";
    
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":idTienda",    $idTienda);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
    function InsertarUsuarios($nombre,$apellidos,$correo,$contraseña){

        $conexion = openBD();


        try{
            $hash = Password::hash($contraseña);
           

            $sentenciaText = "insert into usuario (nombre,cognoms,mail,contrasenya,admin,puntosObtenidos) values (:nombre,:cognoms,:mail,:contrasenya,0,0) ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":nombre",    $nombre);
            $sentencia->bindParam(":cognoms",    $apellidos);
            $sentencia->bindParam(":mail",    $correo);
            $sentencia->bindParam(":contrasenya",    $hash);
            $sentencia->execute();
    
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        

    }

    function SelectInfo(){
        $conexion = openBD();

        try{
            $sentenciaText = "
            select * from infonoticia
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }





    function selectTienda(){
        $conexion = openBD();

        try{
            $sentenciaText = "
            select * from tienda
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    function selectUnaOferta($id){
        $conexion = openBD();

        try{
            $sentenciaText = "select * from oferta where idOferta=$id";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    function insertarOferta( $nombre, $Tienda_idTienda, $precioOferta){

        $conexion = openBD();


        try{
            $sentenciaText = "insert into oferta (nombre, Tienda_idTienda ,precioOferta) values (:nombre, :Tienda_idTienda, :precioOferta ) ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":nombre",    $nombre);
            $sentencia->bindParam(":Tienda_idTienda",    $Tienda_idTienda);
            $sentencia->bindParam(":precioOferta",    $precioOferta);
    
    
            $sentencia->execute();
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        

    }

    // Seleccionar una noticia
    function selectUnaNoticia($id){
        $conexion = openBD();

        try{
            $sentenciaText = "select * from infonoticia where id=$id";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    // Insertar una noticia nueva
    function insertarNoticia( $nombre, $texto, $img){

        $conexion = openBD();


        try{
            $sentenciaText = "insert into infonoticia (titulo, texto, img) values (:nombre, :texto, :img) ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":nombre",    $nombre);
            $sentencia->bindParam(":texto",    $texto);
            $sentencia->bindParam(":img",    $img);
    
    
            $sentencia->execute();
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        

    }



    function deleteOferta( $idOferta ){
        deleteOfertaDeLosUsuarios($idOferta);
        $conexion = openBD();

        try{
            $sentenciaText = "
            DELETE FROM oferta WHERE idOferta=:idOferta;
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":idOferta", $idOferta);
            $sentencia->execute();
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    function deleteOfertaDeLosUsuarios( $idOferta ){
        $conexion = openBD();
        
        try{
            $sentenciaText = "
            DELETE FROM usuario_has_oferta WHERE Oferta_idOferta=:idOferta;
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":idOferta", $idOferta);
            $sentencia->execute();
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }


    // Eliminar noticia
    function deleteNoticia( $id ){
        $conexion = openBD();

        try{
            $sentenciaText = "
            DELETE FROM infonoticia WHERE id=:id;
            ";
            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

    }
    function updateJuego($idJuego, $puntos){
        
        $conexion = openBD();

        $sentenciaText = "update Juego SET puntos = :puntos where idJuego = $idJuego";
        $sentencia = $conexion->prepare($sentenciaText);

        $sentencia->bindParam(':puntos',$puntos);

        $sentencia->execute();
    
        $conexion = closeBD();
    
    }





    function updateOferta($idOferta, $nombre, $Tienda_idTienda, $precioOferta){
        
        $conexion = openBD();
    
        try{
            $sentenciaText = "update oferta  SET nombre = :nombre, Tienda_idTienda = :Tienda_idTienda, precioOferta = :precioOferta where idOferta = $idOferta";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':Tienda_idTienda',$Tienda_idTienda);
            $sentencia->bindParam(':precioOferta', $precioOferta);
    
            $sentencia->execute();
        
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    
    }

    // Actualizar noticia
    function updateNoticia($id, $titulo, $texto, $img){
        
        $conexion = openBD();
    
        
        try{
            $sentenciaText = "update infonoticia  SET titulo = :titulo, texto = :texto, img = :img where id = $id";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':titulo',$titulo);
            $sentencia->bindParam(':texto',$texto);
            $sentencia->bindParam(':img',$img);
    
            $sentencia->execute();
        
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    
    }

    function updateNoticiaSinImagen($id, $titulo, $texto){
        
        $conexion = openBD();
    
        
        try{
            $sentenciaText = "update infonoticia  SET titulo = :titulo, texto = :texto where id = $id";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':titulo',$titulo);
            $sentencia->bindParam(':texto',$texto);
    
            $sentencia->execute();
        
            $conexion = closeBD();
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    
    }

    function consultarUsuario($mail,$password){

        $conexion = openBD();
        $hash = Password::hash($password);

        try{
            $sentenciaText = "select * from usuario where mail=:mail AND contrasenya=:contrasenya";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":mail",$mail);
            $sentencia->bindParam(":contrasenya",$hash);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
    
            $conexion = closeBD();
    
            return $resultado;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }

    class Password{
        const SALT = 'EstoEsUnSalt';
        public static function hash($password) {
            return hash('sha512', self::SALT . $password);
        }
        public static function verify($password, $hash) {
            return ($hash == self::hash($password));
        }
    }



    function consultarCorreoIfExist($mail){

        $conexion = openBD();

        try{
            $sentenciaText = "select * from usuario where mail=:mail";

            $sentencia =$conexion->prepare($sentenciaText);
            $sentencia->bindParam(":mail",$mail);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            $conexion = closeBD();
    
            if($resultado == false){
                return false;
            }else{
                return true;
            }
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        

    }





?>
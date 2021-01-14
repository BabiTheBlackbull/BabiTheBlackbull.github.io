function leftArrowPressed() {
    
    var carro = document.getElementById("imagenCarrito");
    if(parseInt(carro.left) > 0){
    carro.left =  parseInt(carro.left) - 10 + 'px';
    carro.style.left = carro.left;}
}

function rightArrowPressed() {
   
    var carro = document.getElementById("imagenCarrito");
    if((parseInt(carro.left) + carro.width) < width){
    carro.left = parseInt(carro.left)+ 10 + 'px';
    carro.style.left = carro.left;}
}
function moveSelection(evt) {
    
    switch (evt.keyCode) {
    case 37:
        leftArrowPressed();
        break;
    case 39:
        rightArrowPressed();
        break;
    }
}
function setAltura(){
    var widthProducto = "45";
    var heightProducto = "45";
    var poscicionInicialProducto = 35;
    var img = document.createElement('img'); 

    var opcion = Math.floor(Math.random() * 2);

    var rutaProd = "";

    if(opcion == 0){
        rutaProd = productosMercado[Math.floor(Math.random() * productosMercado.length)];
    }
    if(opcion == 1){
        rutaProd = otrosProductos[Math.floor(Math.random() * otrosProductos.length)];
    }
            img.id = "imagen" + numeroDeProductos; 
            img.src = rutaProd; 
            img.width = widthProducto;
            img.height = heightProducto;
            img.top = poscicionInicialProducto + 'px';

    var left =  Math.floor(Math.random() * width) ;;

        if(left == width){
            left = left - img.width;
        }
        else if(left == 0){
            left = left + img.width;
        }
            
            img.left = left + 'px';
            img.style.left = img.left;



            
            document.getElementById('body').appendChild(img);
            numeroDeProductos = numeroDeProductos + 1; 

            window.setInterval(function(){
                dropFood(img);
              }, 50);
}
function dropFood(img){
            
    var a = false;        
    
    for(i = 0; i < 10; i++){

        var element = document.getElementById(img.id);
 
        if(typeof(element) != 'undefined' && element != null){
            img.top = (parseInt(img.top) + 1) + 'px';
                img.style.top = img.top;
                
                var carrito = document.getElementById('imagenCarrito');
                var producto = document.getElementById(img.id);
                var carritoBounding  = carrito.getBoundingClientRect();
                var productoBounding = producto.getBoundingClientRect();
                var widthCarrito = parseInt(carritoBounding.left)  + parseInt(carritoBounding.width)
                var RightProducto = parseInt(productoBounding.left)  + parseInt(productoBounding.width);

                if(carritoBounding.top == productoBounding.top){

                    if(parseInt(productoBounding.left) > parseInt(carritoBounding.left) && productoBounding.left < widthCarrito || RightProducto > parseInt(carritoBounding.left) && RightProducto < widthCarrito ){
                        var prodCorrecte = comprobarProd(img);
                        var puntuacionMaxima = 750;
                        if(prodCorrecte){
                            puntuacion = puntuacion + 10;
                        
                            var sonidoMoneda = document.getElementById('moneda');

                            sonidoMoneda.pause();
                            sonidoMoneda.currentTime = 0;


                            sonidoMoneda.play();
                            sonidoMoneda.volume = 0.20;
                        }
                        else{
                            puntuacion = puntuacion - 5;

                            var sonidoError = document.getElementById('error');

                            sonidoError.pause();
                            sonidoError.currentTime = 0;

                            sonidoError.play();
                            sonidoError.volume = 0.80;
                            
                        }
                        document.getElementById('body').removeChild(img);
                        var puntuacionBtn =document.getElementById('PuntuacioMomentania').style.display;
                        if( puntuacionBtn === ""){
                            document.getElementById('PuntuacioMomentania').style.display = "block";
                        }

                        document.getElementById('PuntuacioMomentania').innerHTML= "Puntuación: " + puntuacion;
                        
                        if(puntuacion >= puntuacionMaxima){
                            juegoOver();
                        }
                        
                    }

                }
                if(parseInt(img.top) == height){
                    document.getElementById('body').removeChild(img);
                }
        }
          }
}
function comprobarProd(prod){
    var confirmar = false;
    var srcProducto = "." + prod.src.substr(70);
    for(i=0;i <= productosMercado.length; i++){
        if(productosMercado[i] == srcProducto){
            confirmar = true;
        }
    }
    return confirmar;
}
function playGame(){
    tiempoYcrono();
    var music = document.getElementById('audio');
    music.play();

    music.volume = 0.05;
    
    window.setInterval(function(){
        setAltura();
      }, 500);

    document.getElementById("overlay").style.display = "none";
}
function tiempoYcrono(){

    var inter,t;
    function interval(){
    t=120;
    inter=setInterval(function(){
    if(document.getElementById("timer").style.display ===""){
        document.getElementById("timer").style.display = "block";
    }
    document.getElementById("timer").innerHTML=  t-- + "s  ";
    },1000,"JavaScript"); 
    }

    
    
    
    function timeout(){
    
    setTimeout(function(){
    clear();
    juegoOver();
    },121000,"JavaScript");

  

    }
    
    function clear(){
    clearInterval(inter);
    }
    interval();
    timeout();
    
}
    
    

function juegoOver(){
    document.getElementById("body").style.display = "none";
    document.getElementById("menuFinal").style.display = "block";
    var puntuacionMinima = 350;

    var musicaFondo = document.getElementById('audio');
    musicaFondo.volume = 0;

    if( puntuacion >= puntuacionMinima) {
        var victorySound = document.getElementById('win');
        victorySound.play();
        victorySound.volume = 0.50;
        var imagenVictoria = document.getElementById('imagenResultado');
        imagenVictoria.src = "./media/winner.png"

        var inputNombre = document.getElementById("infoGanador");
        inputNombre.value = "GANADOR";
    }
    else{
        var victorySound = document.getElementById('lose');
        victorySound.play();
        victorySound.volume = 0.50;
        var imagenVictoria = document.getElementById('imagenResultado');
        imagenVictoria.src = "./media/loser.png"

        var inputNombre = document.getElementById("infoGanador");
        inputNombre.value = "PERDEDOR";
    }
    }

    

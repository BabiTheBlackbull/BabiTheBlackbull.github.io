var bola = document.createElement('div');
bola.id = "bola";
bola.style.left = 360 + "px";
bola.style.top = 50 + "px";
bola.style.width = 60 + "px";
bola.style.height = 60 + "px";
bola.style.backgroundImage = "url('img/Derecha.png')";
bola.style.backgroundSize = "100%";
bola.style.backgroundRepeat = "no-repeat";
bola.style.position = "absolute";
document.getElementById('tablero').append(bola);




var x = 360;
var y = 50;
const VELOCIDAD = 10;
var estantes = document.querySelectorAll('div.estante');
var isChocando = false;

document.addEventListener('keydown', (event) => {
    posx = parseInt(bola.style.left);
    posy = parseInt(bola.style.top);
    const keyName = event.key;
    if (keyName == "ArrowRight" && posx < tablero.clientWidth + 300) {
        console.log(posx)
        console.log(tablero.clientWidth)

        checkColisionX(parseInt(bola.style.left), VELOCIDAD);
        if(posx> tablero.clientWidth+290){
            document.getElementById('boton').click();
                        
        }

    }
    if (keyName == "ArrowLeft" && posx > 360) {

        checkColisionX(parseInt(bola.style.left), -VELOCIDAD);

    }
    if (keyName == "ArrowUp" && posy > 50) {

        checkColisionY(parseInt(bola.style.top), -VELOCIDAD);

    }
    if (keyName == "ArrowDown" && posy < 590) {

        checkColisionY(parseInt(bola.style.top), VELOCIDAD);


    }
    if(x >= tablero.clientWidth){
        console.log("hola");
    }
}
);

function checkColisionX(x_bola, x) {
    var choca2 = false;

    estantes.forEach(function (estante) {
        isChocando = collision(bola, estante, x, 0);

        if (isChocando) {
            choca2 = true;
        }
    });


    if (!choca2) {
        x_bola += x;
        bola.style.left = x_bola + "px";

        if (x > 0) {
            bola.style.backgroundImage = "url('img/Derecha.png')";
        }
        else {
            bola.style.backgroundImage = "url('img/Izquierda.png')";
        }
    }

    choca2 = false;
}

function checkColisionY(y_bola, y) {
    var choca2 = false;

    estantes.forEach(function (estante) {
        isChocando = collision(bola, estante, 0, y);

        if (isChocando) {
            choca2 = true;
        }
    });


    if (!choca2) {
        y_bola += y;
        bola.style.top = y_bola + "px";

    }

    choca2 = false;
}

function collision(bola, estante, xMov, yMov) {
    var choca = false;
    var rectPersonaje = bola.getBoundingClientRect();

    var rectEst = estante.getBoundingClientRect();
    var centroBola = rectEst.left;

    var pgLeft = (rectPersonaje.left + xMov);
    var pgTop = (rectPersonaje.top + yMov);


        if ( pgLeft  < (centroBola + rectEst.width) &&
             (pgLeft + rectPersonaje.width) > centroBola &&
             pgTop < (rectEst.top + rectEst.height ) &&
             (pgTop + rectPersonaje.height) > rectEst.top   )
        {
            choca = true;

        }



    return choca;
}

$(document).ready(function () {
    animateDiv();

    var necesarios = 10;
    var puntos = 0;
    var tiempo = 30;

    var enemigo = document.getElementById("enemigo");
    var enemigo2 = document.getElementById("enemigo2");

    document.getElementById("puntos").innerHTML = "Puntos: <b>" + puntos + "/" + necesarios + "</b>";

    /*La animacion de los puntos comienza una vez conseguimos la primera manzana*/
    document.getElementById('player').addEventListener("mouseover", function sumarPuntos() {
        puntos++;
        document.getElementById("puntos").innerHTML = "Puntos: <b>" + puntos + "/" + necesarios + "</b>";
        /*Esto lanzará un numero aleatorio para nuestro ancho*/
        randNum = Math.round(Math.random() * 450);
        /*Esto lanzará un numero aleatorio para nuestro alto*/
        randNum2 = Math.round(Math.random() * 1300);
        /*Posicion random de la altura de nuestro jugador*/
        document.getElementById("player").style.marginTop = randNum + "px";
        /*Posicion random de la anchura de nuestro jugador*/
        document.getElementById("player").style.marginLeft = randNum2 + "px";

        /*Si llegamos a 30 puntos, con lo cual ganamos y nos lanza el siguiente popup*/
        if (puntos == 30) {
            /*Añadiremos una clase al popup para que salte*/
            document.getElementById("popup-1").classList.toggle("active");

            $('#boton1Ganar').css('display', 'inline-block');
            $('#boton2Ganar').css('display', 'inline-block');
            $('#boton3').css('display', 'inline-block');

            document.getElementById("titulo").innerHTML =

                "<h1>¡Has ganado!</h1> <br>";

            document.getElementById("contenido").innerHTML =

                "Puntos conseguidos: <b>" + puntos + "</b><br> Tiempo restante: " + tiempo + " segundos";

            /*Reiniciar la posicion del jugador si perdemos*/
            boton1 = document.getElementById("boton1Ganar").addEventListener("click", function name() {
                location.reload();
            });

            puntos = 0;
            tiempo = 40;
        } else {
            $('#botones-ganar').css('visibility', 'hidden');
        }

    });

    /*Evento por si tocamos al enemigo (perdemos)*/
    enemigo.addEventListener("mouseover", function () {
        /*Añadiremos una clase al popup para que salte*/
        document.getElementById("popup-1").classList.toggle("active");

        $('#boton1Perder').css('display', 'inline-block');
        $('#boton2Perder').css('display', 'inline-block');

        document.getElementById("titulo").innerHTML =

            "<h1>Has perdido...</h1> <br>";

        document.getElementById("contenido").innerHTML =

            "Puntos conseguidos: <b>" + puntos + "</b><br> Tiempo restante: " + tiempo + " segundos";

        /*Reiniciar la posicion del jugador si perdemos*/
        boton1 = document.getElementById("boton1Perder").addEventListener("click", function name() {
            location.reload();
        });

        puntos = 0;
        tiempo = 40;
    });

    /*Evento por si tocamos al enemigo2 (perdemos)*/
    enemigo2.addEventListener("mouseover", function () {
        /*Añadiremos una clase al popup para que salte*/
        document.getElementById("popup-1").classList.toggle("active");

        $('#boton1Perder').css('display', 'inline-block');
        $('#boton2Perder').css('display', 'inline-block');

        document.getElementById("titulo").innerHTML =

            "<h1>Has perdido...</h1> <br>";

        document.getElementById("contenido").innerHTML =

            "Puntos conseguidos: <b>" + puntos + "</b><br> Tiempo restante: " + tiempo + " segundos";

        /*Reiniciar la posicion del jugador si perdemos*/
        boton1 = document.getElementById("boton1Perder").addEventListener("click", function name() {
            location.reload();
        });

        puntos = 0;
        tiempo = 40;
    });

    /*Funcion para restar segundo a segundo nuestro contador*/
    function restarTiempo() {
        tiempo--;
        document.getElementById("tiempo").innerHTML = "&nbsp;&nbsp;&nbsp;Tiempo: " + tiempo;
        if (tiempo == 0) {
            document.getElementById("popup-1").classList.toggle("active");

            $('#boton1Perder').css('display', 'inline-block');
            $('#boton2Perder').css('display', 'inline-block');

            document.getElementById("titulo").innerHTML =

                "<h1>Has perdido...</h1> <br>";

            document.getElementById("contenido").innerHTML =

                "Puntos conseguidos: <b>" + puntos + "</b><br> Tiempo restante: " + tiempo + " segundos";

            /*Reiniciar la posicion del jugador si perdemos*/
            boton1 = document.getElementById("boton1Perder").addEventListener("click", function name() {
                location.reload();
            });

            puntos = 0;
            tiempo = 40;
        }
    }

    /*Posicion del enemigo*/
    function makeNewPosition() {
        var h = $('.weno').height();
        var w = $('.weno').width();

        var nh = Math.floor(Math.random() * h);
        var nw = Math.floor(Math.random() * w);

        return [nh, nw];

    }

    /*Animacion movimiento enemigo*/
    function animateDiv() {
        var newq = makeNewPosition();
        $('#enemigo').animate({ top: newq[0], left: newq[1] }, function () {
            animateDiv();
        });

        $('#enemigo2').animate({ top: newq[0], right: newq[1] }, function () {
            animateDiv();
        });

    };

    /*Cronómetro (1 segundo)*/
    setInterval(restarTiempo, 1000);
});


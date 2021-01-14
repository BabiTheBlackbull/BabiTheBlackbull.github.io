function timpoYcrono(){
	var inter,t;
	//cuenta atrtas juego
	function interval(){
		cont = 1;
		// 2segundos
		t=119;
		//119
		inter=setInterval(function(){
			switch (cont) {
			   case 1:
				document.getElementById("cuentaAtras1").innerHTML=  + t-- + "...";
				cont++;
				break;
			   case 2:
				document.getElementById("cuentaAtras1").innerHTML=  + t-- + "..";
				cont++;
				break;
			   case 3:
				document.getElementById("cuentaAtras1").innerHTML= + t-- + ".";
				cont = 1;
				break;
			}
		},1000,"JavaScript");
	}
	//cuando acabe el tiempo
	function timeout(){
		setTimeout(function(){
			clear();
			document.getElementById("cuentaAtras1").innerHTML="Tiempo acabado";
			
			calcularPuntos();
			pausarMusica();
		},119000,"JavaScript");
		//cuando lleguen a los 2s
		//119000 
	}
	
	//parar el tiempo
	function clear(){
		clearInterval(inter);
	}	
	//llamar a las funciones del tiempo
	interval();
	timeout();
}


function cojer_soltar(soltar, maxImg){
	
		function iniciar(){
			var imagenes = document.querySelectorAll('#cajaimagenes > img');
			// cojemos la lista de imagenes

			imagenes.forEach(imagen => imagen.addEventListener('dragstart',arrastrado,false));
			// recorremos con un forEach la caja de imagenes y llamamos a la funcion dragstar
			// 1.0 dragstar()
			// Este evento es accionado cuando empezamos el arrastre de un elemento;
			// en específico en este evento debemos especificar que es lo que estamos
			// arrastrando y establecer los valores correspondientes mediante el método JavaScript setData;
			// este evento solo es invocado una vez (al seleccionar el elemento).
			// Además en este evento podemos definir un estilo personalizado al elemento 
			// que está siendo arrastrado.

			soltar.addEventListener('dragenter',function(e){e.preventDefault()},false);
			// 1.0 dragenter()
			// Ocurre cuando empezamos a mover un elemento de tipo arrastrable dentro de su contenedor,
			// pero todavía no ha sido soltado; en otras palabras, este evento se dispara cuando el elemento "arrastrable" 
			// entra dentro de la "zona para soltar" -drop zone-.
			// Este evento es ideal para cambiar las reglas de estilo 
			// del contenedor al estar "dentro" del elemento arrastrable.
			// En este evento podemos inspeccionar la data transferida 
			// (dataTransfer) mediante el evento, esta data fue la inicializada mediante 
			// el método setData; además, podemos inspeccionar el tipo de dato devuelto.

			soltar.addEventListener('dragover',function(e){e.preventDefault()},false);
			// 3.0 dragover()
			// Ocurre de manera continuamente cuando un elemento arrastrable se mueve 
			// dentro de su contenedor y solo se deja de ejecutar hasta que soltemos el
			// elemento arrastrable dentro del contenedor o salgamos del mismo; este evento
			// es perfecto para saber cual es la posición del elemento arrastrable dentro del contenedor.
			// Al igual que ocurre con el evento drag, es perfecto para determinar la
			// posición exacta del elemento arrastrable debido a que se invoca repetidamente
			// mientras que el elemento "arrastrable" esté dentro del contenedor; el número 
			// de veces que se invoque este evento depende del navegador.

			soltar.addEventListener('drop',soltado,false);
			// llamamos a la funcion soltado
			// 4.0 drop()
			// Ocurre cuando un elemento arrastrable es soltado 
			// dentro de un contenedor; en este evento debemos recolectar
			// la información del elemento arrastrable mediante el método getData.
			// Los atributos que colocamos en los elementos son: ondragenter,
			// ondragleave, ondragover y ondrop respectivamente.
			
		}

		function arrastrado(e){
			elemento = e.target;
			e.dataTransfer.setData('Text1',elemento.getAttribute('id'));
			e.dataTransfer.setData('Text2',elemento.getAttribute('data-lugar1'));
			e.dataTransfer.setData('Text3',elemento.getAttribute('data-lugar2'));
			e.dataTransfer.setData('Text4',elemento.getAttribute('data-lugar3'));
			
			// .setdata(formato, dato)
			// con este método debemos insertar la información que se desea 
			// guardar desde el elemento arrastrable (drag) y debe tener un 
			// tipo definido aunque debes estar pendiente con el soporte de los navegadores:
		}

		function soltado(e){
			
			// e == el elemento a soltar
			e.preventDefault();
			var id = e.dataTransfer.getData('Text1');
			var data1 = e.dataTransfer.getData('Text2');
			var data2 = e.dataTransfer.getData('Text3');
			var data3 = e.dataTransfer.getData('Text4');
			// cojer los datos los metemos en una variable para la hora de crear el objeto nuevo no se borren
			
			
			var contenido = soltar.innerHTML;
			// cojemos los datos del contenedor 
			
			
			let contador = contarIMGS(contenido);
			// contar las imagenes que hay en el conenedor donde se suelta el objeto
			
			
			// si caben mas elementos entramos si no soltamos un mensaje
			if (contador < maxImg){
				
				var src = document.getElementById(id).src;
				// cojemos la ruta de la imagen a soltar
				
				var idSoltar = soltar.id;
				//cojemos el id del del cajon en el que se va a soltar 
				
				// si el data2 no es nulo entramos para crearlo
				if ( data2 != "null"){
					
					// creamos la imagen dentro del contenedor a soltar
					soltar.innerHTML= "<img data-lugar1='"+ data1 + "' data-lugar2='" + data2 + "' src='" + src + "'width='35px' height='35px' >" + contenido;
					
				
					if( data1 == idSoltar || data2 == idSoltar || data3 == idSoltar){ 
						
						// eliminamos el objeto del contenedor de abajo
						eliminarObjeto(id, idSoltar);
						// en el caso de que se haya soltado en la posicion correcta suenaa un check
						sonidoOk();
						imgOk();
					}else{
						// en el caso de que se haya soltado en la posicion correcta suenaa homer
						eliminarObjeto(id, idSoltar);
						sonidoFallo();
						imgCros();
					}
					
					
					
					
				// si el data3 no es nulo entramos para crearlo
				}else if(data3 != "null"){
					
					soltar.innerHTML= "<img data-lugar1='"+ data1 + "' data-lugar2='" + data2 + "' data-lugar3='" + data3 + "' src='" + src + "'width='35px' height='35px' >" + contenido;
					
					if( data1 == idSoltar || data2 == idSoltar || data3 == idSoltar){ 
						eliminarObjeto(id, idSoltar);
						sonidoOk();
						imgOk();
					}else{
						eliminarObjeto(id, idSoltar);
						sonidoFallo();
						imgCros();
					}
					
					
				// si entramos aqui solo habia un data1
				}else{
	
					soltar.innerHTML= "<img data-lugar1='"+ data1 +"' src='" + src + "'width='35px' height='35px' >" + contenido;
					
					if( data1 == idSoltar || data2 == idSoltar){ 
						eliminarObjeto(id, idSoltar);
						sonidoOk();
						imgOk();
						
					}else{
						eliminarObjeto(id, idSoltar);
						sonidoFallo();
						imgCros();
					}
					
				}
	
	
			}else{
				
				alert("No caben mas elementos");
				
			}
			
		}


	iniciar();
    
}


// eliminamos el objeto del contenedor de abajo
function eliminarObjeto(objeto){
	
	var top = document.getElementById("cajaimagenes");
	// cojemos la caja de imagenes
	var nested = document.getElementById(objeto);
	// cojemos el id del objeto
	var garbage = top.removeChild(nested);
	// eliminamos el objedo del contenedor
	
	var imagenes = document.querySelectorAll('#cajaimagenes > img');
	// recorremos el contenedor de imagens y metomos las imagenes en la variable imagenes
	
	// si ya no quedan mas imagenes seran igual a 0 y finalizaremos el juego
	if (imagenes.length < 1){
		// llamaos a calcular los puntos 
		calcularPuntos();
		// y pausamos la musica
		pausarMusica();
		
	}
	
}





function imgOk(){
	
	img = document.getElementById("imgCheck");
	img.style.display = "block";
	
	var delayInMilliseconds = 2000; //1 second
	setTimeout(function() {
		img = document.getElementById("imgCheck");
		img.style.display = "none";
	}, delayInMilliseconds);
	
	
	setTimeout();
	
}


function imgCros(){
	
	img = document.getElementById("imgCros");
	img.style.display = "block";
	
	var delayInMilliseconds = 2000; //1 second
	setTimeout(function() {
		img = document.getElementById("imgCros");
		img.style.display = "none";
	}, delayInMilliseconds);
	
	setTimeout();
	
}




// Funciones de reproducir sonidos
function sonidoOk(){
	var sonidoOK = document.getElementById("sonidoOK");
	sonidoOK.currentTime = 0;
	sonidoOK.play();
	sonidoOK.volume = 0.70;
	
}	
function sonidoFallo(){
	var sonidoOK = document.getElementById("sonidoFallo");
	sonidoOK.currentTime = 0;
	sonidoOK.play();
	sonidoOK.volume = 0.70;
}	
function sonidoPerdido(){
	var sonidoOK = document.getElementById("sonidoPerdido");
	sonidoOK.play();
	sonidoOK.volume = 0.70;

	var inputNombre = document.getElementById("infoGanador");
    inputNombre.value = "PERDEDOR";

}	
function sonidoGanador(){
	var sonidoOK = document.getElementById("sonidoGanador");
	sonidoOK.play();
	sonidoOK.volume = 0.70;

	var inputNombre = document.getElementById("infoGanador");
    inputNombre.value = "GANADOR";

}	
function sonidoSegundo(){
	var sonidoOK = document.getElementById("sonidoSegundo");
	sonidoOK.play();
	sonidoOK.volume = 0.70;

	var inputNombre = document.getElementById("infoGanador");
    inputNombre.value = "GANADOR";
}	


function calcularPuntos(){

	// iniciamos con puntos a 0
	var puntos = 0;
	
	//recoremos todos los departamentos para actualizar los puntos
	puntos = calculoPuntos2("#cajonEstanteria", puntos);
	puntos = calculoPuntos2("#cajaSoltarNevera1", puntos);
	puntos = calculoPuntos2("#cajaSoltarNevera2", puntos);
	puntos = calculoPuntos2("#cajaSoltarNevera3", puntos);
	puntos = calculoPuntos2("#cajaSoltarCongelador1", puntos);
	puntos = calculoPuntos2("#cajaSoltarCongelador2", puntos);
	puntos = calculoPuntos2("#puertanevera1", puntos);
	puntos = calculoPuntos2("#puertanevera2", puntos);
	puntos = calculoPuntos2("#puertanevera3", puntos);
	puntos = calculoPuntos2("#cajaSoltarFruta", puntos);
	
	
	//ponemos los puntos en la pantalla final
	puntosHTML = document.getElementById("puntos");
	puntosHTML.innerHTML = puntos + "/300";	
	
	// eliminamos todo el juego y solo visualizamos la pantalla final
	juegoPadre = document.getElementById("bodyJuego");
	juegoPadre.removeChild(document.getElementById("juego"));
	resumen = document.getElementById("resumen");
	resumen.style.visibility = "visible";
	
	
	// ponemos una imagen final depende de los puntos que haya echo
	imgFinal = document.getElementById("imagenFinal");
	if (puntos < 210){
		imgFinal.src="media/game-over.png";
		sonidoPerdido();
	}else if(puntos < 260){
		imgFinal.src="media/medalla.png";
		sonidoSegundo();
	}else{
		imgFinal.src="media/medalla-de-oro.png";
		sonidoGanador();
	}
}


function calculoPuntos2(idAlmacen, puntos){
	
	var imagenesAlmacen = document.querySelectorAll( idAlmacen + ' > img');
	//guardamos todas las imagenes de el almacen en imagenesAlmacen
	imagenesAlmacen.forEach(	imagenen => puntos = calculoPuntos3(imagenen, idAlmacen, puntos) );
	// con un foreach las recorremos todas y rellenamos los puntoos
	return puntos;
}

function calculoPuntos3(img, id ,puntos){
	// quitamos el # del id 
	var separarBirg = id.split('#');
	// y comparamos haber si esta en la posicion correcta 
	if( img.dataset.lugar1 == separarBirg[1] || img.dataset.lugar2 == separarBirg[1] || img.dataset.lugar3 == separarBirg[1]){ 
		puntos = puntos + 10;
	}
	
	// devolvemos todos los puntos
	return puntos;
}


//contar el numero de imagenes en un contenedor
function contarIMGS(cont){

	let contador = 0;
	var buscar= 'width="35px"';
	// busco algo que va a estar igual en todas las imagenes de dentro de los contenedores
	
	var array = cont.split(" ");
	for (var i=0; i < array.length; i++) {	
		if (array[i] == buscar){
			contador++;
		}
	}
	// devuelvo el numero de veces que aparece una img
	return contador;
}


function reproducirMusica(){
	
	// reproducir musica 
	var musica = document.getElementById("musica");
	musica.play();
	musica.volume = 1.00;
	
	// iniciamos el contador del tiempo y el crono
	timpoYcrono();
	// hacemos invisible la pantalla de inicio
	inicio = document.getElementById("inicio");
	inicio.style.visibility = "hidden";
	inicio.style.height= "0px";
	inicio.style.width= "0px";
	// hacemos visible el juego
	juego = document.getElementById("juego");
	juego.style.visibility = "visible";

}

function pausarMusica(){
	//pausamos la musica
	var musica = document.getElementById("musica");
	musica.pause();
}


function lanzadera(){
    //enviamos todos los contenedores, con su numero maximo de elemenntos que caben al la funcion cojer_soltar
	cojer_soltar(document.getElementById("cajaSoltarNevera1"), 		4);
	cojer_soltar(document.getElementById("cajaSoltarNevera2"),		4);
	cojer_soltar(document.getElementById("cajaSoltarNevera3"),		4);
	cojer_soltar(document.getElementById("cajaSoltarFruta"),		2);
	cojer_soltar(document.getElementById("cajaSoltarCongelador1"),	4);
	cojer_soltar(document.getElementById("cajaSoltarCongelador2"),	4);
	cojer_soltar(document.getElementById("puertanevera1"),			3);
	cojer_soltar(document.getElementById("puertanevera2"),			2);
	cojer_soltar(document.getElementById("puertanevera3"),			4);
	cojer_soltar(document.getElementById("cajonEstanteria"),		3);
}

window.onload = lanzadera; 












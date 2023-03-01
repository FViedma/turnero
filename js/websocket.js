agregarEvento(window, 'load', iniciarWebsocket, false);

var imgStatus = null;

var tono = null;

function iniciarWebsocket(){

	imgStatus = document.getElementById('imgStatus');

	socket = new WebSocket("ws://127.0.0.1:8888");

	socket.addEventListener('open', abierto, false);
	socket.addEventListener('message', recibido, false);
	socket.addEventListener('close', cerrado, false);
	socket.addEventListener('error', errores, false);

	tono = document.getElementById('tono');

}

function abierto(){

	if(imgStatus != null){

		imgStatus.src = "img/conectado.png";

	}

}

function recibido(e){

	var jsonData = JSON.parse(e.data);//decodificar el objeto json
	var turno = document.getElementById('verTurno');
	var caja = document.getElementById('verCaja');
	
	//si turno biene en 000 o undefined siginfica que no hay nuevos turnos
	if(jsonData.turno != 'A-000' && jsonData.turno != undefined){
	
		if(turno != null && caja != null){

			turno.innerHTML = jsonData.turno;
			caja.innerHTML = jsonData.idCaja;
	
			mostrarTurnos(jsonData.turno, jsonData.idCaja);
	
		}

	}

}

function cerrado(){

	if(imgStatus != null){

		imgStatus.src="img/desconectado.png";	
	
	}
	

}

function errores(){

	if(imgStatus != null){
		
		imgStatus.src="img/error.png";
			
	}
	

}

var tr = "";

var turno = [];

var caja = [];

function mostrarTurnos(noTurno = '', noCaja = ''){

	var insertar = true;

	for(var i = 0; i < turno.length; i++){

		if(turno[i] == noTurno){

			insertar = false;	

		}

	}
	
	//quitar el ultimo turno para que siempre haya 10
	if(turno.length == 10 && caja.length == 10){
	
		caja.pop();
	
		turno.pop();
	
	}
	
	//dejar el array como estaba
	turno = turno.reverse();
	
	caja = caja.reverse();
	
	if(insertar){		
	
		turno.push(noTurno);
	
		caja.push(noCaja);
	
	}
	
	//invertir el array
	turno = turno.reverse();
	
	caja = caja.reverse();
	
	var th = "<tr><th>Turno</th><th colspan='2'>Caja</th></tr>";
	
	for(var i = 0; i < turno.length; i++){	
	
		if(i == 0){
	
			tr = "<tr><td><span  class='primer-fila'>"+turno[i]+"</span></td><td class='td-caja'><span class='caja primer-fila'>Caja</span></td><td class='no-caja'><span  class='primer-fila'>"+caja[i]+"</span></td></tr>".toString();
	
		}else{
	
			tr = tr+"<tr><td>"+turno[i]+"</td><td class='td-caja'><span class='caja'>Caja</span></td><td class='no-caja'>"+caja[i]+"</td></tr>".toString();
	
		}
	
	}
	
	var tablaTurnos = document.getElementById('tabla-turnos');
	
	tablaTurnos.innerHTML = th + tr;//imprimir los turnos que han pasado y el turno que esta siendo atendido 
	
	tono.play();

}
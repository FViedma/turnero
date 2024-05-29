agregarEvento(window, 'load', iniciarWebsocket, false);

var imgStatus = null;

var tono = null;

function iniciarWebsocket() {

	imgStatus = document.getElementById('imgStatus');

	socket = new WebSocket("ws://127.0.0.1:8888");

	socket.addEventListener('open', abierto, false);
	socket.addEventListener('message', recibido, false);
	socket.addEventListener('close', cerrado, false);
	socket.addEventListener('error', errores, false);

	tono = document.getElementById('tono');

}

function abierto() {

	if (imgStatus != null) {

		imgStatus.src = "img/conectado.png";

	}

}

function recibido(e) {

	var jsonData = JSON.parse(e.data);//decodificar el objeto json
	var tipo = document.getElementById('verTipo');
	var turno = document.getElementById('verTurno');
	var caja = document.getElementById('verCaja');

	var tipoAtencionR = "";
	//si turno viene en 000 o undefined siginfica que no hay nuevos turnos
	if (jsonData.turno != '000' && jsonData.turno != undefined) {

		if (tipo != null && turno != null && caja != null) {
			switch (jsonData.tipoAtencion) {
				case "fichas":
					tipoAtencionR = "F";
					break;
				case "general":
					tipoAtencionR = "G";
					break;
				case "adultoMayor":
					tipoAtencionR = "Am";
					break;
				case "discapacidad":
					tipoAtencionR = "D";
					break;
			}
			tipo.innerHTML = tipoAtencionR;
			turno.innerHTML = jsonData.turno;
			caja.innerHTML = jsonData.idCaja;

			mostrarTurnos(tipoAtencionR, jsonData.turno, jsonData.idCaja);

		}

	}

}

function cerrado() {

	if (imgStatus != null) {

		imgStatus.src = "img/desconectado.png";

	}


}

function errores() {

	if (imgStatus != null) {

		imgStatus.src = "img/error.png";

	}


}

var tr = "";

var tipo = [];

var turno = [];

var caja = [];

function mostrarTurnos(noTipoAtencion = '', noTurno = '', noCaja = '') {
	var insertar = true;

	// Este for verifica que no exista el número de turno en la lista de turnos llamados
	// for (var i = 0; i < turno.length; i++) {

	// 	if (turno[i] == noTurno) {

	// 		insertar = false;

	// 	}

	// }

	//quitar el ultimo turno para que siempre haya 10
	if (turno.length == 10 && caja.length == 10) {

		tipo.pop();

		caja.pop();

		turno.pop();

	}

	//dejar el array como estaba
	tipo = tipo.reverse();

	turno = turno.reverse();

	caja = caja.reverse();

	if (insertar) {

		tipo.push(noTipoAtencion);

		turno.push(noTurno);

		caja.push(noCaja);

	}

	//invertir el array
	tipo = tipo.reverse();

	turno = turno.reverse();

	caja = caja.reverse();

	var th = "<tr><th>Tipo</th><th>Turno</th><th colspan='2'>Adm</th></tr>";

	for (var i = 0; i < turno.length; i++) {
		if (i == 0) {

			tr = "<tr><td><span class='primer-fila'>" + tipo[i] + "</span></td><td><span  class='primer-fila'>" + turno[i] + "</span></td><td class='td-caja'><span class='caja primer-fila'>Adm</span></td><td class='no-caja'><span  class='primer-fila'>" + caja[i] + "</span></td></tr>".toString();

		} else {

			tr = tr + "<tr><td><span class='primer-fila'>" + tipo[i] + "</span></td><td>" + turno[i] + "</td><td class='td-caja'><span class='caja'>Adm</span></td><td class='no-caja'>" + caja[i] + "</td></tr>".toString();

		}

	}

	var tablaTurnos = document.getElementById('tabla-turnos');

	tablaTurnos.innerHTML = th + tr;//imprimir los turnos que han pasado y el turno que esta siendo atendido 

	tono.play();

}
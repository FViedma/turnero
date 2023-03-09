agregarEvento(window, 'load', iniciar, false);

function iniciar() {

	var atender = document.getElementById('atender');
	var atenderAm = document.getElementById('atenderAm');
	agregarEvento(atender, 'click', detectarAccion, false);
	agregarEvento(atenderAm, 'click', detectarAccion, false);

}

var jsonFormat = '';

function detectarAccion(e) {

	var id = "";

	var result = "";

	if (e) {

		e.preventDefault();

		id = e.target.id;

	}

	switch (id) {
		case 'atender':
			result = configurarAtencion("general");
			break;
		case 'atenderAm':
			result = configurarAtencion("adultoMayor");
			break;
	}
	funcion = procesarAtencion;
	var data = result.split('||');
	conectarViaPost(funcion, data['0'], data['1']);

}

function configurarAtencion(tipoAtencion) {
	var turno = "";
	switch (tipoAtencion) {
		case "general":
			var turno = document.getElementById('noTurno').value;
			break;

		case "adultoMayor":
			var turno = document.getElementById('noTurnoAm').value;
			break;
	}
	var ocupado1 = document.getElementById('ocupado').value;//se usa para saber si se esta atendiendo o no un turno
	var idCaja = document.getElementById('idCaja').value;

	fichero = 'consultas/registrar.php';

	var datos = 'registrar=atencion' + '&ocupado=' + encodeURIComponent(ocupado) + '&idCaja=' + encodeURIComponent(idCaja) + '&turno=' + encodeURIComponent(turno) + '&tipoatencion=' + encodeURIComponent(tipoAtencion);

	jsonFormat = {
		"registrar": "ocupado",
		"ocupado": +ocupado,
		"idcaja": +idCaja,
		"turno": +turno,
		"tipoatencion": +tipoAtencion,
	};

	return fichero + "||" + datos;
}

function procesarAtencion() {

	if (conexion.readyState == 4) {
		var data = conexion.responseText;
		//enviar los datos recibidos mediante ajax en formato json  al socket
		socket.send(data);

		var jsonData = JSON.parse(data);//decodificar los datos en formato json

		switch (jsonData.tipoAtencion) {
			case "general":
				var turno = document.getElementById('turno');//turno que se muestra en la pantalla
				var noTurno = document.getElementById('noTurno');//control input noTurno
				break;
			case "adultoMayor":
				var turno = document.getElementById('turnoAm');//turno que se muestra en la pantalla
				var noTurno = document.getElementById('noTurnoAm');//control input noTurno
				break;
		}
		turno.innerHTML = jsonData.turno;
		noTurno.value = jsonData.turno;

		var mensajesG = document.getElementById('mensajesG');
		var mensajesAm = document.getElementById('mensajesAm');

		//poner mensajes de error o de aviso
		switch (jsonData.tipoAtencion) {
			case "general":
				if (jsonData.status == 'error' || jsonData.status == 'mensaje') {
					mensajesG.innerHTML = jsonData.mensaje;
				} else {
					mensajesG.innerHTML = "";
				}
				break;
			case "adultoMayor":
				if (jsonData.status == 'error' || jsonData.status == 'mensaje') {
					mensajesAm.innerHTML = jsonData.mensaje;
				} else {
					mensajesAm.innerHTML = "";
				}
				break;

		}


	}

}
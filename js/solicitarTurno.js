agregarEvento(window, 'load', iniciar, false);

function iniciar() {

	var Fichas = document.getElementById('Fichas');

	var General = document.getElementById('General');

	var Adulto_Mayor = document.getElementById('Adulto_Mayor');

	var Discapacidad = document.getElementById('Discapacidad');

	agregarEvento(Fichas, 'click', detectarAccion, false);

	agregarEvento(General, 'click', detectarAccion, false);

	agregarEvento(Adulto_Mayor, 'click', detectarAccion, false);

	agregarEvento(Discapacidad, 'click', detectarAccion, false);

}

function detectarAccion(e) {

	var id = "";

	if (e) {

		id = e.target.id;

	}
	
	switch (id) {
		
		case 'Fichas':
			
			funcion = procesarSolicitud;
			fichero = 'consultas/registrar.php';
			datos = 'registrar=fichas';

			break;

		case 'General':
			
			funcion = procesarSolicitud;
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turno';

			break;

		case 'Adulto_Mayor':

			funcion = procesarSolicitud;
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turnoAdulto';

			break;

		case 'Discapacidad':

			funcion = procesarSolicitud;
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turnoDiscapacidad';
			break;
		default:

			console.log('Opcion no reconocida');

			break;
	}
	conectarViaPost(funcion, fichero, datos);

}

function procesarSolicitud() {
	if (conexion.readyState) {
		var jsonData = JSON.parse(conexion.responseText);
		var noFichas = document.getElementById('fichas');
		var noTurno = document.getElementById('turno');
		var noTurnoA = document.getElementById('turnoA');
		var noTurnoD = document.getElementById('turnoD');
		var tipoAtencion = jsonData.tipoAtencion;
		switch (tipoAtencion) {
			case "fichas":
				noFichas.innerHTML = jsonData.turno;
				break;
			case "general":
				noTurno.innerHTML = jsonData.turno;
				break;
			case "adultoMayor":
				noTurnoA.innerHTML = jsonData.turno;
				break;
			case "discapacidad":
				noTurnoD.innerHTML = jsonData.turno;
				break;
		}
	}

}

agregarEvento(window, 'load', iniciar, false);

function iniciar() {

	var General = document.getElementById('General');

	var Adulto_Mayor = document.getElementById('Adulto_Mayor');

	var Discapacidad = document.getElementById('Discapacidad');

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

		case 'General':

			funcion = procesarSolicitud("General");
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turno';

			break;

		case 'Adulto_Mayor':

			funcion = procesarSolicitud("Adulto");
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turnoAdulto';

			break;

		case 'Discapacidad':

			funcion = procesarSolicitud("Discapacidad");
			fichero = 'consultas/registrar.php';
			datos = 'registrar=turnoDiscapacidad';

			break;
		default:

			console.log('Opcion no reconocida');

			break;

	}

	conectarViaPost(funcion, fichero, datos);

}

function procesarSolicitud(TipoPaciente) {

	if (conexion.readyState) {
		switch (TipoPaciente) {
			case "General":
				
				var jsonData = JSON.parse(conexion.responseText);
				var noturno = document.getElementById('turno');

				noturno.innerHTML = jsonData.turno;

				break;
			case "Adulto":
				
				var jsonData = JSON.parse(conexion.responseText);
				var noturno = document.getElementById('turnoAM');

				noturno.innerHTML = jsonData.turno;
				break;
			case "Discapacidad":
				
				var jsonData = JSON.parse(conexion.responseText);
				var noturno = document.getElementById('turnoDiscapacidad');

				noturno.innerHTML = jsonData.turno;
				break;
		}

	}

}

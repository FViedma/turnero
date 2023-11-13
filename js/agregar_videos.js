agregarEvento(window, 'load', iniciar, false);

var info = '';

var formEditar = '';

function iniciar(){

	info = document.getElementById('info-video');//div con informacion de los videos
	
	var videoInfo = document.getElementById('videoInfo');//boton para abrir el formualrio para editar videos
	
	formEditar = document.getElementById('form-cambiar-video');//formualrio para editar videos
	
	var cerrar = document.getElementById('cerrarCambioVideo');//boton para cerrar le formulario
	
	agregarEvento(videoInfo, 'click', abrirForm, false);
	agregarEvento(cerrar, 'click', abrirForm, false);

}

function abrirForm(e){

	e.preventDefault();

	id = e.target.id;
	
	var displayInfo = '';
	var displayForm = '';

	switch(id){

		case'videoInfo':

			displayInfo = 'none';
			displayForm = 'block';			

		break;
		case'cerrarCambioVideo':

			displayInfo = 'block';
			displayForm = 'none';		

		break;
		default:

			console.log('Error');

		break;

	}

	info.style.display = displayInfo;

	formEditar.style.display = displayForm;

}

//function edit($nombre,$extension){
//    $sql="update". tblname;
//}

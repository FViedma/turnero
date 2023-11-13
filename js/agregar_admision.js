agregarEvento(window, 'load', iniciar, false);

var info = '';

var formEditar = '';

function iniciar(){

	info = document.getElementById('info-admision');//div con informacion de las admisiones
	
	var admisionInfo = document.getElementById('admisionInfo');//boton para abrir el formualrio para editar admisiones
	
	formEditar = document.getElementById('form-cambiar-admision');//formualrio para editar datos de admisiones
	
	var cerrar = document.getElementById('cerrarCambioAdmision');//boton para cerrar le formulario
	
	agregarEvento(admisionInfo, 'click', abrirForm, false);
	agregarEvento(cerrar, 'click', abrirForm, false);

}

function abrirForm(e){

	e.preventDefault();

	id = e.target.id;
	
	var displayInfo = '';
	var displayForm = '';

	switch(id){

		case'admisionInfo':

			displayInfo = 'none';
			displayForm = 'block';			

		break;
		case'cerrarCambioAdmision':

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

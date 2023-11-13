agregarEvento(window, 'load', iniciar, false);

var info = '';

var formEditar = '';

function iniciar(){

	info = document.getElementById('info-usuario');//div con informacion de los usuarios
	
	var usuarioInfo = document.getElementById('usuarioInfo');//boton para abrir el formualrio para editar usuarios
	
	formEditar = document.getElementById('form-cambiar-usuario');//formualrio para editar datos de usuarios
	
	var cerrar = document.getElementById('cerrarCambioUsuario');//boton para cerrar le formulario
	
	agregarEvento(usuarioInfo, 'click', abrirForm, false);
	agregarEvento(cerrar, 'click', abrirForm, false);

}

function abrirForm(e){

	e.preventDefault();

	id = e.target.id;
	
	var displayInfo = '';
	var displayForm = '';

	switch(id){

		case'usuarioInfo':

			displayInfo = 'none';
			displayForm = 'block';			

		break;
		case'cerrarCambioUsuario':

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

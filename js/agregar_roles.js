agregarEvento(window, 'load', iniciar, false);

var info = '';

var formEditar = '';

function iniciar(){

	info = document.getElementById('info-roles');//div con informacion de los usuarios
	
	var rolesInfo = document.getElementById('rolesInfo');//boton para abrir el formualrio para editar usuarios
	
	formEditar = document.getElementById('form-cambiar-roles');//formualrio para editar datos
	
	var cerrar = document.getElementById('cerrarCambioRoles');//boton para cerrar le formulario
	
	agregarEvento(rolesInfo, 'click', abrirForm, false);
	agregarEvento(cerrar, 'click', abrirForm, false);

}

function abrirForm(e){

	e.preventDefault();

	id = e.target.id;
	
	var displayInfo = '';
	var displayForm = '';

	switch(id){

		case'rolesInfo':

			displayInfo = 'none';
			displayForm = 'block';			

		break;
		case'cerrarCambioRoles':

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

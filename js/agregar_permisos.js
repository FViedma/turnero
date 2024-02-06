agregarEvento(window, 'load', iniciar, false);

var info = '';

var formEditar = '';

function iniciar(){

	info = document.getElementById('info-permiso');//div con informacion de los permisos
	
	var permisoInfo = document.getElementById('permisoInfo');//boton para abrir el formualrio para editar permiso
	
	formEditar = document.getElementById('form-cambiar-permiso');//formualrio para editar datos de permiso
	
	var cerrar = document.getElementById('cerrarCambioPermiso');//boton para cerrar el formulario
	
	agregarEvento(permisoInfo, 'click', abrirForm, false);
	agregarEvento(cerrar, 'click', abrirForm, false);

}

function abrirForm(e){

	e.preventDefault();

	id = e.target.id;
	
	var displayInfo = '';
	var displayForm = '';

	switch(id){

		case'permisoInfo':

			displayInfo = 'none';
			displayForm = 'block';			

		break;
		case'cerrarCambioPermiso':

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

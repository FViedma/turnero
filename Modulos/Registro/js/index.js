$(document).ready(function() {
  $('#add_new_task').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $("#nombre").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (nombre == "") {
            alertify.error('Debe Introducir un Nombre');
            $("input").focus();
            return false;
        }

        //Obtenemos el valor del campo apellidos
      //  var apellidos = $(".apellidos").val();
        //Validamos el campo Apellidos, simplemente miramos que no esté vacío
     //   if (apellidos == "") {
     //       alertify.error('Debe Introducir un Apellido');
     //       $("input").focus();
     //       return false;
     //   }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_conte").serialize();

        $.ajax({
            type: "POST",
            url: "php/insert.php",
            data: obtener,
            success: function() {
                alertify.success('Tus datos han sido insertados correctamente!'); //Mensaje de Datos Correctamente Insertados
            //    $('#tabla_ajax').load("php/tabla.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
				$("#nombre").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready
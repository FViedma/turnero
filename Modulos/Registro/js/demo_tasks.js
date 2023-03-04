$(function(){
    
    var tasks = function(){
        
        $("#add_new_task").on("click",function(){
            var nt = $("#nombre").val();
            if(nt != ''){
                
                var task = '<div class="task-item task-primary">'
                                +'<div class="task-text">'+nt+'</div>'
                                +'<div class="task-footer">'
                                    +'<div class="pull-left"><span class="fa fa-clock-o"></span> now</div>'
                                +'</div>'
                            +'</div>';
                    
                $("#tasks").prepend(task);
            }            
        });
		//Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
    /*    var obtener = $("#form_conte").serialize();
		$.ajax({
            type: "POST",
            url: "php/insert.php",
            data: obtener,
            success: function() {
                alertify.success('Tus datos han sido insertados correctamente!'); //Mensaje de Datos Correctamente Insertados
           //     $('#tabla_ajax').load("php/tabla.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
           //     $(".nombre, .apellidos").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
    */    
        $("#tasks,#tasks_progreess,#tasks_completed").sortable({
            items: "> .task-item",
            connectWith: "#tasks_progreess,#tasks_completed",
            handle: ".task-text",
			//opacity: 0.8, 
			//cursor: 'move',
            update: function(event, ui) {
			//	 update: function (event, ui) {
				var data = $(this).sortable('serialize');
				$.ajax({
					data: data,
					type: 'POST',
					url: 'nuevoOrden.php'
				});
    //}
				  
				
	/*			$.ajax({
                type: "POST",
                url: "../classe/sort.php",
                data:{  
                    sort1:$("#sortable1").sortable('serialize'),
                    sort2:$("#sortable2").sortable('serialize'),
                    sort3:$("#sortable3").sortable('serialize'),
                    sort4:$("#sortable4").sortable('serialize')
                },
                success: function(html) {
                    
                    $('.success').show().fadeOut(2100);
//                    $('.kanban').toggleText(1000);
                },
                error:function(){
                      alert('erro');
                }
                
            });*/
				
				
                if(this.id == "tasks_completed"){
                    ui.item.addClass("task-complete").find(".task-footer > .pull-right").remove();
                }
                if(this.id == "tasks_progreess"){
                    ui.item.find(".task-footer").append('<div class="pull-right"><span class="fa fa-play"></span> 00:00</div>');
                }    
			//	var order = $(this).sortable('toArray');
			//	jQuery(document).load("sort.php?ids="+order); 
            //    page_content_onresize();
				
            }

			// update : function () 
			//  { 
			//		var order = $(this).sortable('toArray');
			//		jQuery(document).load("sort.php?ids="+order); 
			//		jQuery(".form-message").show();
			//		jQuery(".form-message").fadeOut(3000);
			//  }
        }).disableSelection();
        
    }();
    
});

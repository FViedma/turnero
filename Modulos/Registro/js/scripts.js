 $(document).ready(function(){
        $('#calendar').fullCalendar({
        header: {
           left: 'title',
           center: 'agendaDay,agendaWeek,month',
           right: 'prev,next today'
        },
        editable: true,
        firstDay: 1,
        selectable: true,
        defaultView: 'month',
        eventSources: [
            {
                url: '<?= base_url() ?>calendar/get_alerta',
            },
            {
                url: '<?= base_url() ?>calendar/get_ventas', 
            },
            {
                url: '<?= base_url() ?>calendar/get_compras',
            }
          ],
          eventRender: function(event, element, view){
            if (event.customRender == true)
            {
              var el = element.html();
              element.html("<div style='width:90%;float:left;'>" + el + "</div><div style='text-align:right;' class='cerrar'><span class='glyphicon glyphicon-trash'></span></div>");
                
              element.find('.cerrar').click(function(){
                  if(!confirm("Desea eliminar el evento?")){
                      return false;
                  }else{
                      var id = event.id;
                      $.post('<?= base_url() ?>calendar/delete_alerta',
                      {
                          id:id
                      },
                      function(data){
                          if(data == 1)
                              alert('se elimino el evento');
                          else
                              alert('error al eliminar');
                      });
                    $("#calendar").fullCalendar('removeEvents', event.id);
                  }         
              });
            }           
          }   
        });   
    });
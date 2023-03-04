  $(document).ready(function(){
$('#calendar').fullCalendar({   
          editable: true,
          header: {
              left: 'prev,next',
              center: 'title'
              right: 'month,agendaWeek,agendaDay'
          },
          defaultView: 'agendaWeek',      
          height: 600,
          slotMinutes: 30,
          minTime : 8,
          maxTime : 21,
          firstDay : 1,
          allDaySlot : false,
          columnFormat:'ddd d/M',       
           titleFormat : "MMM d[ yyyy]{ '&#8212;'[MMM] dd 'del' yyyy}",
          weekends: false,
          defaultEventMinutes : 30,        
          buttonText: {prev: '&nbsp;&#9668;&nbsp;',
		next: '&nbsp;&#9658;&nbsp;',
		prevYear: '&nbsp;&lt;&lt;&nbsp;',
		nextYear: '&nbsp;&gt;&gt;&nbsp;',
                today : 'Hoy'},
 
          unselectAuto: false,
          weekMode : false,
          monthNamesShort : ['Enero' , 'Febrero' , 'Marzo' , 'Abril' , 'Mayo' , 'Junio' , 'Julio' ,
                        'Agosto' , 'Septiembre' , 'Octubre' , 'Noviembre' , 'Diciembre' ],
          dayNamesShort : ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
 
 
  // Este pequeño array nos va a permitir visualizar los eventos
          events:[
 
            <% for turno in @turnos = Turno.all   -%>
              {
               id : 'turno: <%= turno.id.to_s %>',
               title  : 'Profesional: <%= turno.profesional.nombre %> Duracion: <%= turno.duracion %>minutos Paciente: <%= turno.paciente.nombre  %> ' ,
               start : 'Fecha: <%= turno.fecha_hora.iso8601 %>',
               end : 'Duracion: <%= (turno.fecha_hora + (60 * turno.duracion)) %>',
               allDay : false,
               url: '<%= eliminar_turno_path(turno) %>'
 
              },
 
            <% end %>           
 
              ],
 
          timeFormat: 'h:mm t{ - h:mm t} ',
          dragOpacity: "0.5",
 
 
 
          eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc){
              if (confirm("Are you sure about this change?")) {
                  moveEvent(event, dayDelta, minuteDelta, allDay);
              }
              else {
                revertFunc();
              }
          },
 
          eventResize: function(event, dayDelta, minuteDelta, revertFunc){
              if (confirm("Are you sure about this change?")) {
                  resizeEvent(event, dayDelta, minuteDelta);
              }
              else {
                 revertFunc();
              }
          },        
 
 
// En este caso, al hacer click sobre el evento, me llevara a la url especificada para ese evento (se muestra mas arriba)
 
 eventClick: function(event, jsEvent){
             if (event.url) {
              if (confirm('Esta seguro de eliminar? Esta accion no se podra deshacer')){
                event.url;
              //return false;
              }else{
                return false;
              }
 
        }
          }
}
$(document).ready(function() { 
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
    //configure options for the calendar
       header: {
          left: 'prev,next today',
          center: 'title',
          right: 'agendaWeek,agendaDay'
       },
       events: {
        url: 'reservas.php',
        allDay: false
    },
    buttonText:{
         today:    'Hoy',
    month:    'Mes',
    week:     'Semana',
    day:      'Dia'
    },
       editable: false,
       defaultView: 'agendaWeek',
       allDaySlot:false,
       titleFormat: 'MMMM',
          axisFormat: 'HH:mm',
   timeFormat: 'HH:mm{ - HH:mm}',
    slotDuration: '00:60:00',
    slotEventOverlap: false,
     columnFormat: {
                   // Monday, Wednesday, etc
                week: 'ddd D',
                day: 'dddd D' // Monday 9/7
            },
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
    minTime: "09:00"
    
    
    });
}); 
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


       events: "/reservas.php",
       editable: true,
       defaultView: 'agendaWeek',
       allDayDefault: false,

    });
});
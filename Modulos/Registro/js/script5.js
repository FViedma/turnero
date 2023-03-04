$('#calendar').fullCalendar({
    events: [
        {
            title:  'My Event',
            start:  '2010-01-01T14:30:00',
            allDay: false
        }
        // other events here...
    ],
    timeFormat: 'H(:mm)' // uppercase H for 24-hour clock
});
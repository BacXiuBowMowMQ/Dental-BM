var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function() {
    calendar = new Calendar(document.getElementById('calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        selectable: true,
        themeSystem: 'bootstrap',
        // Sử dụng dữ liệu lịch từ biến scheds
        events: scheds,
        eventClick: function(info) {
            var _details = $('#event-details-modal');
            var id = info.event.id;
            var eventDetails = scheds.find(event => event.id === id);
            if (eventDetails) {
                _details.find('#title').text(eventDetails.title);
                _details.find('#description').text(eventDetails.description);
                _details.find('#start').text(eventDetails.start);
                _details.find('#end').text(eventDetails.end);
                _details.find('#edit,#delete').attr('data-id', id);
                _details.modal('show');
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: true
    });

    calendar.render();

    // Các hàm xử lý khác
});
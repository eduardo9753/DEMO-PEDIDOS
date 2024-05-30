document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events

        //seteo de hora
        eventTimeFormat: { // like '14:30:00'
            hour: 'numeric', //2-digit
            minute: '2-digit',
            second: '2-digit',
            meridiem: false
        },

        //PARA REGISTRAR UN EVENTO(RESERVACION) EN EL MODAL
        dateClick: function (info) {
            $('#reservationModal').modal('show');

            // Obtener la fecha y la hora del clic
            var clickedDate = info.date;
            var dateStr = moment(clickedDate).format('YYYY-MM-DDTHH:mm'); // Formato correcto para datetime-local

            // Asignar la fecha y la hora a los campos del modal
            $('#start').val(dateStr);
            $('#end').val(dateStr);
        },

        //PARA DAR CLICK AL EVENTO Y ACTUALIZAR LOS DATOS DE LA RESERVA EN EL MODAL
        eventClick: function (info) {
            let eventCalendar = info.event;  // Objeto de evento de FullCalendar
            let eventComun = info.event.extendedProps; // Propiedades adicionales del evento

            // Acceder a los datos del evento
            let id = eventCalendar.id;        // ID del evento
            let title = eventCalendar.title;
            let start = moment(eventCalendar.start).format('YYYY-MM-DDTHH:mm'); // Formato correcto para datetime-local
            let end = eventCalendar.end ? moment(eventCalendar.end).format('YYYY-MM-DDTHH:mm') : start; // Usar start si end es null

            // Acceder a los datos extendidos del evento (campos personalizados)
            let customerName = eventComun.customer_name;
            let numberPhone = eventComun.number_phone;
            let numberOfSeats = eventComun.number_of_seats;
            let tableId = eventComun.table_id;
            let userId = eventComun.user_id;

            // Mostrar los datos en los campos del formulario del modal
            $('#id_reservation').val(id);
            $('#id_reservation_delete').val(id); //tambien le asignamos el id al input id del form para eliminar
            $('#title_up').val(title);
            $('#customer_name_up').val(customerName);
            $('#number_phone_up').val(numberPhone);
            $('#number_of_seats_up').val(numberOfSeats);

            // Asignar las fechas a los inputs de tipo datetime-local
            $('#start_up').val(start);
            $('#end_up').val(end);

            // Mostrar el modal
            $('#reservation-update-Modal').modal('show');

           //alert("Fecha inicio: " + start + ", Fecha fin: " + end);
        },

        /*events: [
            {
                title: 'Colegio Peru Holanda',
                start: '2024-05-01'
            },
            {
                title: 'Long Event',
                start: '2024-05-07T16:00:00',
                end: '2024-05-10T16:00:00'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2024-05-09T16:00:00'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2024-05-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2024-05-11',
                end: '2024-05-13'
            },
            {
                title: 'Meeting',
                start: '2024-05-12T10:30:00',
                end: '2024-05-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2024-05-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2024-05-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2024-05-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2024-05-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2024-05-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2024-05-28'
            }
        ] */

        events: '/cajera/reservation/list-calendar',
    });

    calendar.render();
});

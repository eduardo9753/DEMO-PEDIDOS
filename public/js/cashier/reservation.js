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
            var dateStr = clickedDate.toISOString().slice(0, 10); // Fecha en formato YYYY-MM-DD

            var hours = clickedDate.getHours().toString().padStart(2, '0');
            var minutes = clickedDate.getMinutes().toString().padStart(2, '0');
            var timeStr = hours + ':' + minutes; // Hora en formato HH:MM

            // Asignar la fecha y la hora a los campos del modal
            $('#start').val(dateStr);
            $('#end').val(dateStr);
            $('#hour_start').val(timeStr);
            $('#hour_end').val(timeStr);
        },

        //PARA DAR CLICK AL EVENTO Y ACTUALIZAR LOS DATOS DE LA RESERVA EN EL MODAL
        eventClick: function(info) {
            let eventCalendar = info.event;  // Objeto de evento de FullCalendar
            let eventComun = info.event.extendedProps; // Propiedades adicionales del evento

            // Acceder a los datos del evento
            let id = eventCalendar.id;        // ID del evento
            let title = eventCalendar.title;
            let start = eventCalendar.start;  // Objeto de fecha de inicio
            let end = eventCalendar.end;      // Objeto de fecha de fin

            // Formatear las fechas y horas para los campos de entrada
            let startDate = start ? start.toISOString().split('T')[0] : ''; // Fecha de inicio en formato YYYY-MM-DD
            let startTime = start ? start.toTimeString().substring(0, 5) : ''; // Hora de inicio en formato HH:MM
            let endDate = end ? end.toISOString().split('T')[0] : ''; // Fecha de fin en formato YYYY-MM-DD
            let endTime = end ? end.toTimeString().substring(0, 5) : ''; // Hora de fin en formato HH:MM

            // Acceder a los datos extendidos del evento (campos personalizados)
            let customerName = eventComun.customer_name;
            let numberPhone = eventComun.number_phone;
            let numberOfSeats = eventComun.number_of_seats;
            let hour_start = eventComun.hour_start;  // Hora de inicio original
            let hour_end = eventComun.hour_end;      // Hora de fin original
            let tableId = eventComun.table_id;
            let userId = eventComun.user_id;

            // Mostrar los datos en los campos del formulario del modal
            $('#id_reservation').val(id);
            $('#id_reservation_delete').val(id); //tambien le asignamos el id al input id del form para eliminar
            $('#title_up').val(title);
            $('#customer_name_up').val(customerName);
            $('#number_phone_up').val(numberPhone);
            $('#number_of_seats_up').val(numberOfSeats);
            $('#start_up').val(startDate);
            $('#hour_start_up').val(hour_start || startTime); // Usa la hora de inicio original si está disponible, sino la formateada
            $('#end_up').val(endDate);
            $('#hour_end_up').val(hour_end || endTime); // Usa la hora de fin original si está disponible, sino la formateada

            // Mostrar el modal
            $('#reservation-update-Modal').modal('show');
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

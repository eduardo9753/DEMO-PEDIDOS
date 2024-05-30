window.addEventListener('DOMContentLoaded', () => {
    // GUARDAR DATOS DEL EVENTO VIA AJAX "MODAL RESERVATION" BUCLE
    $('#reservationForm').on('submit', function (event) {
        event.preventDefault();  // Prevenir la autorecarga de la página

        // Capturar la URL del formulario
        let form = $(this);
        let url = form.attr('action');

        // Variable de los inputs del formulario
        let datos = form.serialize();

        // VIA AJAX
        $.ajax({
            type: 'POST',
            url: url,  // Usar la URL capturada
            data: datos,

            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (response) {
                if (response.code == 2) {
                    $.each(response.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        location.reload();
                    });
                    console.log(response);
                }
            },

            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Mostrar el error detallado en la consola
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error: ' + xhr.responseText,
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    location.reload();
                });
            }
        });
    });

    // FORMULARIO PARA PODER ACTUALIZAR LA RESERVACION
    $('#reservation-update-Form').on('submit', function (event) {
        event.preventDefault();  // Prevenir la autorecarga de la página

        // Capturar la URL del formulario
        let form = $(this);
        let url = form.attr('action');

        // Variable de los inputs del formulario
        let datos = form.serialize();

        // VIA AJAX
        $.ajax({
            type: 'POST',
            url: url,  // Usar la URL capturada
            data: datos,

            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (response) {
                if (response.code == 2) {
                    $.each(response.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    console.log(response);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        location.reload();
                    });
                }
            },

            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Mostrar el error detallado en la consola
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error: ' + xhr.responseText,
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    location.reload();
                });
            }
        });
    });

    // ELIMINAR LA RESERVACION
    $('#reservation-delete-Form').on('submit', function (event) {
        event.preventDefault();  // Prevenir la autorecarga de la página

        // Capturar la URL del formulario
        let form = $(this);
        let url = form.attr('action');

        // Variable de los inputs del formulario
        let datos = form.serialize();

        Swal.fire({
            title: "Seguro de querer eliminar la reservación?",
            text: "acción no reversible - ya no se podrá recuperar la información!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, adelante!"
        }).then((result) => {
            if (result.isConfirmed) {
                // VIA AJAX
                $.ajax({
                    type: 'POST',
                    url: url,  // Usar la URL capturada
                    data: datos,
                    success: function (response) {
                        console.log(response);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Mostrar el error detallado en la consola
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error: ' + xhr.responseText,
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            location.reload();
                        });
                    }
                });
            }
        });
    });

});

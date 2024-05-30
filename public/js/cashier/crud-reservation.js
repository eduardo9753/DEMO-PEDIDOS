window.addEventListener('DOMContentLoaded', () => {
    // GUARDAR DATOS DEL EVENTO VIA AJAX "MODAL RESERVATION" BUCLE
    $('#reservationForm').on('submit', function (e) {
        e.preventDefault(); // Prevenir la recarga de la página

        var form = this;

        $.ajax({
            url: $(form).attr('action'), // Leer la ruta del formulario
            method: $(form).attr('method'), // Atributo del método "POST"
            data: new FormData(form), // Enviar los datos del formulario
            processData: false,
            contentType: false,
            dataType: 'json', // Tipo de dato como objeto "json"

            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (data) {
                if (data.code == 2) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else if (data.code == 1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        location.reload();
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
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
    $('#reservation-update-Form').on('submit', function (e) {
        e.preventDefault();

        var form = this;

        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            contentType: false,
            dataType: 'json',

            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (data) {
                if (data.code == 2) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    if (data.code == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            location.reload();
                        });
                    }
                }
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

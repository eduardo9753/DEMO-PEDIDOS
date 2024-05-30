<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#reservation-update-Modal">
    Reservar Mesa
</button> --}}

<!-- Modal -->
<div class="modal fade" id="reservation-update-Modal" tabindex="-1" aria-labelledby="reservation-update-ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reservation-update-ModalLabel">Actualizar reserva</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cashier.reservation.update') }}" id="reservation-update-Form" method="POST"
                    enctype="application/x-www-form-urlencoded">

                    @csrf

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    <div class="row">
                        <div class="form-group">
                            <input type="text" id="id_reservation" name="id_reservation" hidden>
                            <label for="title_up">Título</label>
                            <input type="text" class="form-control" id="title_up" name="title_up">
                            {{-- alerta de error --}}
                            <span class="text-danger error-text title_up_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="customer_name_up">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="customer_name_up" name="customer_name_up">
                            {{-- alerta de error --}}
                            <span class="text-danger error-text customer_name_up_error"></span>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_phone_up">Número de Teléfono</label>
                                <input type="text" class="form-control" id="number_phone_up" name="number_phone_up">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text number_phone_up_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_of_seats_up">Número de Sillas</label>
                                <input type="number" class="form-control" value="1" id="number_of_seats_up"
                                    min="1" max="25" name="number_of_seats_up">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text number_of_seats_up_error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_up">Fecha de Inicio</label>
                                <input type="datetime-local" class="form-control" id="start_up" name="start_up">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text start_up_error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_up">Fecha de Fin</label>
                                <input type="datetime-local" class="form-control" id="end_up" name="end_up">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text end_up_error"></span>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Actualizar Reservación</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <form action="{{ route('cashier.reservation.delete') }}" id="reservation-delete-Form"
                        method="POST">
                        {{-- METODO ACTUALIZAR --}}
                        @method('DELETE')

                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf
                        <input type="text" id="id_reservation_delete" name="id_reservation_delete" hidden>
                        <button type="submit" class="btn btn-danger">Eliminar Reservación</button>
                    </form>

                    <div> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

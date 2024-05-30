<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#reservationModal">
    Reservar Mesa
</button> --}}

<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reservationModalLabel">Registrar reserva</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cashier.reservation.create') }}" id="reservationForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" name="title">
                            {{-- alerta de error --}}
                            <span class="text-danger error-text title_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="customer_name">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name">
                            {{-- alerta de error --}}
                            <span class="text-danger error-text customer_name_error"></span>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_phone">Número de Teléfono</label>
                                <input type="text" class="form-control" id="number_phone" name="number_phone">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text number_phone_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_of_seats">Número de Sillas</label>
                                <input type="number" class="form-control" value="1" id="number_of_seats"
                                    min="1" max="25" name="number_of_seats">
                                {{-- alerta de error --}}
                                <span class="text-danger error-text number_of_seats_error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="start" name="start" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hour_start">Hora de Inicio</label>
                                <input type="time" class="form-control" id="hour_start" name="hour_start" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end">Fecha de Fin</label>
                                <input type="date" class="form-control" id="end" name="end">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hour_end">Hora de Fin</label>
                                <input type="time" class="form-control" id="hour_end" name="hour_end">
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Guardar Reservación</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

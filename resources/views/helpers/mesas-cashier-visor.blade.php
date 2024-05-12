<div class="row gx-2">
    {{-- <input type="text" id="count_table_cashier" name="count_table_cashier" value="1" hidden> --}}

    @foreach ($tables as $table)
        <div class="col-sm-4 col-6">
            <div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
                <div class="position-relative shape-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/607/607008.png" class="img-fluid img-4x"
                        alt="Bootstrap Themes" />
                    <i class="icon-book-open"></i>
                </div>
                <div class="ms-2">
                    <h3 class="m-0 fw-semibold">{{ $table->name }}</h3>
                    @if ($table->state == 'ACTIVO')
                        <button class="btn btn-primary btn-sm">LIBRE</button>
                    @elseif ($table->state == 'INACTIVO')
                        @php
                            $order = $table->orders->last(); // Obtener la última orden asociada a la mesa
                        @endphp
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <button class="btn btn-danger btn-sm">OCUPADO</button>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                {{-- FORM DE PRECUENTA --}}
                                <form action="{{ route('cashier.table.update') }}"
                                    id="form-print-cashier-{{ $order->id }}" method="POST">
                                    @csrf
                                    <input type="text" name="table_id" value="{{ $order->table_id }}" hidden>
                                    <input type="text" name="order_id" id="order_id" value="{{ $order->id }}"
                                        hidden>
                                    <button type="submit" class="btn btn-info btn-sm">
                                        PRECUENTA
                                    </button>
                                </form>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                {{-- FORM DE MANDAR A COCINA --}}
                                <form id="form-print-cashier-kitchen-{{ $order->id }}">
                                    <input type="text" name="table_id" value="{{ $order->table_id }}" hidden>
                                    <input type="text" name="order_id" id="order_id" value="{{ $order->id }}"
                                        hidden>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        COCINA
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        @php
                            $order = $table->orders->last(); // Obtener la última orden asociada a la mesa
                        @endphp
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <button class="btn btn-info btn-sm">{{ $table->state }}</button>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                {{-- FORM DE PRECUENTA --}}
                                <form action="{{ route('cashier.table.update') }}" id="form-print-cashier"
                                    method="POST">
                                    @csrf
                                    <input type="text" name="table_id" value="{{ $order->table_id }}" hidden>
                                    <input type="text" name="order_id" id="order_id" value="{{ $order->id }}"
                                        hidden>
                                    <button type="submit" class="btn btn-info btn-sm">
                                        PRECUENTA
                                    </button>
                                </form>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                {{-- FORM DE MANDAR A COCINA --}}
                                <form id="form-print-cashier-kitchen">
                                    <input type="text" name="table_id" value="{{ $order->table_id }}" hidden>
                                    <input type="text" name="order_id" id="order_id" value="{{ $order->id }}"
                                        hidden>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        COCINA
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @endforeach


    {{-- <div class="col-sm-12" id="allTablesCashier"></div> --}}
</div>

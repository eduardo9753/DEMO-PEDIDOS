<div class="row">
    @foreach ($orders as $order)
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    <h5 class="card-title text-primary">Pedido: #00{{ $order->order_number }} </h5>
                    <h5 class="card-title text-primary">{{ $order->table->name }}</h5>
                    <h5 class="card-title text-primary">Responsable: {{ $order->user->name }}</h5>
                    <h5 class="card-title text-primary">{{ $order->created_at->diffForHumans() }}</h5>

                    <div class="d-flex justify-content-between mt-2">
                        <form action="{{ route('waitress.order.delete', ['order' => $order]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                        </form>

                        <a href="{{ route('waitress.order.show', ['order' => $order]) }}" class="btn btn-success">
                            EDITAR
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($order->orderDishes as $orderDish)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $orderDish->dish->name }}</h5>
                                <h5 class="card-title">Cantidad: {{ $orderDish->quantity }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        @if ($order->table->state == 'ACTIVO')
                            <h6 class="p-2 bg-primary">LIBRE</h6>
                        @elseif ($order->table->state == 'INACTIVO')
                            <h6 class="p-2 bg-danger">OCUPADO</h6>
                        @else
                            <h6 class="p-2 bg-info">{{ $order->table->state }}</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

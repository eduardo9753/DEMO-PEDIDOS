@extends('layouts.app')


@section('body')

    <body>

        <!-- Page wrapper start -->
        <div class="page-wrapper">

            <!-- App container starts -->
            <div class="app-container">

                <!-- App header starts -->
                @include('helpers.header-start')
                <!-- App header ends -->

                <!-- App navbar starts -->
                @include('template.nav-mesera')
                <!-- App Navbar ends -->

                <!-- App body starts -->
                <div class="app-body">

                    <!-- Container starts -->
                    <div class="container">

                        <!-- Row start -->
                        <div class="row">
                            <div class="col-12 col-xl-6">

                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb mb-3">
                                    <li class="breadcrumb-item">
                                        <i class="icon-home lh-1"></i>
                                        {{-- <a href="{{ route('waitress.order.index') }}" class="text-decoration-none">Mesera</a> --}}
                                    </li>
                                    <li class="breadcrumb-item">Pedidos</li>
                                    <li class="breadcrumb-item text-light">Lista de Pedidos</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <a href="{{ route('waitress.table.index') }}" class="btn btn-warning">Mesas</a>
                        <a href="{{ route('waitress.order.list') }}" class="btn btn-primary">Tus Ordenes</a>
                        <div class="row gx-2">
                            @if (session()->has('mensaje'))
                                <div class="alert border border-danger alert-dismissible fade show" role="alert">
                                    <b>Aviso!</b>{{ session('mensaje') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <input type="text" id="count_order_waitress" name="count_order_waitress" value="1"
                                hidden>
                            <div class="col-sm-12 mt-3" id="allWaitressOrders"></div>
                        </div>
                        <!-- Row end -->

                    </div>
                    <!-- Container ends -->

                </div>
                <!-- App body ends -->

                <!-- App footer start -->
                <div class="app-footer">
                    <div class="container">
                        <span>© Bootstrap Gallery 2024</span>
                    </div>
                </div>
                <!-- App footer end -->

            </div>
            <!-- App container ends -->

        </div>
        <!-- Page wrapper end -->


    </body>
@endsection

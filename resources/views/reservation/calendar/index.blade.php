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
                @include('template.nav-caja')
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
                                        <i class="icon-house_siding lh-1"></i>
                                        <a href="{{ route('admin.dashboard.index') }}"
                                            class="text-decoration-none">Cajera</a>
                                    </li>
                                    <li class="breadcrumb-item">Crear</li>
                                    <li class="breadcrumb-item text-light">Reservaciones</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gx-2">
                            <div class="col-xl-12 col-12">
                                <!-- Row start -->
                                <div class="row gx-2">
                                    <div id='calendar'></div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                        <!-- Row end -->

                        {{-- MDOAL PARA LA RESERVACION --}}
                        @include('helpers.cashier.calendar.reservation')

                        {{-- MDOAL PARA  ACTUALIZAR LA RESERVACION --}}
                        @include('helpers.cashier.calendar.reservation-update')
                    </div>
                    <!-- Container ends -->

                    <script src="{{ asset('js/cashier/reservation.js') }}"></script>
                    <script src="{{ asset('js/cashier/crud-reservation.js') }}"></script>
                </div>
                <!-- App body ends -->

                <!-- App footer start -->
                <div class="app-footer">
                    <div class="container">
                        <span>© SysPedidos @php
                            echo date('Y');
                        @endphp </span>
                    </div>
                </div>
                <!-- App footer end -->

            </div>
            <!-- App container ends -->

        </div>
        <!-- Page wrapper end -->


    </body>
@endsection

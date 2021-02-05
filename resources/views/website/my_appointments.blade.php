@extends('layouts.app')
@section('title')
    My appointments
@endsection
@section('auth-header-options')
    <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">

    </span>
    <a class="btn-link text-white ml-auto ml-sm-0">

    </a>
@stop
@section('content')
    <div class="container py-4 py-lg-2 my-lg-5 px-4 px-sm-0">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="fs-xxl fw-500 text-white text-center">
                    {{ Auth::user()->first_name .' '. Auth::user()->last_name .'`s appointments'  }}
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
{{--                        Enjoy TriboreHealth on your mobile, desktop or tablet.--}}
{{--                        <br>It is ready to go wherever you go!--}}
                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div class="card p-4 rounded-plus bg-faded">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="border-faded bg-faded p-3 mb-g d-flex">
                                <input type="text" id="js-filter-contacts" name="filter-contacts" class="form-control shadow-inset-2 form-control-lg" placeholder="Filter contacts">
                                <div class="btn-group btn-group-lg btn-group-toggle hidden-lg-down ml-3" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="contactview" id="grid" checked="" value="grid"><i class="fas fa-table"></i>
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="contactview" id="table" value="table"><i class="fas fa-th-list"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="js-contacts">
                        {{-- Begin foreach --}}
                        @foreach ($appointments as $app)
                            <div class="col-xl-6 col-6  ">
                                <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="{{ $app->doctor_tag }}">
                                    <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                                        <div class="d-flex flex-row align-items-center">
                                            <span class="status status-success mr-3">
                                                <span class="rounded-circle profile-image d-block " style="background-image:url('{{ $app->profile_image }}'); background-size: cover;"></span>
                                            </span>
                                            <div class="info-card-text flex-1">
                                                <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info">
                                                    {{ $app->doctor_name }}
                                                </a>
                                                <span class="text-truncate text-truncate-xl">Date: {{ $app->date }}</span>
                                                <span class="text-truncate text-truncate-xl">Payment Status: {{ $app->payment_status }}</span>
                                            </div>
                                            @if ($app->payment_status === 'NOT PAID')
                                                <button id="pay" data-id="{{$app->id}}" type="button" class="btn btn-lg btn-primary waves-effect waves-themed">
                                                    <span class="fal fa-money-check mr-1"></span>
                                                    PAY
                                                </button>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/app.bundle.js') }}"></script>
    <script src="{{ asset('moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/formplugins/select2/select2.bundle.js') }}"></script>
    <script src="{{asset('backend/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('backend/js/notifications/toastr/toastr.js') }}"></script>
    <script src="{{asset('backend/js/notifications/sweetalert2/sweetalert2.bundle.js')}}"></script>

    <script>
        $(()=>{
            $('input[type=radio][name=contactview]').change(function()
            {
                if (this.value == 'grid')
                {
                    $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                    $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                    $('#js-contacts .js-expand-btn').addClass('d-none');
                    $('#js-contacts .card-body + .card-body').addClass('show');

                }
                else if (this.value == 'table')
                {
                    $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                    $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                    $('#js-contacts .js-expand-btn').removeClass('d-none');
                    $('#js-contacts .card-body + .card-body').removeClass('show');
                }

            });

            //initialize filter
            initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));

            $('#pay').on('click',function(event){
                const id = $('#pay').data('id');
                window.location.replace("{{ url('/payment') }}"+'/'+id);
            });
        })
    </script>
@stop

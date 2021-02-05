@extends('layouts.app')
@section('title')
    Payment
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
                    Payments are now streamlined with M-PESA STK Push
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down left">

                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div id="panel-3" class="panel">
                    <div class="panel-hdr color-success-600">
                        <h2>
                            Payment for the appointment
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag alert alert-primary alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="fal fa-times"></i>
                                </span>
                                </button>
                                <div class="d-flex flex-start w-100">
                                    <div class="mr-2">
                                    <span class="icon-stack icon-stack-lg">
                                        <i class="base-2 icon-stack-3x color-primary-400"></i>
                                        <i class="base-3 icon-stack-2x color-primary-600 opacity-70"></i>
                                        <i class="fal fa-lightbulb icon-stack-1x text-white opacity-90"></i>
                                    </span>
                                    </div>
                                    <div class="d-flex flex-fill">
                                        <div class="flex-fill">
                                            <span class="h5">Please follow this steps for mpesa payments</span><br>
                                            <span><strong>1. Enter your phone number in the format (792651712)</strong> </span><br>
                                            <span><strong>2. Click on the pay button.</strong></span> </span><br>
                                            <span><strong>3. Check your phone for an STK Push.</strong> </span><br>
                                            <span><strong>4. Pay and wait for a confirmation.</strong></span> </span><br><br>
                                        <p><strong>NOTE: Please do not confirm before receiving an M-PESA Confirmation Message</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-4 rounded-plus bg-faded">
                                <form id="mpesa-payment-form" novalidate="" method= "POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-6 pr-1">
                                            <label class="form-label" for="phone_number">Phone Number</label>
                                            @foreach($appointments as $app)
                                                <input id="phone_number" value="{{ Str::substr($app->phone_number,1) }}" type="number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number" autofocus>
                                                <input id="user_id" value="{{ $app->user_id }}" type="number"  class="form-control d-none" name="user_id" required >
                                                <input id="doctor_id" value="{{ $app->doctor_id }}" type="number"  class="form-control d-none" name="doctor_id" required >
                                                <input id="appointment_id" value="{{ $app->id }}" type="number"  class="form-control d-none" name="appointment_id" required >
                                            @endforeach
                                            <div class="help-block"></div>
                                            <div id="phone_number-feedback" class="invalid-feedback">Please enter your phone number.</div>
                                                @error('phone_number')
                                                <span class="phone_number-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 pr-1">
                                            <label class="form-label" for="amount">Amount (KES)</label>
                                            <input type="text" class="form-control" name="amount" id="amount" value="1000" disabled required>
                                            <div id="amount-feedback" class="invalid-feedback">Please enter a time between 9:00AM and 5:00PM.</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6 pl-1">
                                            <div class="row no-gutters">
                                                <div class="col-lg-8 pl-lg-1 ml-1">
                                                    <button id="pay" type="submit" class="btn btn-block btn-success btn-lg mt-1">{{ __('Complete Payment') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        let toast = Swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-alt-success m-5',
                input: 'form-control'
            }
        });
        var form = $("#mpesa-payment-form");
        form.on('submit',function (event) {
            event.preventDefault()
            if (form[0].checkValidity() === false)
            {
                event.preventDefault()
                event.stopPropagation()
            }
            event.preventDefault()
            let phone_number = $('#phone_number').val();
            let user_id = $('#user_id').val();
            let doctor_id = $('#doctor_id').val();
            let appointment_id = $('#appointment_id').val();
            let amount = 1;
            const stk_push_url = '{{ route('website.send_stk_push') }}';

            const data = {phone_number: phone_number,amount:amount,user_id:user_id,
                doctor_id:doctor_id,appointment_id:appointment_id,_token: "{{ csrf_token() }}",};
            $.ajax({
                url:stk_push_url,
                data:data,
                type:'POST',
                success: function (response) {
                    if(response.ok){
                        toast.fire({
                            title: response.msg,
                            icon: 'success',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-alt-success m-1'
                            },
                            confirmButtonText: 'Confirm Payment',
                            html: false,
                            preConfirm: e => {
                                return new Promise(resolve => {
                                    setTimeout(() => {
                                        resolve();
                                    }, 100);
                                });
                            }
                        }).then(result => {
                            $.ajax({
                                url:'{{ route('website.confirm.payment') }}',
                                data:{'empty': 'empty',_token: "{{ csrf_token() }}"},
                                type:'POST',
                                success: function (response) {
                                    toast.fire({
                                        title: response.msg,
                                        icon: 'success',
                                        showCancelButton: false,
                                        customClass: {
                                            confirmButton: 'btn btn-alt-success m-1'
                                        },
                                        confirmButtonText: 'Proceed to home page',
                                        html: false,
                                        preConfirm: e => {
                                            return new Promise(resolve => {
                                                setTimeout(() => {
                                                    resolve();
                                                }, 40);
                                            });
                                        }
                                    }).then(result => {
                                        window.location.replace("{{ route('website.home') }}");
                                    });
                                }
                            })
                        });
                    }else{
                        toast.fire({
                            title: response.msg,
                            icon: 'error',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-alt-danger m-1'
                            },
                            confirmButtonText: 'Try Again',
                            html: false,
                            preConfirm: e => {
                                return new Promise(resolve => {
                                    setTimeout(() => {
                                        resolve();
                                    }, 50);
                                });
                            }
                        }).then(result => {
                            // window.location.reload();
                            //? result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                        });
                    }

                }
            })

        });
    </script>


@stop

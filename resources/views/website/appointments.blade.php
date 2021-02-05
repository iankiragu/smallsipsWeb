@extends('layouts.app')
@section('title')
    Appointments Registration
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
                    Book an appointment now!
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                        Enjoy TriboreHealth on your mobile, desktop or tablet.
                        <br>It is ready to go wherever you go!
                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div class="card p-4 rounded-plus bg-faded">
                    <form id="appointments-form" novalidate="" method= "POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6 pr-1">
                                <input id="user_id" name="user_id" class="d-none" type="number" value="{{Auth::user()->id}}">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" id="fname" value="{{Auth::user()->first_name}}"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name" value="{{ old('first_name') }}" required
                                       autocomplete="first_name" autofocus disabled>
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" value="{{Auth::user()->last_name}}" id="lname" class="form-control @error('first_name')
                                    is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"
                                       required autocomplete="last_name" autofocus disabled>
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pr-1">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input id="phone_number" value="{{ Auth::user()->phone_number }}" type="number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                <div class="help-block"></div>
                                <div class="invalid-feedback">Please enter your phone number.</div>
                                @error('phone_number')
                                <span class="phone_number-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-6 pr-1">
                                <label class="form-label" for="specialization_id">Type of doctor</label>
                                <select class="select2 form-control" name="specialization_id" id="specialization_id">
                                    @foreach($specs as $spec)
                                        <option value="{{ $spec->id }}">{{ ucwords(strtolower($spec->specialization->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-6 pr-1">
                                <label class="form-label" for="hospital_id">Hospital</label>
                                <select class="select2 form-control" name="hospital_id" id="hospital_id">

                                </select>
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="doctor_id">Doctor</label>
                                <select class="select2 form-control" name="doctor_id" id="doctor_id">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pr-1">
                                <label class="form-label" for="date">Date</label>
                                <div class="input-group">
                                    <input id="date" name="date" type="text" class="form-control " placeholder="Select date" required>
                                    <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar"></i>
                                    </span>
                                    </div>
                                    <div id="date-feedback" class="invalid-feedback">Please chose a time for your appointment</div>

                                </div>

                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="time">Time</label>
                                <input type="time" class="form-control" name="time" id="time" min="09:00" max="17:00" step="600" required>
                                <div id="time-feedback" class="invalid-feedback">Please enter a time between 9:00AM and 5:00PM.</div>
                            </div>
                        </div>

                        <label class="form-label" for="description">Brief Description</label>
                        <div class="form-group row">
                            <div class="col-6 pr-1">
                                <textarea class='form-control' name="description" id="description" required></textarea>
                                <div id="description-feedback" class="invalid-feedback">Please enter a description</div>
                            </div>
                            <div class="col-6 pr-1">
                                <div class="row no-gutters">
                                    <div class="col-lg-10 pl-lg-1 ml-6">
                                        <button id="submit-appointment" type="submit" class="btn btn-block btn-success btn-lg mt-1">{{ __('Book Appointment') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                                            <div class="form-group">--}}
                        {{--                                               --}}
                        {{--                                            </div>--}}


                    </form>
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
        let controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        $('#date').datepicker(
        {
            todayHighlight: true,
            orientation: "top left",
            templates: controls,
            startDate: new Date(),
            autoclose: true
        });
        let toast = Swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-alt-success m-5',
                input: 'form-control'
            }
        });
        function fill_doctors(specialization_id){
            let base = '{{route("website.get.doctors.json", ":slug")}}';
            let url = base.replace(':slug',specialization_id);
            $.ajax({
                url : url,
                type : 'GET',
                dataType : 'json',
                success : function (res) {
                    $('#doctor_id').empty();
                    $.each(res,function (key,value) {
                        $('select[name="doctor_id"]').append('<option value="'+ res[key]['id'] +'">'+ res[key]['first_name']+' '+res[key]['last_name'] +'</option>');
                        $('select[name="hospital_id"]').append('<option value="'+ res[key]['id'] +'">'+ res[key]['hospital']['name'] +'</option>');
                    });
                }
            })
        }
        $(()=>{

            let specialization_select = $('#specialization_id');
            fill_doctors(specialization_select.val());
            specialization_select.on('change',function (event) {
                event.preventDefault();
                fill_doctors(specialization_select.val());
            });
            // Fetch form to apply custom Bootstrap validation
            var form = $("#appointments-form")
            form.on('submit',function (event) {
                event.preventDefault()
                if (form[0].checkValidity() === false)
                {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.addClass('was-validated');
                let phone_number = $('#phone_number').val();
                let user_id = $('#user_id').val();
                let doctor_id = $('#doctor_id').val();
                let description = $('#description').val();
                let date = $('#date').val();
                let time = $('#time').val();
                let has_paid = 'false';
                const data = {phone_number:phone_number,user_id:user_id,doctor_id:doctor_id,
                    description:description,date:date,time:time,has_paid:has_paid,_token: "{{ csrf_token() }}",}
                const url = '{{ route('website.process.appointments') }}';
                $.ajax({
                    url:url,
                    data:data,
                    type:'POST',
                    success:function (response) {
                        if(response.ok){
                            const id = response.id;
                            toast.fire({
                                title: response.msg,
                                icon: 'success',
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-alt-success m-1'
                                },
                                confirmButtonText: 'Ok',
                                html: false,
                                preConfirm: e => {
                                    return new Promise(resolve => {
                                        setTimeout(() => {
                                            resolve();
                                        }, 50);
                                    });
                                }
                            }).then(result => {
                                window.location.replace("{{ url('/payment') }}"+'/'+id);
                                //? result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
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
                                window.location.reload();
                                //? result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                            });
                        }
                    }
                });
            });
        });
    </script>
@stop

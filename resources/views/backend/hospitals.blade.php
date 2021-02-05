@extends('layouts.backend')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">{{ config('app.name', 'Tribore Health') }}</a></li>
        <li class="breadcrumb-item">Manage Hospitals</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-hospital-alt'></i> Manage Hospitals <span class='fw-300'></span> <sup class='badge badge-primary fw-500'>WIP</sup>
            <br><br>
            @if (count(\App\Hospital::withTrashed()->get()->toArray()) < 10)
                <button id="upload_hospitals" type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                    <span class="fal fa-upload mr-1"></span>
                    Migrate Hospital Data
                </button>
            @else
                <button disabled type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                    <span class="fal fa-upload mr-1"></span>
                    Migrate Hospital Data
                </button>

                @if (count(\App\Town::all()) < 1)
                    <button id="upload_towns" type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                        <span class="fal fa-upload mr-1"></span>
                        Upload Towns
                    </button>
                @else
                    <button disabled type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                        <span class="fal fa-upload mr-1"></span>
                        Upload Towns
                    </button>

                    @if (count(\App\Hospital::where('town_id',null)->get()) < 11)
                        <button id="map_towns" type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                            <span class="fal fa-upload mr-1"></span>
                            Map Hospitals to Towns
                        </button>
                    @else
                        <button disabled type="button" class="btn btn-sm btn-primary waves-effect waves-themed">
                            <span class="fal fa-upload mr-1"></span>
                            Map Hospitals to Towns
                        </button>
                    @endif
                @endif
            @endif





            {{--            <small>--}}
            {{--                Insert page description or punch line--}}
            {{--            </small>--}}
        </h1>

    </div>
    <!-- Your main content goes below here: -->

    <div class="row">
        <div class="col-xl-6">
            <div id="panel-3" class="panel">
                <div class="panel-hdr color-success-600">
                    <h2>
                        Manage Hospitals

                    </h2>

                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
{{--                        <form id="manage_hospitals" novalidate="" method="POST" action="">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-6 pr-1">--}}
{{--                                    <label class="form-label" for="name">Hospital Name</label>--}}
{{--                                    <input type="text" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                    @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="col-6 pl-1">--}}
{{--                                    <label class="form-label" for="email">Hospital Email</label>--}}
{{--                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                </div>--}}
{{--                                @error('last_name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-12 pl-1">--}}
{{--                                    <label class="form-label" for="overview">Hospital Overview</label>--}}
{{--                                    <textarea id="overview" class="form-control @error('overview')--}}
{{--                                        is-invalid @enderror" name="overview" value="{{ old('overview') }}"--}}
{{--                                              required autocomplete="overview" autofocus></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-6 pr-1">--}}
{{--                                    <label class="form-label" for="address">Hospital Address</label>--}}
{{--                                    <input type="text" id="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                    @error('address')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="col-6 pl-1">--}}
{{--                                    <label class="form-label" for="emergency_number_one">Emergency Number</label>--}}
{{--                                    <input type="text" id="emergency_number_one" class="form-control @error('emergency_number_one') is-invalid @enderror"  name="emergency_number_one" value="{{ old('emergency_number_one') }}" required autocomplete="emergency_number_one" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                </div>--}}
{{--                                @error('emergency_number_one')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-6 pr-1">--}}
{{--                                    <label class="form-label" for="helpline">Hospital Helpline</label>--}}
{{--                                    <input type="text" id="helpline" class="form-control @error('helpline') is-invalid @enderror" name="helpline" value="{{ old('helpline') }}" required autocomplete="helpline" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                    @error('helpline')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="col-6 pl-1">--}}
{{--                                    <label class="form-label" for="emergency_number_one">Emergency Number</label>--}}
{{--                                    <input type="text" id="emergency_number_one" class="form-control @error('emergency_number_one') is-invalid @enderror"  name="emergency_number_one" value="{{ old('emergency_number_one') }}" required autocomplete="emergency_number_one" autofocus>--}}
{{--                                    <div class="invalid-feedback">No, you missed this one.</div>--}}
{{--                                </div>--}}
{{--                                @error('last_name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('backend-scripts')
    <script>
        $(()=>{
            $('#upload_hospitals').on('click',function (event) {
                event.preventDefault();
                $('#upload_hospitals').prop('disabled',true);
                $.ajax({
                    url: '{{route('backend.migrate.hospitals')}}',
                    data: {},
                    type: 'POST',
                    success: function (res) {
                        if (res.ok === 'true'){
                            toastr["success"](res.msg);
                            setTimeout(function (event) {
                                location.reload(true);
                            },10000)
                        }else if(res.ok === 'false'){
                            toastr["error"](res.msg);
                            $('#name').val('');
                        }

                    }
                });
            });
            $('#upload_towns').on('click',function (event) {
                event.preventDefault();
                $('#upload_towns').prop('disabled', true);
                $.ajax({
                    url: '{{route('backend.migrate.towns')}}',
                    data: {},
                    type: 'POST',
                    success: function (res) {
                        if (res.ok === 'true') {
                            toastr["success"](res.msg);
                            setTimeout(function (event) {
                                location.reload(true);
                            },10000)
                        } else if (res.ok === 'false') {
                            toastr["error"](res.msg);
                            $('#name').val('');
                        }
                    }
                });
            });
            $('#map_towns').on('click',function (event) {
                event.preventDefault();
                $('#map_towns').prop('disabled', true);
                $.ajax({
                    url: '{{route('backend.map.towns')}}',
                    data: {},
                    type: 'POST',
                    success: function (res) {
                        if (res.ok === 'true') {
                            toastr["success"](res.msg);
                            setTimeout(function (event) {
                                location.reload(true);
                            },10000)
                        } else if (res.ok === 'false') {
                            toastr["error"](res.msg);
                            $('#name').val('');
                        }
                    }
                });
            });
        });

    </script>
@endpush

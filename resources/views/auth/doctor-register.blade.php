@extends('layouts.app')
@section('auth-header-options')
    <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
        Already a member?
    </span>
    <a href="{{ route('login') }}" class="btn-link text-white ml-auto ml-sm-0">
        Secure Login
    </a>
@stop
@section('content')
    <div class="container py-4 py-lg-2 my-lg-5 px-4 px-sm-0">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="fs-xxl fw-500 text-white text-center">
                    Register now, its free!
                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                        Your registration is free. Please make sure you fill in actual and real information about you.
                    </small>
                </h2>
            </div>
            <div class="col-xl-6 ml-auto mr-auto">
                <div class="card p-4 rounded-plus bg-faded">
                    <form id="js-login" novalidate="" method= "POST" action="{{ route('backend.register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" id="fname"  class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control @error('first_name') is-invalid @enderror"  name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                            </div>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input id="phone_number" type="text"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                <div class="help-block"></div>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-6 pr-1">
                                <label class="form-label" for="emailverify">Email</label>
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="invalid-feedback">No, you missed this one.</div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                                <div class="invalid-feedback">Sorry, you missed this one.</div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="specialization_id">Select your specialization</label>
                                <select class="form-control" name="specialization_id" id="specialization_id">
                                    @foreach ($specs as $spec)
                                        <option value="{{$spec->id}}">{{$spec->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="id_number">ID Number</label>
                                <input type="number" id="id_number"  class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autocomplete="id_number" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 pr-1">
                                <label class="form-label" for="license_no">License No</label>
                                <input type="text" id="license_no" class="form-control @error('license_no') is-invalid @enderror"  name="license_no" value="{{ old('license_no') }}" required autocomplete="license_no" autofocus>
                                <div class="invalid-feedback">No, you missed this one.</div>
                                @error('license_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="hospital_id">Select the hospital you work in</label>
                                <select class="select2 form-control" name="hospital_id" id="hospital_id">
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}">{{ ucwords(strtolower($hospital->name)) }}</option>
                                    @endforeach
{{--                                    <option value="2">Mbagathi District Hospital</option>--}}
{{--                                    <option value="3">The Aga Khan Hospital</option>--}}
{{--                                    <option value="4">Kenyatta National Hospital</option>--}}
{{--                                    <option value="5">Nairobi Hospital</option>--}}
                                </select>
                            </div>
                            <div class="col-6 pl-1">
                                <label class="form-label" for="license_document">Upload a pdf of your license</label>
                                <input type="file" name="license_document" id="license_document" class="form-control-file">
                                @error('license_document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 pl-1">
                                <label class="form-label" for="license_document">Upload a profile picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control-file">
                                @error('profile_picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-lg-10 pl-lg-1 ml-6">
                                    <button id="js-login-btn" type="submit" class="btn btn-block btn-success btn-lg mt-3">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

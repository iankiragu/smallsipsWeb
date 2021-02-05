<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <link href="{{asset('website/css/master.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/plugins/iview/css/iview.css')}}" type='text/css' media='all' />
    <link rel="stylesheet" href="{{asset('website/plugins/iview/css/skin/style.css')}}" type='text/css' media='all' />
    <script type="text/javascript" src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
    <script src= "{{asset('website/js/jquery-migrate-1.2.1.js')}}" ></script>
    <script src="{{asset('website/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('website/js/bootstrap-3.1.1.min.js')}}"></script>
    <script src="{{asset('website/js/modernizr.custom.js')}}"></script>
    <link rel="stylesheet" media="screen, print" href="{{asset('backend/css/notifications/toastr/toastr.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('backend/css/notifications/sweetalert2/sweetalert2.bundle.css')}}">

    @stack('website-css')
</head>

<body>
<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200"  >
    {{--  Header  --}}

    <!-- Loader Landing Page -->
    <div id="ip-container" class="ip-container">
        <!-- initial header -->
        <header class="ip-header" >
            <div class="ip-loader">
                <div class="text-center">
                    <div class="ip-logo"><img  src="{{asset('website/img/logo_tribo_new.png')}}" height="50" width="294" alt="logo"></div>
                </div>
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,39.3,10z"/>
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                </svg> </div>
        </header>
    </div>
    <!-- Loader end -->

        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-left">
{{--                        <ul class="social-links">--}}
{{--                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
{{--                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
{{--                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
{{--                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
{{--                            <li><a target="_blank" href="https://www.youtube.com/"><i class="social_icons social_youtube_square"></i></a></li>--}}
{{--                            <li class="li-last"><a target="_blank" href="https://instagram.com/"><i class="social_icons social_instagram_square"></i></a></li>--}}
{{--                        </ul>--}}
                    </div>
                    <div class="top-header__links col-sm-8">
                        <a href="tel:+522 234 56789"><i class="icon-header icon-call-in color_primary"></i> +254 - 792 - 651 - 712 </a>
                        <a class="border-right" href="mailto:Support@HealthCare.org"><i class="icon-header icon-envelope-open color_primary"></i> info@triborehealth.com</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- HEADER -->
    <div class="header">
       @include('website._partials.header')
    </div>
    <!-- HEADER END -->

    {{--  End Header  --}}

    {{--  Home Content  --}}

    @yield('content')
    {{--  End Home Content  --}}

    @stack('website-js')

    @include('website._partials.footer')

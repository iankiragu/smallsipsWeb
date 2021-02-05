<div class="container">
    <div class="header-inner">
        <div class="row">
            <div class="col-md-4 col-xs-12"> <a href="/" class="logo"> <img class="logo__img" src="{{asset('website/img/logo_tribo_new.png')}}" height="50" width="294" alt="Logo"> </a> </div>
            <div class="col-md-8 col-xs-12">
                <div class="header-block">
{{--                    <span class="header-label"> <i class="icon-header icon-call-in color_primary"></i>--}}
{{--                        <span class="helper"> Call Us <a href="tel:+522 234 56789">--}}
{{--                                <strong>+522 234 56789</strong></a>--}}
{{--                        </span>--}}
{{--                    </span>--}}

                    <span class="header-label">
                        <i class="icon-header icon-book-open color_primary"></i>
                        <span class="helper"><a id="appointment-link" href=""><strong>Book an Appointment</strong></a>
                        </span>
                    </span>
                    @guest
                        <span class="header-label">
                            <i class="icon-header icon-users color_primary"></i>
                            <span class="helper"> Don't have an account? <a href="{{route('register')}}"><strong>Register</strong></a></span>
                        </span>
                        <span class="header-label header-label_2 bg-color_second color_white">
                            <a class="color_white" href="{{ route('login') }}"><i class="icon-header icon-user"></i>
                                <span class="helper">LOGIN</span>
                            </a>
                        </span>
                    @endguest
                    @can('accessWebsite',\App\User::class)
                        @can('hasVerifiedEmail',\App\User::class)
                            @auth
                                <span class="header-label">
                                <i class="icon-header icon-user color_primary"></i>
                                <span class="helper"><a href=""><strong>{{ Auth::user()->last_name }}</strong></a>
                                </span>
                            </span>

                                <span class="header-label header-label_2 bg-color_second color_white">
                                <a class="color_white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="icon-header icon-user"></i>
                                    <span class="helper">LOGOUT</span>
                                </a>
                            </span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf

                                </form>
                            @endauth
                        @endcan
                        @cannot('hasVerifiedEmail',\App\User::class)
                            <span class="header-label">
                                <i class="icon-header icon-users color_primary"></i>
                                <span class="helper"> <strong>Please verify your email</strong></span>
                            </span>
                        @endcannot
                    @endcan

                </div>
                <form class="hidden-md hidden-lg text-center" id="search-global-mobile" method="get">
                    <input type="text" value="" id="search-mobile" name="s" >
                    <button type="submit"><i class="icon fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- end header-inner-->
</div>
<!-- end container-->

<div class="top-nav ">
    <div class="container">
        <div class="row">
            <div class="col-md-12  col-xs-12">
                <div class="navbar yamm " >
                    <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
                        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">Menu</a> </div>
                    <div id="navbar-collapse-1" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="{{ Route::current()->getName() == 'website.home' ? ' active' : '' }}" href="{{route('website.home')}}">HOME </a> </li>
                            <li><a class="{{ Route::current()->getName() == 'website.doctors' ? ' active' : '' }}" href="{{route('website.doctors')}}">DOCTORS </a></li>
                            <li><a class="{{ Route::current()->getName() == 'website.contact' ? ' active' : '' }}" href="{{route('website.contact')}}">CONTACT US </a> </li>
                            <li class="dropdown"><a href="#"  > WELLNESS <b class="caret color_primary"></b> </a>
                                <ul role="menu" class="dropdown-menu">
                               
                                <li> <a target="_blank" href="{{route('website.depression_self_assessment')}}"  > DEPRESSION SELF ASSESMENT</a> </li>
                                <li> <a target="_blank" href="{{route('website.eatwell_plate')}}"  > EAT WELL PLATE</a> </li>
                                <li> <a target="_blank" href="{{route('website.healthadvisor')}}"  > HEALTH ADVISOR</a> </li>
                                <li> <a target="_blank" href="{{route('website.live_well')}}"  > LIVE WELL</a> </li>
                                <li> <a target="_blank" href="{{route('website.weight_loss_guide')}}"  > WEIGHT LOSS GUIDE</a> </li>
                                <li> <a target="_blank" href="{{route('website.your_blood_pressure')}}"  > YOUR BLOOD PRESSURE</a> </li>
                                </ul>
                            </li>
                            <li><a class="{{ Route::current()->getName() == 'website.my.appointments' ? ' active' : '' }}" href="{{route('website.my.appointments')}}">MY APPOINTMENTS </a> </li>
                            <li><a target="_blank" href="https://triborehealthbot.azurewebsites.net/">HEALTH CHECKER </a> </li>
                        </ul>
{{--                        <form id="search-global-menu" class="hidden-xs hidden-sm" method="get">--}}
{{--                            <input type="text" value="" id="search" name="s" >--}}
{{--                            <button type="submit"><i class="icon-magnifier"></i></button>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end top-nav -->

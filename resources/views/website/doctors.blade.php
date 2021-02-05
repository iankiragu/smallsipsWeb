@extends('layouts.website')

@section('content')
    {{--    <div class="ui-title-page bg_title bg_transparent">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-xs-12">--}}
    {{--                    <h1>OUR DOCTORS</h1>--}}
    {{--                    <div class="ui-subtitle-page">Egestas dolor erat vamus suscip ipsum estduin</div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- end ui-title-page -->


    <main class="main-content">
        <section class="section-doctors">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block text-center">Meet Our Team <strong>Of Experienced Doctors</strong></h2>
                        <div class="ui-subtitle-block">Our medical specialists care about you & your family’s health</div>
                    </div>
                </div><!-- end row -->
                {{--                <i class="decor-brand decor-brand_mrg-0"></i>--}}
            </div><!-- end container -->



        </section><!-- end section -->


        <div class="slider_team slider_team_filter wow bounceInUp" data-wow-delay=".5s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2"
                         style="{{count($specs) > 7 ? 'margin-bottom: 100px;' : null}}">
                        <ul id="filter" class="clearfix">
                            <li>
                                <a href=""
                                   class="current"
                                   style="margin-bottom: 20px;" data-filter="*">All
                                </a>
                            </li>
                            @foreach($specs as $spec)
                                <li>
                                    <a href=""
                                       class="{{($specs->first()->specialization->name === $spec->specialization->name ? '' : null)}}"
                                       style="margin-bottom: 20px;" data-filter=".{{strtolower(preg_replace("/[^a-zA-Z]+/", "", $spec->specialization->name))}}">{{ucwords(strtolower($spec->specialization->name))}}
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="isotope-frame">
                            <div class="isotope-filter">
                                @foreach($specs as $spec)
                                    <div class="isotope-item {{strtolower(preg_replace("/[^a-zA-Z]+/", "", $spec->specialization->name))}}">
                                        <div class="slide">
                                            <a class="helper">
                                                <img style="height: 200px;" src="{{asset('uploads/images/').'/'.$spec->profile_picture}}" height="10px" alt="Doctor">
                                            </a>
{{--                                            <img src="{{asset('uploads/images/').'/'.$spec->profile_picture}}" height="250" width="270" alt="Foto">--}}
                                            <span class="name">Dr. {{$spec->first_name.' '.$spec->last_name}}</span>
                                            <span class="category">{{ucwords(strtolower($spec->specialization->name))}}</span>
                                            <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>
                                        </div>
                                    </div>
                                @endforeach
                            <!-- end isotope-item -->
                                {{--                                <div class="isotope-item cardiology">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/2.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Robert Smith</span>--}}
                                {{--                                        <span class="category">HEART SURGON</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item surgeons">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/4.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Sharon Laura</span>--}}
                                {{--                                        <span class="category">FAMILY PHYSICIAN</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item staff">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/3.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Andrea Jean</span>--}}
                                {{--                                        <span class="category">SENIOR NURSE</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item cardiology">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/5.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Andrea Jean</span>--}}
                                {{--                                        <span class="category">CANCER SPECIALIST</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item surgeons">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/7.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Andrea Jean</span>--}}
                                {{--                                        <span class="category">FAMILY PHYSICIAN</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item nurses">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/6.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Carol Sandra</span>--}}
                                {{--                                        <span class="category">HEART SURGON</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="isotope-item physicians">--}}
                                {{--                                    <div class="slide">--}}
                                {{--                                        <img src="{{asset('website/media/slider_team/8.jpg')}}" height="250" width="270" alt="Foto">--}}
                                {{--                                        <span class="name">Dr. Andrea Jean</span>--}}
                                {{--                                        <span class="category">SENIOR NURSE</span>--}}
                                {{--                                        <a href="javascript:void(0);" class="btn btn_small">BOOK AN APPOINTMENT</a>--}}
                                {{--                                        <ul class="social-links social-links_right">--}}
                                {{--                                            <li><a target="_blank" href="https://www.facebook.com/"><i class="social_icons social_facebook_square"></i></a></li>--}}
                                {{--                                            <li class=""><a target="_blank" href="https://twitter.com/"><i class="social_icons social_twitter_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.google.com/"><i class="social_icons social_googleplus_square"></i></a></li>--}}
                                {{--                                            <li><a target="_blank" href="https://www.linkedin.com/"><i class="social_icons social_linkedin_square"></i></a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div><!-- end isotope-filter -->
                        </div><!-- end isotope-frame -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end slider_team -->
    </main><!-- end main-content -->


@endsection

@section('footer-option')
    <div class="footer__block clearfix">
        <div class="block__wrap pull-left">
            <p class="block__title"><i class="block__icon icon-note"></i>Do you wanna be part of our doctors team?</p>
            <p class="block__text">JUST REGISTER AS A DOCTOR & YOU’RE DONE!</p>
        </div>
        <a class="block__btn btn bg-color_second pull-right" href="{{route('backend.register.user')}}">REGISTER <span class="btn-plus">+</span></a>
    </div>
@endsection

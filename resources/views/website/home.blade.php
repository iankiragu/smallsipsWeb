@extends('layouts.website')

@section('content')
    <div id="iview" class="main-slider">
        <div data-iview:thumbnail="{{asset('website/media/slider_main/slider_1.jpg')}}" data-iview:image="{{asset('website/media/slider_main/slider_1.jpg')}}" data-iview:transition="block-drop-random" >
            <div class="container">
                <div class="iview-caption bg-no-caption" data-x="850" data-y="43" data-transition="expandRight">
                    <div class="custom-caption">
                        <p class="slide-title bg-color_second">A Team Of Medical Professionals</p>
                        <p class="slide-title_second">To Take Care Of Your Health</p>
{{--                        <p class="slide-text">Sed posuere nunc libero pellentesque vitae</p>--}}
{{--                        <p class="slide-text">Vestibulum tincidunt ante ipsum</p>--}}
{{--                        <a href="javascript:void(0);" class="btn bg-color_primary">VIEW SERVICES <span class="btn-plus">+</span></a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div data-iview:thumbnail="{{asset('website/media/slider_main/2.jpg')}}" data-iview:image="{{asset('website/media/slider_main/slider_2.jpg')}}" data-iview:transition="block-drop-random" >
            <div class="container">
                <div class="iview-caption  bg-no-caption" data-x="260" data-y="293" data-transition="expandLeft">
                    <div class="custom-caption">
                        <p class="slide-title bg-color_second">A Wide Range of Medical Facilities</p>
                        <p class="slide-title_second">To Ensure You Are Covered</p>
{{--                        <p class="slide-text">Sed posuere nunc libero pellentesque vitae</p>--}}
{{--                        <p class="slide-text">Vestibulum tincidunt ante ipsum</p>--}}
{{--                        <a href="javascript:void(0);" class="btn bg-color_primary">VIEW SERVICES <span class="btn-plus">+</span></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end iview -->

    <div class="container">
        <div class="block-hourse bg bg_1 bg_transparent wow zoomIn" data-wow-delay="1s">
            <div class="row">
                <div class="col-md-6">
                    <div class="block-hourse__inner block-hourse__inner_first">
                        <p class="block-hourse__text"><i class="icon icon-note"></i>Need a Doctor for Check-up?</p>
                        <p class="block-hourse__title">JUST MAKE AN APPOINTMENT</p>
                        <a class="btn btn_transparent" href="{{ route('website.appointments') }}">GET AN APPOINTMENT</a> </div>
                </div>
                <section class="col-md-6">
                    <div class="block-hourse__inner block-hourse__inner_second">
                        <div class="block-hourse__title-table"><i class="icon icon-clock"></i>OPENING HOURS</div>
                        <table>
                            <tbody>
                            <tr>
                                <td>Monday - Friday</td>
                                <td><span class="line-bottom"></span></td>
                                <td>08:00am - 10:00pm</td>
                            </tr>
                            <tr>
                                <td>Saturday - Sunday</td>
                                <td><span class="line-bottom"></span></td>
                                <td>09:00am - 06:00pm</td>
                            </tr>
                            <tr>
                                <td>Emergency Services</td>
                                <td><span class="line-bottom"></span></td>
                                <td>24 hours Open</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <!-- end row -->
        </div>
        <!-- end block-hourse -->
    </div>
    <!-- end container -->

    <section class="advantages wow fadeInUp" data-wow-delay="1.5s">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="ui-title-block">Welcome to <strong class="font-weight_600">TRIBORE </strong><span class="font-weight-norm color_primary">HEALTH</span></h1>
                    <div class="ui-subtitle-block">We do care about you & your family’s health</div>
                </div>
                <section class="advantages__inner col-sm-4"> <i class="icon flaticon-medical51 color_second"></i>
                    <h2 class="ui-title-inner">HealthCare Professionals</h2>
                    <i class="decor-brand"></i>
                    <p class="ui-text text-center">We provide you with the best healthcare professionals remotely, at the comfort of your house.</p>
{{--                    <a class="btn btn_small" href="javascript:void(0);">LEARN MORE</a> --}}
                </section>
                <section class="advantages__inner col-sm-4"> <i class="icon flaticon-medical109 color_second"></i>
                    <h2 class="ui-title-inner">Medical Excellence</h2>
                    <i class="decor-brand"></i>
                    <p class="ui-text text-center">We as Tribore will ensure that you have the best experience even in the midst of this pandemic. Your safety is our priority</p>
{{--                    <a class="btn btn_small" href="javascript:void(0);">LEARN MORE</a> --}}
                </section>
                <section class="advantages__inner col-sm-4"> <i class="icon flaticon-healthcare6 color_second"></i>
                    <h2 class="ui-title-inner">Emergency Response</h2>
                    <i class="decor-brand"></i>
                    <p class="ui-text text-center">We assure you that we will make it easy for you to get emergency response services no matter where you are. We are with you always.</p>
{{--                    <a class="btn btn_small" href="javascript:void(0);">LEARN MORE</a> --}}
                </section>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end advantages -->


    <section class="section-large">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="ui-title-block text-center">Easy Access To Remote<strong> Health Care Services</strong></h2>
{{--                    <div class="ui-subtitle-block"></div>--}}
                    <i class="decor-brand"></i> </div>
            </div>
            <div class="row">
                <div class="col-xs-12  text-center">
                    <div class="departments-item wow bounceInLeft" data-wow-delay="1s">
                        <span class="icon-round bg-color_second helper"><i class="icon flaticon-medical109"></i></span>
                        <h3 class="ui-title-inner">HOSPITALS</h3>
{{--                        <p class="ui-text">Justo laoreet dignis sim lectus duic etiamd ipsum habitant tristique nam est. Donec venenatis leo eu varius curus da metus nunc placerat cursus  [...]</p>--}}
                        <a class="btn btn_small" href="{{route('website.hospitals')}}">VIEW MORE</a>
                    </div>
                    <div class="departments-item wow bounceInLeft" data-wow-delay="1s">
                        <span class="icon-round bg-color_second helper"><i class="icon flaticon-heart8"></i></span>
                        <h3 class="ui-title-inner">EMERGENCY RESPONSE</h3>
{{--                        <p class="ui-text">Justo laoreet dignis sim lectus duic etiamd ipsum habitant tristique nam est. Donec venenatis leo eu varius curus da metus nunc placerat cursus  [...]</p>--}}
                        <a class="btn btn_small" href="{{route('website.maps')}}">VIEW MAPS</a>
                    </div>
                    <div class="departments-item wow bounceInLeft" data-wow-delay="1s">
                        <span class="icon-round bg-color_second helper"><i class="icon flaticon-lungs4"></i></span>
                        <h3 class="ui-title-inner">DOCTORS</h3>
{{--                        <p class="ui-text">Justo laoreet dignis sim lectus duic etiamd ipsum habitant tristique nam est. Donec venenatis leo eu varius curus da metus nunc placerat cursus  [...]</p>--}}
                        <a class="btn btn_small" href="{{route('website.doctors')}}">VIEW MORE</a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end section -->

{{--    <section class="slider-reviews section-large slider-reviews_1-col bg bg_7 bg_transparent">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12">--}}
{{--                    <h2 class="ui-title-block text-center">What Our <strong>Patients Are Saying</strong></h2>--}}
{{--                    <div class="ui-subtitle-block text-center">Purus sapien consequat vitae sagittis ut facilisis arcu</div>--}}
{{--                    <i class="decor-brand"></i> </div>--}}
{{--                <div class="col-md-11">--}}
{{--                    <ul class="bxslider"--}}
{{--                        data-max-slides="1"--}}
{{--                        data-min-slides="1"--}}
{{--                        data-width-slides="1000"--}}
{{--                        data-margin-slides="0"--}}
{{--                        data-auto-slides="false"--}}
{{--                        data-move-slides="1"--}}
{{--                        data-infinite-slides="false"--}}
{{--                        data-controls="false" >--}}
{{--                        <li class="slide">--}}
{{--                            <div class="info"> <img class="avatar" src="{{asset('website/media/avatar_reviews/1.jpg')}}" height="130" width="130" alt="Avatar"> <span class="name">Vettle Smith</span> <span class="categories">Kidney Patient</span> <span class="categories">Australia</span> </div>--}}
{{--                            <div class="quote">--}}
{{--                                <blockquote> Etiam feugiat libero et sapien. Donec rutrum neque ac congue venenatis lorem ipsum pulvinar leo sollicitudin metus massa non velit. Maecenas elementum. In a nulla. Mauris metus turpis iaculis hendrerit vel pretium non, magna. Morbi elit ipsum mattis vitae placerat ut volutpat eget nisi. Aenean vel lectus alc orci elementum tincidunt. Quisque vel ante quis massa tristique iaculis. Aenean auctor lorem a felis. Nunc tempus mauris et lectus. Sed at tortor aenean erat orci sed ipsum mollis quis. </blockquote>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="slide">--}}
{{--                            <div class="info"> <img class="avatar" src="{{asset('website/media/avatar_reviews/1.jpg')}}" height="130" width="130" alt="Avatar"> <span class="name">Vettle Smith</span> <span class="categories">Kidney Patient</span> <span class="categories">Australia</span> </div>--}}
{{--                            <div class="quote">--}}
{{--                                <blockquote>--}}
{{--                                    <p>Etiam feugiat libero et sapien. Donec rutrum neque ac congue venenatis lorem ipsum pulvinar leo sollicitudin metus massa non velit. Maecenas elementum. In a nulla. Mauris metus turpis iaculis hendrerit vel pretium non, magna. Morbi elit ipsum mattis vitae placerat ut volutpat eget nisi. Aenean vel lectus alc orci elementum tincidunt. Quisque vel ante quis massa tristique iaculis. Aenean auctor lorem a felis. Nunc tempus mauris et lectus. Sed at tortor aenean erat orci sed ipsum mollis quis.</p>--}}
{{--                                </blockquote>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="slide">--}}
{{--                            <div class="info"> <img class="avatar" src="{{asset('website/media/avatar_reviews/1.jpg')}}" height="130" width="130" alt="Avatar"> <span class="name">Vettle Smith</span> <span class="categories">Kidney Patient</span> <span class="categories">Australia</span> </div>--}}
{{--                            <div class="quote">--}}
{{--                                <blockquote>--}}
{{--                                    <p>Etiam feugiat libero et sapien. Donec rutrum neque ac congue venenatis lorem ipsum pulvinar leo sollicitudin metus massa non velit. Maecenas elementum. In a nulla. Mauris metus turpis iaculis hendrerit vel pretium non, magna. Morbi elit ipsum mattis vitae placerat ut volutpat eget nisi. Aenean vel lectus alc orci elementum tincidunt. Quisque vel ante quis massa tristique iaculis. Aenean auctor lorem a felis. Nunc tempus mauris et lectus. Sed at tortor aenean erat orci sed ipsum mollis quis.</p>--}}
{{--                                </blockquote>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="slide">--}}
{{--                            <div class="info"> <img class="avatar" src="{{asset('website/media/avatar_reviews/1.jpg')}}" height="130" width="130" alt="Avatar"> <span class="name">Vettle Smith</span> <span class="categories">Kidney Patient</span> <span class="categories">Australia</span> </div>--}}
{{--                            <div class="quote">--}}
{{--                                <blockquote>--}}
{{--                                    <p>Etiam feugiat libero et sapien. Donec rutrum neque ac congue venenatis lorem ipsum pulvinar leo sollicitudin metus massa non velit. Maecenas elementum. In a nulla. Mauris metus turpis iaculis hendrerit vel pretium non, magna. Morbi elit ipsum mattis vitae placerat ut volutpat eget nisi. Aenean vel lectus alc orci elementum tincidunt. Quisque vel ante quis massa tristique iaculis. Aenean auctor lorem a felis. Nunc tempus mauris et lectus. Sed at tortor aenean erat orci sed ipsum mollis quis.</p>--}}
{{--                                </blockquote>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- end slider-reviews -->
@endsection

@section('footer-option')
    <div class="footer__block clearfix">
        <div class="block__wrap pull-left">
            <p class="block__title"><i class="block__icon icon-note"></i>Need a Doctor for Check-up?</p>
            <p class="block__text">JUST MAKE AN APPOINTMENT & YOU’RE DONE!</p>
        </div>
        <a id="appointment-link" class="block__btn btn bg-color_second pull-right" href="{{route('website.appointments')}}">GET AN APPOINTMENT <span class="btn-plus">+</span></a>
    </div>
@endsection

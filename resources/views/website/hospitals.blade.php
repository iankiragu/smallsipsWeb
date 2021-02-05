@extends('layouts.website')

@section('content')
{{--    <div class="ui-title-page bg_title bg_transparent">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12">--}}
{{--                    <h1>ONLINE shop</h1>--}}
{{--                    <div class="ui-subtitle-page">Egestas dolor erat vamus suscip ipsum estduin</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- end ui-title-page -->

    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <aside class="sidebar">
                    <div class="widget widget-search" style="display: none">
                        <form method="get" class="form-search clearfix" id="search-global-form">
                            <input class="form-search__input" type="text" name="" id="search2" placeholder="Search Hospitals">
                            <button class="form-search__submit" type="submit"><i class="icon icon-magnifier"></i></button>
                        </form>
                    </div><!-- end widget-search -->

                    <div class="widget widget-category">
                        <h3 class="widget-title">Towns</h3>
                        <div class="block_content">
                            <ul class="list-categories list-categories_widget">
                                @foreach($towns as $town)
                                    <li><a href="{{route('website.hospitals',['town'=>$town->id])}}"><span class="list-categories__name">{{ucwords(strtolower($town->name))}}</span><span class="list-categories__amout color_primary">{{count($town->hospitals)}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- end widget-category -->
                </aside><!-- end sidebar -->
            </div><!-- end col -->


            <div class="col-md-9">
                <main class="main-content">
                    <div class="row" style="display: none">
                        <div class="col-md-12">
                            <div class="sorting-title">
                                Sort By:
                                <div role="select" class="jelect">
                                    <input id="jelect" name="tool" value="0" data-text="imagemin" type="text" class="jelect-input">
                                    <div tabindex="0" role="button" class="jelect-current">Select By Towns</div>
                                    <ul class="jelect-options">
                                        <li data-val='0' tabindex="0" role="option" class="jelect-option jelect-option_state_active">Hospital A</li>
                                        <li data-val='1' tabindex="0" role="option" class="jelect-option">Hospital B</li>
                                        <li data-val='2' tabindex="0" role="option" class="jelect-option">Hospital C</li>
                                    </ul>
                                </div>
                            </div><!-- end sorting-title -->
                        </div><!-- end col -->
                    </div><!-- end row -->


                    <ul class="products" style="margin-top: 90px;">
                        @foreach($hospitals as $hospital)
                            <li class="products__item wow bounceInRight" data-wow-delay=".5s">
                                <a class="products__foto helper" href="shop-product.html">
                                    <img src="{{asset('website/media/hospitals/default_one.jpg')}}" height="226" width="226" alt="Goods">
                                </a>
                                <h4 class="products__name">
                                    <a href="#">{{ucwords(strtolower($hospital->name))}}</a>

                                </h4>
{{--                                <div class="products__info ui-text">Pellentesque vitae ultrice posu praesent justo laoret sed dignis</div>--}}
                            </li>
                        @endforeach
                    </ul><!-- end products -->

                    <div class="text-center">
                        <ul class="pagination">
                            {!! $hospitals->links() !!}
{{--                            <li><a href="javascript:void(0);">Previous</a></li>--}}
{{--                            <li><a href="javascript:void(0);">1</a></li>--}}
{{--                            <li><a href="javascript:void(0);">2</a></li>--}}
{{--                            <li><a href="javascript:void(0);">3</a></li>--}}
{{--                            <li><a href="javascript:void(0);">Next</a></li>--}}
                        </ul>
                    </div>
                </main>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
@endsection

@section('footer-option')
    <div class="footer__block clearfix">
        <div class="block__wrap pull-left">
            <p class="block__title"><i class="block__icon icon-note"></i>Do you wanna be part of our doctors team?</p>
            <p class="block__text">JUST REGISTER AS A DOCTOR & YOU’RE DONE!</p>
        </div>
        <a class="block__btn btn bg-color_second pull-right" href="javascript:void(0);">REGISTER <span class="btn-plus">+</span></a>
    </div>
@endsection

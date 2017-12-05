<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Provider Section</title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="{{asset('front/js/jquery.js')}}" type="text/javascript"></script>
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{asset('front/custom-font/fonts.css')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}" />
    <!-- Bootsnav -->
    <link rel="stylesheet" href="{{asset('front/css/bootsnav.css')}}">
    <!-- Fancybox -->
    <link href="{{asset('front/css/partner-slider.css')}}" type="text/css" rel="stylesheet" media="screen" />
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/job-seeker-dashboard.css')}}">
    <script src="{{asset('front/js/partner-slider.js')}}" type="text/javascript"></script>
</head>
<body>
<!-- <div class="container"> -->
<!-- Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
</div>

<header>
    <!-- Top Navbar -->
    <div class="top_nav navbar-fixed-top">
        <div class="container">
            <?php
            // get quick contact info
            $top_info = DB::table('header_top_contact')->where('id', 1)->first();
            ?>
            <ul class="list-inline info">
                <li><a href="#"><span class="fa fa-phone"></span> {{$top_info->phone}}</a></li>
                <li><a href="mailto:{{$top_info->email}}"><span class="fa fa-envelope"></span> {{$top_info->email}}</a></li>
                <li><a href="#"><span class="fa fa-clock-o"></span> {{$top_info->work_time}}</a></li>
                <li>Choose Your Language: &nbsp;</li>
                  <li>
                            <a href="#" onclick="chLang(event,'en')">
                                <img src="{{asset('img/english.png')}}" style="width: 32px"> English
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="chLang(event,'km')"> <img src="{{asset('img/khmer.png')}}" style="width: 32px"> ខ្មែរ</a>
                        </li>
            </ul>
            <ul class="list-inline social_icon">
                <li><a href="https://www.facebook.com/HRAngkor/" target="_blank"><span class="fa fa-facebook"></span></a></li>
                <li><a href="https://www.linkedin.com/in/hr-angkor-48446714a/" target="_blank"><span class="fa fa-linkedin"></span></a></li>

            </ul>
        </div>
    </div><!-- Top Navbar end -->

    <!-- Navbar -->
    <nav class="navbar bootsnav navbar-fixed-top">
        <div class="container">
            <!-- Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <?php
                // get website logo
                $logo = DB::table('logos')
                    ->where('id',1)
                    ->first();
                ?>
                <a class="navbar-brand" href="{{url('/')}}"><img class="logo" src="{{asset('img/'.$logo->photo)}}" alt=""></a>
            </div>
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav menu">
                    <li><a href="{{url('/')}}">{{trans('labels.home')}}</a></li>
                    <li><a href="{{url('/job/list')}}">{{trans('labels.job_list')}}</a></li>
                    <li>
                        <a class="dropdown-toggle service-menu" data-toggle="dropdown">
                            {{trans('labels.service')}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu border-radius-none">
                            <li><a href="{{url('/page/4')}}">{{trans('labels.recruitment')}}</a></li>
                            <li><a href="{{url('/page/3')}}">{{trans('labels.training')}}</a></li>
                            <li><a href="{{url('/page/8')}}">{{trans('labels.others')}}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('/page/2')}}">{{trans('labels.about_us')}}</a></li>
                    <li><a href="{{url('/page/1')}}">{{trans('labels.contact_us')}}</a></li>
                    <li><a href="{{url('/page/10')}}">{{trans('labels.how_to_use')}}</a></li>
                </ul>
                <ul class="nav navbar-nav menu-right">
                    
                    <li>
                        <div class="dropdown dropdown-custom">
                            <button class="btn btn-warning border-radius-none dropdown-toggle" type="button" data-toggle="dropdown"> {{trans('labels.job_seeker')}}
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu border-radius-none">
                                <li><a href="{{url('/seeker/login')}}">{{trans('labels.login')}}</a></li>
                                <li><a href="{{url('/seeker/register')}}">{{trans('labels.register')}}</a></li>
                            </ul>
                        </div>
                    </li>
                   
                    &nbsp;&nbsp;
                    @if(Session::has('employer'))
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-success border-radius-none dropdown-toggle" type="button" data-toggle="dropdown"> {{session('employer')->username}}
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu border-radius-none">
                                <li><a href="{{url('/employer/logout')}}">{{trans('labels.logout')}}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav><!-- Navbar end -->
</header><!-- Header end -->
<section>
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('front/images/slider_img.png')}}" alt="Construction">
                <div class="overlay">
                    <div class="carousel-caption">
                        <h2>{{trans('labels.the_way')}}</h2>
                        {{--  <h4>We Offer 2033 job Vocation Right Now</h4>  --}}
                        <br><br>
                        <div class="col-xs-8 col-xs-offset-2">
                            <form action="{{url('/job/search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control search_job border-radius-none" name="q" id="q" placeholder="Keyword, Position, Location...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-warning border-radius-none" type="submit">{{trans('labels.search')}}</button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Carousel-inner end -->
    </div><!-- Carousel end-->
</section>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12" style="padding-left:0">
               <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="orange bold">{{trans('labels.manage_account')}}</span>
                        </div>
                        <div class="panel-body">
                            <p><a href="{{url('/employer')}}">{{trans('labels.my_profile')}}</a></p>
                            <p><a href="{{url('/employer/subscription')}}">{{trans('labels.my_subscription')}}</a></p>
                            <p><a href="{{url('/employer/job')}}">{{trans('labels.my_job')}}</a></p>
                            <p><a href="{{url('/employer/company')}}">{{trans('labels.my_company')}}</a></p>
                            <p><a href="{{url('/employer/search/cv')}}">{{trans('labels.find_cv')}}</a></p>
                            <p><a href="{{url('/employer/favorite')}}">{{trans('labels.favorite_cv')}}</a></p>
                            <p><a href="{{url('/employer/reset-password')}}">{{trans('labels.change_password')}}</a></p>
                            <p><a href="{{url('/employer/logout')}}">{{trans('labels.logout')}}</a></p>
                        </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                @yield('content')
                </div>
            </div>
        </div>
    </div>
<br>
 <div class="container">
        <div class="row">
            <div class="well-custom text-center bold orange our-partner">
                {{trans('labels.our_customer')}}
            </div>
            <div class="slide-partner-img">
                <div id="carousel0"  class="owl-carousel owl-theme">
                    <?php
                    // get customers
                    $customers = DB::table('partners')
                            ->where('type', 'customer')
                            ->where('active',1)
                            ->orderBy('sequence')
                            ->get();
                ?>
                @foreach($customers as $cus)
                    <div class="item text-center">
                        <img src="{{asset('partners/'.$cus->logo)}}" alt="{{$cus->name}}" class="img-responsive" />
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
     <section class="container well-custom">
        <div class="row">
            <div class="col-sm-12">
            <?php
                // get bottom advertisement
                $bottom_ads = DB::table('advertisements')
                    ->where('active', 1)
                    ->where('position','Bottom')
                    ->orderBy('order_number')
                    ->get();
            ?>
                @foreach($bottom_ads as $bads)
                    <div class="col-md-2 col-sm-2 padding-top-and-button">
                        <img src="{{asset('ads/'.$bads->photo)}}">
                    </div>
                @endforeach
            </div>

        </div>
    </section>
<br>
<script type="text/javascript">
    $('#carousel0').owlCarousel({
        items: 6,
        autoPlay: 3000,
        navigation: true,
        navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
        pagination: true
    });
</script>
<!-- Footer -->
<footer>
    <!-- Footer top -->
    <div class="container footer_top">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer_item">
                    <h4>{{trans('labels.hot_line')}}</h4>
                    <ul class="list-unstyled footer_contact">
                        <li><a href="#"><span class="fa fa-map-marker"></span> {{trans('labels.com_address')}}</a></li>
                        <li><a href="mailto:info@hrangkor.com"><span class="fa fa-envelope"></span> {{$top_info->email}}</a></li>
                        <li><a href="#"><span class="fa fa-mobile"></span> {{$top_info->phone}}</a></li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer_item">
                    <h4>{{trans('labels.for_employer')}}</h4>
                    <ul class="list-unstyled footer_menu">
                        <li><a href="{{url('/employer/job/create')}}">{{trans("labels.post_job")}}</a></li>
                        <li><a href="{{url('/employer/search/cv')}}">{{trans("labels.search_resume")}}</a></li>
                        <li><a href="{{url('/page/9')}}">{{trans("labels.ads_with_us")}}</a></li>
                        <li><a href="{{url('/page/11')}}">{{trans("labels.payment_method")}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer_item">
                    <h4>{{trans("labels.for_job_seeker")}}</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/job/list')}}">{{trans("labels.find_job")}}</a></li>
                        <li><a href="{{url('/seeker/cv')}}">{{trans("labels.create_cv")}}</a></li>
                        <li><a href="{{url('/page/3')}}">{{trans("labels.training")}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer_item">
                    <h4>{{trans("labels.helpful_resources")}}</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/page/1')}}">{{trans("labels.contact_us")}}</a></li>
                        <li><a href="{{url('/page/7')}}">{{trans("labels.term_and_condition")}}</a></li>
                        <li><a href="{{url('/page/5')}}">{{trans("labels.fqa")}}</a></li>
                        <li><a href="{{url('/page/6')}}">{{trans("labels.help")}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
                <p>
                     <div class="fb-share-button" data-href="http://hrangkor.com/" data-layout="button" data-size="large" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhrangkor.com%2F&amp;src=sdkpreparse">Share</a></div>
                </p>
            </div>
        </div>
    </div><!-- Footer top end -->

    <!-- Footer bottom -->
    <div class="footer_bottom text-center">
        <p class="wow fadeInRight">
            <a target="_blank" href="#">HR Angkor</a> &copy;
            2017. All Rights Reserved
        <ul class="list-inline footer_social_icon">
            <li><a href="https://www.facebook.com/HRAngkor/" target="_blank"><span class="fa fa-facebook"></span></a></li>
            <li><a href="https://www.linkedin.com/in/hr-angkor-48446714a/" target="_blank"><span class="fa fa-linkedin"></span></a></li>
        </ul>
        </p>
    </div><!-- Footer bottom end -->
</footer><!-- Footer end -->
<!-- </div> -->
<!-- JavaScript -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

<script src="{{asset('front/js/jquery.fancybox.js?v=2.1.5')}}"></script>

<script src="{{asset('front/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
    <script>
        function chLang(evt, ln)
        {
            evt.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/')}}" + "/language/" + ln,
                success: function(sms){
                    if(sms>0)
                    {
                        location.reload();
                    }
                }
            });
        }
    </script>
@yield('js')
</body>
</html>
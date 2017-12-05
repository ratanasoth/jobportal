@extends('layouts.front')
@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="categroy-list">
                    <div class="panel-body panel-body-costum">
                        <div id="trapezoid">
                            <div class="label-by-category bold orange">{{$page->title}}</div>
                        </div><br>
                        <div class="col-md-12">
                            <p>{!!$page->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-body panel-body-costum">
                    <div id="trapezoid">
                        <div class="label-by-category bold blue">{{trans('labels.partner')}}</div>
                    </div><br>
                    <?php 
                        $partners = DB::table('partners')
                        ->where('type', 'partner')
                        ->where('active',1)
                        ->orderBy('sequence')
                        ->get();
                    ?>
                    @foreach($partners as $p)
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="featured-employee">
                             <img src="{{asset('partners/'.$p->logo)}}">
                        </div>
                    </div>
                    @endforeach
                   
                </div><br>
                <div class="panel panel-default">
                <?php
                    // get right advertisement
                    $right_ads = DB::table('advertisements')
                        ->where('active', 1)
                        ->where('position','Right')
                        ->orderBy('order_number')
                        ->get();
                ?>
                    @foreach($right_ads as $ads)
                    <div class="panel-body padding-button-none">
                        <img src="{{asset('ads/'.$ads->photo)}}">
                    </div>
                    @endforeach
                    <div class="pd-bt"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('customer')
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
@endsection
@extends('layouts.front')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="panel panel-default border-radius-none">
                            <div class="panel-heading">
                                <h3 class="panel-title orange">Recovery Password</h3>
                            </div>
                            <div class="panel-body">
                                <p class="text-center text-danger">
                                    <strong>
                                        We are sorry, the mail service is not available!
                                        <br>
                                        Make sure you have published your website to hosting server correctly.
                                    </strong>
                                </p>
                                <p class="text-center">
                                    <a href="{{url('/')}}" class="btn btn-primary border-radius-none">Back Home</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="panel-body panel-body-costum">
                            <div id="trapezoid">
                                <div class="label-by-category bold blue">PARTNER</div>
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
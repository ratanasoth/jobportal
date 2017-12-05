@extends('layouts.front')
@section('content')
    <style>
        .form-group{
            margin-bottom: 3px;
        }
        label.control-label{
            font-size: 13px;
            font-weight: normal;
        }
        .stxt{
            font-size: 12px;
            font-weight: bold;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="panel-body panel-body-costum">
                            <div id="trapezoid">
                                <div class="label-by-category bold orange">{{trans('labels.job_category')}}</div>
                            </div><br>
                            <ul class="nav-link">
                                @foreach($categories as $cat)
                                    <li><a href="{{url('/category/'.$cat->id)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="panel-body panel-body-costum">
                            <div id="trapezoid">
                                <div class="label-by-category bold orange">{{trans('labels.job_detail')}}</div>
                            </div><br>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="job-title new-job">
                                        {{$job->job_title}}
                                        <hr>
                                        </p>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3">{{trans('labels.category')}}</label>
                                        <div class="col-sm-9 stxt">
                                            : {{$job->catname}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3">{{trans('labels.company')}}</label>
                                        <div class="col-sm-9 stxt">
                                            : {{$job->cname}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3">{{trans('labels.location')}}</label>
                                        <div class="col-sm-9 stxt">
                                            : {{$job->location}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3">{{trans('labels.job_type')}}</label>
                                        <div class="col-sm-9 stxt">
                                            : {{$job->job_type}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.hiring')}}</label>
                                        <div class="col-sm-8 stxt text-info">
                                            : {{$job->hire}} Post(s)
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.gender')}}</label>
                                        <div class="col-sm-8 stxt">
                                            : {{$job->gender}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.posting_date')}}</label>
                                        <div class="col-sm-8 stxt">
                                            : {{date_format(date_create($job->create_at), "Y-m-d")}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.closing_date')}}</label>
                                        <div class="col-sm-8 stxt text-danger">
                                            : {{$job->closing_date}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="job-title new-job">
                                        <br>
                                        {{trans('labels.job_description')}}
                                    <hr>
                                    </p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $job->description !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="job-title new-job">
                                        <br>
                                        {{trans('labels.job_requirement')}}
                                    <hr>
                                    </p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $job->requirement !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="job-title new-job">
                                        <br>
                                        {{trans('labels.contact_info')}}
                                        <hr>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2">{{trans('labels.contact_person')}}</label>
                                        <div class="col-sm-8 stxt ">
                                            : {{$job->first_name . ' ' . $job->last_name}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2">{{trans('labels.email')}}</label>
                                        <div class="col-sm-8 stxt ">
                                            : {{$job->email}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2">{{trans('labels.phone')}}</label>
                                        <div class="col-sm-8 stxt ">
                                            : {{$job->phone}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2">{{trans('labels.address')}}</label>
                                        <div class="col-sm-8 stxt ">
                                            : {{$job->address}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="job-title new-job">
                                        <br>
                                        {{trans('labels.company_profile')}}
                                    <hr>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-center"><strong>{{$job->cname}}</strong></p>
                                    <p class="text-justify">
                                        {!! $job->profile !!}
                                    </p>
                                </div>
                            </div>
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
@extends('layouts.employer')
@section('content')
    <style>
       .px p{
            margin-bottom: 5px;
        }
        .colx{
            padding-right: 6px;
            padding-left: 6px;
        }
    </style>
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.my_subscription')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            @if(Session::has('sms'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        {{session('sms')}}
                    </div>
                </div>
            @endif
                @if(Session::has('sms1'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        {{session('sms1')}}
                    </div>
                </div>
            @endif
            @if($counter<=0)
                <div class="row">
                    <div class="col-sm-12">
                        <strong class="text-danger">
                        @if(session('lang')=='en')
                            You don't have a subscription yet. Please do subscribe one of the following packages to be able post jobs.
                        @else
                            លោកអ្នកមិនទាន់បានទិញគម្រោងណាមួយនៅឡើយទេ។ សូមទិញគម្រោងណាមួយនៅខាងក្រោមនេះ។                            
                        @endif
                        </strong>
                        <p></p>
                    </div>
                </div>
            @else
                <div class="row px">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>{{trans('labels.package_name')}}: <strong>{{$subscription->name}}</strong></p>
                                <p>{{trans('labels.price')}}: <strong>$ {{$subscription->price}}</strong></p>
                                <p>{{trans('labels.plan_type')}}: <strong>{{$subscription->type}}</strong></p>
                                <p>{{trans('labels.total_job')}}: <strong>{{$subscription->job_number}}</strong></p>
                                <p>{{trans('labels.status')}}: <strong>{{$subscription->status==0?'Pending':'Approved'}}</strong></p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{trans('labels.duration')}}: <strong>{{$subscription->day_number}} days</strong></p>
                                <p>{{trans('labels.expired_on')}}: <strong>{{$subscription->expired_date}}</strong></p>
                                <p>{{trans('labels.job_remaining')}}: <strong>{{$subscription->job_number - $job_count}}</strong></p>
                                <p>{{trans('labels.download')}} #: <strong>{{$subscription->download}}</strong></p>
                                <form action="{{url('/employer/unsubscribe')}}" onsubmit="return confirm('You want to unsubscribe?')" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="id" value="{{$subscription->id}}">
                                    <input type="submit" value="{{trans('labels.unsubscribe')}}" class="btn btn-danger border-radius-none">
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endif
            <div class="row px">
                <div class="col-lg-12 col-sm-12">
                    @foreach($packages as $package)
                    <div class="col-lg-3 col-sm-3 colx">
                        <div class="panel panel-default border-radius-none">
                            <div class="panel-heading text-center bold panel-header-custom">{{$package->name}}</div>
                            <div class="panel-body">
                                <p>{{trans('labels.price')}} : <label class="padding-button-none label label-danger">$ {{$package->price}} </label></p>
                                <p>{{trans('labels.total_job')}}: {{$package->job_number}}</p>
                                <p>{{trans('labels.duration')}}: {{$package->day_number}}</p>
                                <p>{{trans('labels.download')}} #: {{$package->download}}</p>
                                <p>{{trans('labels.plan_type')}}: {{$package->type}}</p>
                            </div>
                            <div class="panel-footer panel-footer-custom">
                                @if($subscription)
                                    <form action="{{url('/employer/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                        {{csrf_field()}}
                                        <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                        <input type="submit" class="border-radius-none btn btn-success form-control" value="{{trans('labels.subscribe')}}" {{$package->id==$subscription->package_id?'disabled':''}}>
                                    </form>
                                @else
                                    <form action="{{url('/employer/subscribe')}}" method="post" onsubmit="return confirm('You want to subscribe?')">
                                        {{csrf_field()}}
                                        <input type="hidden" id="package" name="package" value="{{$package->id}}">
                                        <input type="submit" class="border-radius-none btn btn-success form-control" value="{{trans('labels.subscribe')}}">
                                    </form>

                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
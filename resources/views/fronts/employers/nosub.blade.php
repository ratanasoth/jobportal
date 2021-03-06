@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.create_new_job')}}</span></span>
        <a href="{{url('/employer/job')}}" class="btn btn-primary btn-xs border-radius-none pull-right">{{trans('labels.back_to_list')}}</a>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            <div class="row">
                <div class="col-sm-12">
                    <strong>You don't have a subscription yet. Please make a new subscription before posting a new job!</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
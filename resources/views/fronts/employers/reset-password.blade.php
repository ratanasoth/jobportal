@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.reset_my_password')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            <div class="row">
                <div class="col-sm-8">
                    @if(Session::has('sms'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success border-radius-none" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{session('sms')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger border-radius-none" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{session('sms1')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/employer/save-password')}}" class="form-horizontal" method="post">
                        <div class="form-group row">
                            <label for="password" class="control-label col-sm-4">{{trans('labels.new_password')}}</label>
                            <div class="col-sm-8">
                                <input type="password" id="password" name="password" class="form-control" required autofocus>
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpassword" class="control-label col-sm-4">{{trans('labels.confirm_password')}}</label>
                            <div class="col-sm-8">
                                <input type="password" id="cpassword" name="cpassword" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button class="btn btn-primary border-radius-none" type="submit">{{trans('labels.save_change')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
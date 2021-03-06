@extends('layouts.seeker')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.manage_my_profile')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
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
          
            <div class="row">
                <div class="col-md-6 col-sm-12">
                   
                    <div class="form-group row">
                        <label for="first_name" class="control-label col-sm-5">{{trans('labels.first_name')}}</label>
                        <div class="col-sm-7">
                            <p id="first_name">{{session('seeker')->first_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="control-label col-sm-5">{{trans('labels.last_name')}}</label>
                        <div class="col-sm-7">
                            <p id="last_name">{{session('seeker')->last_name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="control-label col-sm-5">{{trans('labels.gender')}}</label>
                        <div class="col-sm-7">
                            <p id="gender">{{session('seeker')->gender}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="control-label col-sm-5">{{trans('labels.dob')}}</label>
                        <div class="col-sm-7">
                            <p id="dob">{{session('seeker')->dob}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="control-label col-sm-5">{{trans('labels.photo')}}</label>
                        <div class="col-sm-7">
                            <img src="{{asset('uploads/photo/' .session('seeker')->profile_photo)}}" style="width: 72px;" alt="Photo">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="phone" class="control-label col-sm-5">{{trans('labels.phone')}}</label>
                        <div class="col-sm-7">
                            <p id="phone">{{session('seeker')->phone}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="control-label col-sm-5">{{trans('labels.email')}}</label>
                        <div class="col-sm-7">
                            <p id="email">{{session('seeker')->email}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="control-label col-sm-5">{{trans('labels.username')}}</label>
                        <div class="col-sm-7">
                            <p id="username">{{session('seeker')->username}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5">&nbsp;</label>
                        <div class="col-sm-7">
                            <a href="{{url('/seeker/edit/profile')}}" class="btn btn-warning border-radius-none">{{trans('labels.edit_profile')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.seeker')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.manage_my_profile')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
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
        <form name="frm" action="{{url('/seeker/update')}}" method="post" class="from-horizontal" onsubmit="return confirm('You want to save changes?')" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$seeker->id}}">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="first_name" class="control-label col-sm-5">{{trans('labels.first_name')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" required name="first_name" id="first_name" value="{{$seeker->first_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="control-label col-sm-5">{{trans('labels.last_name')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="last_name" name="last_name" required value="{{$seeker->last_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="control-label col-sm-5">{{trans('labels.gender')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male" {{$seeker->gender=='Male'?'selected':''}}>{{trans('labels.male')}}</option>
                                <option value="Female"  {{$seeker->gender=='Female'?'selected':''}}>{{trans('labels.female')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="control-label col-sm-5">{{trans('labels.dob')}}</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="dob" name="dob" 
                             value="{{$seeker->dob}}" placeholder="{{trans('labels.dd')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="control-label col-sm-5">{{trans('labels.photo')}} </label>
                        <div class="col-sm-7">
                            <input type="file" name="photo" id="photo" onchange="loadFile(event)">
                            <img src="{{asset('uploads/photo/' .$seeker->profile_photo)}}" style="width: 72px;" alt="Photo" id="preview">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="phone" class="control-label col-sm-5">{{trans('labels.phone1')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" required name="phone" value="{{$seeker->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone1" class="control-label col-sm-5">{{trans('labels.phone2')}}</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone1" name="phone1" value="{{$seeker->phone1}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="control-label col-sm-5">{{trans('labels.email')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" name="email" required value="{{$seeker->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="control-label col-sm-5">{{trans('labels.username')}} <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="username" name="username" value="{{$seeker->username}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5">&nbsp;</label>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-primary border-radius-none">{{trans('labels.save_change')}}</button>
                            <a href="{{url('/seeker')}}" class="btn btn-danger border-radius-none">{{trans('labels.cancel')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#dob").inputmask('99/99/9999');
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
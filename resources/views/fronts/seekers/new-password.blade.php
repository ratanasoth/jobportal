@extends('layouts.front')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="panel panel-default border-radius-none">
                            <div class="panel-heading">
                                <h3 class="panel-title orange">{{trans('labels.set_new_password')}}</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('/service/update')}}" class="form-horizontal" method="post" onsubmit="return check_password()">
                                    {{csrf_field()}}
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
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.new_password')}}</label>
                                        <div class="col-sm-8">
                                            <input type="password" id="password" name="password" class="form-control" required autofocus>
                                            <input type="hidden" id="id" name="id" value="{{$id}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">{{trans('labels.confirm_password')}}</label>
                                        <div class="col-sm-8">
                                            <input type="password" id="cpassword" name="cpassword" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4"></label>
                                        <div class="col-sm-8">
                                           <p id="sms" class="text-danger">
                                           </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-4">&nbsp;</label>
                                        <div class="col-sm-8">
                                            <button class="btn btn-primary border-radius-none" type="submit">{{trans('labels.submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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
@section('js')
    <script>
        function check_password() {
            var pass = $("#password").val();
            var cpass = $("#cpassword").val();
            if(pass==cpass)
            {
                return true;
            }
            else{
                $("#sms").html("Your new password and confirm password is not match!");
                return false;
            }
        }
    </script>
@endsection
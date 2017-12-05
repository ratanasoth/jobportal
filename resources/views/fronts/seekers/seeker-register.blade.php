@extends('layouts.front')
@section('content')
 <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-7">
                          <div class="panel panel-default border-radius-none">
                            <div class="panel-heading">
                                <h3 class="panel-title orange">{{trans("labels.seeker_registration_form")}}</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('/seeker/save')}}" method="post" accept-charset="UTF-8" role="form" onsubmit="return matching()">
                                    {{csrf_field()}}
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
                                    <div class="row hide" id="pass_block">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger border-radius-none" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                Your password and confirm password is not matched!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="control-label col-sm-3">{{trans("labels.first_name")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="first_name" id="first_name" 
                                            value="{{old('first_name')}}" type="text" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="control-label col-sm-3">{{trans("labels.last_name")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="last_name" id="last_name" 
                                            value="{{old('last_name')}}" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="control-label col-sm-3">{{trans("labels.gender")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male">{{trans("labels.male")}}</option>
                                                <option value="Female">{{trans("labels.female")}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="control-label col-sm-3">{{trans("labels.dob")}}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="dob" id="dob" type="text"
                                                value="{{old('dob')}}" placeholder="{{trans('labels.dd')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="control-label col-sm-3">{{trans("labels.email")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="email" id="email" type="email" 
                                            value="{{old('email')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="control-label col-sm-3">{{trans("labels.phone1")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="phone" id="phone" type="text"
                                            value="{{old('phone')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone1" class="control-label col-sm-3">{{trans("labels.phone2")}}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="phone1" id="phone1" type="text"
                                            value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="control-label col-sm-3">{{trans("labels.username")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="username" id="username" type="text" 
                                            value="{{old('username')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="control-label col-sm-3">{{trans("labels.password")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="password" id="password" type="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cpassword" class="control-label col-sm-3">{{trans("labels.confirm_password")}}<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="cpassword" id="cpassword" type="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <p class="text-danger">{{trans("labels.note")}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3">&nbsp;</label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-warning border-radius-none" type="submit">{{trans("labels.register")}}</button>
                                            <button class="btn btn-danger border-radius-none" type="reset">{{trans("labels.cancel")}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="panel-body panel-body-costum">
                            <div id="trapezoid">
                                <div class="label-by-category bold blue">{{trans("labels.partner")}}</div>
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
               {{trans("labels.our_customer")}}
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
                <div class="pd-bt"></div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function matching() {
            var p = $("#password").val();
            var cp = $("#cpassword").val();
            if(cp!=p)
            {
                $("#pass_block").removeClass('hide');
                return false;
            }
            else{
                return true;
            }
        }
        $(document).ready(function(){
            $("#dob").inputmask('99/99/9999');
           // $("#phone").inputmask('999 999 9999');
            // $("#phone1").inputmask('999 999 9999');
        });
    </script>
@endsection
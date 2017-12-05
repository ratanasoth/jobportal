@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.my_company')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            @if($company==NULL)
                <div class="row">
                    <div class="col-sm-12">
                        <p class="text-center text-success"><strong>អ្នកមិនទាន់មានក្រុមហ៊ុននៅឡើយទេ។ សូមបង្កើតក្រុមហ៊ុនថ្មីមួយ!<br>You don't have a Company yet. Please create one!</strong></p>
                        <p class="text-center">
                            <a href="{{url('/employer/create_company')}}" class="btn btn-warning border-radius-none">{{trans('labels.create_new_company')}}</a>
                        </p>
                    </div>
                </div>
            @else
            @if(Session::has('sms'))
                <div class="alert alert-success border-radius-none" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        {{session('sms')}}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                        <div class="col-md-12 col-lg-12">
                            <div class="text-center">
                                <img src="{{URL::asset('/company/').'/'.$company->logo}}" style="width: 110px;">
                                <p class="bold orange">{{$company->name}}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6">
                            <div class="bold text-primary">{{trans('labels.contact_person')}}</div>
                            <p>{{$company->contact_person}}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="bold text-primary">{{trans('labels.phone')}}</div>
                            <p>{{$company->phone}}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="bold text-primary">{{trans('labels.email')}}</div>
                            <p>{{$company->email}}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="bold text-primary">{{trans('labels.website')}}</div>
                            <p>{{$company->website}}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="bold text-primary">{{trans('labels.address')}}</div>
                            <p>{{$company->address}}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{url('/employer/edit_company/'.$company->id)}}">
                            <input type="button" class="btn btn-warning border-radius-none" value="{{trans('labels.update_company')}}">
                            </a>
                        </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><strong>{{trans('labels.company_profile')}}</strong></p>
                       <p class="text-justify">
                           {!! $company->description !!}
                       </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
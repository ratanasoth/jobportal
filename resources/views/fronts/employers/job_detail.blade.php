@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.job_detail')}}</span></span>
        <a href="{{url('/employer/job')}}" class="btn btn-primary btn-xs border-radius-none pull-right">{{trans('labels.back_to_list')}}</a>
    </div>
    <div class="panel-body">
        <div class="applications-content">

            <form action="#" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.job_title')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->job_title}}</strong>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.category')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->name}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.job_type')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->job_type}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.location')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->location}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.posting_date')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{date_format(date_create($job->create_at), "Y-m-d" )}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.closing_date')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->closing_date}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.gender')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->gender}}</strong>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('labels.hiring')}}:</p>
                            </div>
                            <div class="col-sm-10">
                                <strong>{{$job->hire}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">{{trans('labels.job_description')}}</label>
                        <div>
                            {!! $job->description !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">{{trans('labels.job_requirement')}}</label>
                       <div>{!! $job->requirement !!}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <p></p>
                        <a href="{{url('/employer/job/edit/'.$job->id)}}" class="btn btn-primary border-radius-none">{{trans('labels.edit')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#closing_date").inputmask('9999-99-99');
            CKEDITOR.replace('description');
            CKEDITOR.replace('requirement');
        });
    </script>
@endsection
@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.my_job')}}</span></span>
        <a href="{{url('/employer/job/create')}}" class="btn btn-primary btn-xs border-radius-none pull-right">{{trans('labels.post_new_job')}}</a>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            <table class="table table-condensed table-responsive">
                <thead>
                <tr>
                    <th>&numero;</th>
                    <th>{{trans('labels.job_title')}}</th>
                    <th>{{trans('labels.posting_date')}}</th>
                    <th>{{trans('labels.closing_date')}}</th>
                    <th>{{trans('labels.category')}}</th>
                    <th>{{trans('labels.location')}}</th>
                    <th>{{trans('labels.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->id}}</td>
                        <td><a href="{{url('/employer/job/detail/'.$job->id)}}">{{$job->job_title}}</a></td>
                        <td>{{date_format(date_create($job->create_at), "Y-m-d" )}}</td>
                        <td>{{$job->closing_date}}</td>
                        <td>{{$job->name}}</td>
                        <td>{{$job->location}}</td>
                        <td>
                            <a href="{{url('/employer/job/edit/'.$job->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                            <a href="{{url('/employer/job/delete/'.$job->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
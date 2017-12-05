@extends('layouts.employer')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.favorite_cv')}}</span></span>
    </div>
    <div class="panel-body">
        <div class="applications-content">

            <div class="row">
                <div class="col-sm-12">
                    {{csrf_field()}}
                    <table class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('labels.name')}}</th>
                                <th>{{trans('labels.gender')}}</th>
                                <th>{{trans('labels.dob')}}</th>
                                <th>{{trans('labels.address')}}</th>
                                <th>{{trans('labels.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cvs as $cv)
                            <tr cv-id="{{$cv->id}}" emp-id="{{$cv->employer_id}}">
                                <td>{{$cv->id}}</td>
                                <td>
                                    <a href="{{url('/employer/showcv/'. $cv->id)}}">
                                        {{$cv->last_name . " " . $cv->first_name}}
                                    </a>
                                </td>
                                <td>{{$cv->gender}}</td>
                                <td>{{$cv->dob}}</td>
                                <td>{{$cv->address}}</td>
                                <td>
                                    <a href="#" class="text-danger" onclick="rm(this,event)"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$cvs->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var burl = "{{url('/')}}";
        function rm(obj, evt) {
            evt.preventDefault();
            var tr = $(obj).parent().parent();
            var cv_id = $(tr).attr("cv-id");
            var emp_id = $(tr).attr("emp-id");
            var o = confirm("{{trans('labels.delete_sms')}}")
            if(o)
            {
                $.ajax({
                    type: "POST",
                    url: burl +"/favorite/delete",
                    data: {
                        id: cv_id,
                        emp: emp_id
                    },
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
                    },
                    success: function (sms) {
                        if(sms>=0)
                        {
                           tr.remove();
                        }
                    }
                });
            }
        }
    </script>
@endsection
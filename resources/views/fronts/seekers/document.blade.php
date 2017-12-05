@extends('layouts.seeker')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans("labels.my_attached_document")}}</span> &nbsp;&nbsp;
        </span>
        <a href="{{url('/seeker/document/create')}}" class="btn btn-primary btn-xs">{{trans('labels.upload_new_document')}}</a>
    </div>
    <div class="panel-body">
        <div class="applications-content">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>&numero;</th>
                                    <th>{{trans('labels.file_name')}}</th>
                                    <th>{{trans('labels.description')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                                @foreach($documents as $doc)
                                    <tr id="{{$doc->id}}">
                                        <td>{{$i++}}</td>
                                        <td><a href="{{asset('uploads/docs/'.$doc->name)}}" target="_blank">{{$doc->name}}</a></td>
                                        <td>{{$doc->description}}</td>
                                        <td><a href="#" class="text-danger" onclick="rm(this, event)"><i class="fa fa-remove"></i></a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            var o = confirm("{{trans('labels.delete_sms')}}");
            var tr = $(obj).parent().parent();
            var id = $(tr).attr("id");
            if(o)
            {
                // send delete request to server
                $.ajax({
                    type: "GET",
                    url: burl + "/seeker/document/delete/" + id,
                    success: function (sms) {
                        if(sms>0)
                        {
                            tr.remove();

                        }
                    }
                });
            }
        }
    </script>
@endsection
@extends('layouts.seeker')
@section('content')
    <div class="panel-heading">
        <span class="orange bold"><span class="orange">{{trans('labels.upload_new_document')}}</span> &nbsp;&nbsp;
        </span>
    </div>
    <div class="panel-body">
        <div class="applications-content">
            <form action="{{url('/seeker/document/save')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
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
                @if(Session::has('sms1'))
                    <div class="alert alert-danger border-radius-none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms1')}}
                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <label for="name" class="control-label col-sm-2">{{trans('labels.file_name')}}</label>
                    <div class="col-sm-9">
                        <input type="file" name="name" id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="control-label col-sm-2">{{trans('labels.description')}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">&nbsp;</label>
                    <div class="col-sm-9">
                        <button class="btn btn-primary border-radius-none" type="submit">{{trans('labels.save')}}</button>
                        <button class="btn btn-danger border-radius-none" type="reset">{{trans('labels.cancel')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('js')
    <script>
        var burl = "{{url('/')}}";

    </script>
@endsection
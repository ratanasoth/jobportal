@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Advertisement&nbsp;&nbsp;
                    <a href="{{url('/advertisement')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                        action="{{url('/advertisement/save')}}" 
                        class="form-horizontal" 
                        method="post"
                        enctype="multipart/form-data"  
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="url" class="control-label col-lg-1 col-sm-2">URL</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="url" id="url" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="control-label col-lg-1 col-sm-2">Position<span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <select class="form-control" required name="position" id="position"  id="exampleSelect1">
                                    <option value="Bottom">Bottom</option> 
                                    <option value="Right">Right</option>  
                                    <option value="Top">Top</option> 
                                    <option value="Left">Left</option>                
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="order_number" class="control-label col-sm-2 col-lg-1">Order</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="number" class="form-control" id="order_number" name="order_number" value="0" min="0" step="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="control-label col-lg-1 col-sm-2">Image<span class="text-danger">*</span></label></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="photo" required id="photo" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-1 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                <img src="" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection
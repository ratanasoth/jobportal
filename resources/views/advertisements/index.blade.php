@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Advertisement List&nbsp;&nbsp;
                    <a href="{{url('/advertisement/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>URL</th>
                                <th>Image</th>
                                <th>Position</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($advertisements as $adv)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$adv->url}}</td>
                                    <td><img src="{{asset('ads'.'/'.$adv->photo)}}" width="65"></td>
                                    <td>{{$adv->position}}</td>
                                    <td>{{$adv->order_number}}</td>
                                    <td>
                                        <a href="{{url('/advertisement/edit/'.$adv->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/advertisement/delete/'.$adv->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $advertisements->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
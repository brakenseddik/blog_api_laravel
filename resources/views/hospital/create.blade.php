@extends('layout')
@section('dashboard-content')
    <h1> Create New Hospital</h1>

    @if(\Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ \Illuminate\Support\Facades\Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(\Illuminate\Support\Facades\Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ \Illuminate\Support\Facades\Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ \Illuminate\Support\Facades\URL::to('post-hospital') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Hospital name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter hospital name" name="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Hospital Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter hospital address" name="Address">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Hospital Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter hospital login" name="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Hospital Password</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter hospital password" name="Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop

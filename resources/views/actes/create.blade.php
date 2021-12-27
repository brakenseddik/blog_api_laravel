@extends('layout')
@section('dashboard-content')
    <h1> Create Acte médicale form</h1>

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

    <form action="{{ \Illuminate\Support\Facades\URL::to('post-acte') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Acte name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter acte  name" name="categoryName">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Acte price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter acte name" name="Price">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop

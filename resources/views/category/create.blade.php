@extends('layout')
@section('dashboard-content')
    <h1> Create category form</h1>

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

    <form action="{{ \Illuminate\Support\Facades\URL::to('post-category') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Category name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="categoryName">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop

@extends('layout')

@use Illuminate\Support\Facades\URL;


@section('dashboard-content')
<h1>Update Category</h1>
@if(\Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
        <p> {{ \Illuminate\Support\Facades\Session::get('success') }} </p>
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

<form action="{{\Illuminate\Support\Facades\URL::to('update-acte')}}/{{$acte->id}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1"> Update Acte Title</label>
        <input type="text" value="{{$acte->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter an acte title" name="title">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> Update Acte price</label>
        <input type="text" value="{{$acte->price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter an acte price" name="price">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

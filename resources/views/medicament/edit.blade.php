@extends('layout')

@use Illuminate\Support\Facades\URL;


@section('dashboard-content')
<h1>Update Medicament</h1>
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

<form action="{{\Illuminate\Support\Facades\URL::to('update-medicament')}}/{{$medicament->id}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">  Name</label>
        <input type="text" value="{{$medicament->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter a name" name="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">  Price</label>
        <input type="text" value="{{$medicament->price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder=" price" name="Price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">  Quantity</label>
        <input type="text" value="{{$medicament->quantity}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter the quantity" name="Quantity">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

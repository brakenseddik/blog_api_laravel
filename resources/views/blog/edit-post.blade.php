@extends('layout')


@section('dashboard-content')
<h1>Update Blog</h1>
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

<form action="{{\Illuminate\Support\Facades\URL::to('update-post')}}/{{$blogs->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Blog Title</label>
        <input  value="{{$blogs->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter a blog title" name="blogPost">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Details</label>
        <textarea type="text" class="form-control" id="editor1" aria-describedby="emailHelp"
                  placeholder="Enter details" name="blogDetails">{{$blogs->details}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Select Category</label>
            <select class="form-control" name="category">
                <option>select</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" @if($cat->id == $blogs->category_id)selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
            <input value="{{$blogs->featured_photo_url}}" type="file" class="custom-file-input" id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01" name="featuredPhoto">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    </br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>


@endsection

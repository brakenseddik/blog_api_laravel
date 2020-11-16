@extends('layout')



@section('dashboard-content')
<h1>All Categories</h1>
@if(\Illuminate\Support\Facades\Session::get('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
        <p> {{ \Illuminate\Support\Facades\Session::get('delete') }} </p>
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tfoot>
                <tr>

                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>

                </tr>
                </tfoot>
                <tbody>
                    @foreach($categories as $cat)
                        <tr>
                            <td>{{$cat->name}}</td>
                        <td>{{$cat->created_at}}</td>
                        <td>{{$cat->updated_at}}</td>
                        <td>
                            <a href="{{\Illuminate\Support\Facades\URL::to('edit-category')}}/{{$cat->id}}" class="btn btn-outline-success btn-sm">Edit</a>
                            <a href="{{\Illuminate\Support\Facades\URL::to('delete-category')}}/{{$cat->id}}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                        </td>
                        </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function checkDelete(){
       var check= confirm('Are you sure !?');
       if(check){return true;}
       else return false;
    }

</script>
@endsection

@extends('layouts.frontend')

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
<h4> Add Posts
               
                <a href="{{url('posts')}}" class="btn btn-danger float-end">BACK

                </a></h4>
                </div>

                <div class="card-body">
                   <form action="{{url('posts')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group mb-3">
    <label for="">Title</label>
<input type="text" name="title" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label for="">Description</label>
<textarea name="description" class="form-control" rows="3" required></textarea>
</div>

<div class="form-group mb-3">
    <label for="">Image(File Upload)</label>
<input type="file" name="image" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label for="">Status</label>
<input type="checkbox" name="status"> 0=hide, 1=show
</div>

<div class="form-group mb-3">
 <button type="submit" class="btn btn-primary">Submit</button>
</div>


                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

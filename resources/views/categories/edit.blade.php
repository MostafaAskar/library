@extends('layout')

@section('title')
    Edit Category
@endsection

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
    

        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Edit post</h3>
                </div>
                <div>
                    <a href={{url('/categories')}} class="text-decoration-none">Back</a>
                </div>
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger">
                       @foreach ($errors->all() as $error)
                           <p>
                            {{$error}}
                           </p>
                       @endforeach
                </div>
            @endif



            <form method="POST" action="{{ url("/categories/$category->id")}}">
                @csrf
                @method('PUT')


                <input type="hidden" name="id" value="">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="name" value="{{$category->name}}">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="desc" rows="5">{{$category->desc}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">update</button>
            </form>
        </div>
        </div>
    
</div>

@endsection


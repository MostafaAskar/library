@extends('layout')

@section('title')
    Edit Book
@endsection

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
    

        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Edit book</h3>
                </div>
                <div>
                    <a href={{url('/books')}} class="text-decoration-none">Back</a>
                </div>
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger">

                       @foreach ($errors->all() as $error)
                           <p>
                            {{$error}};
                           </p>
                       @endforeach

                </div>
             @endif
             
                          

          
            <form method="POST" action="{{ url("/books/$Book->id")}}">
                @csrf
                @method('PUT')


                <input type="hidden" name="id" value="">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="name" value="{{$Book->name}}">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="desc" rows="5">{{$Book->desc}}</textarea>
                </div>
                <div class="mb-3">
                    <select name="category_id" >
                        @foreach ($categories as $category)
                        <option id="{{$category->id}}" @if($category->id == $Book->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
            </div>
                <div class="mb-3">
                    <label for="body" class="form-label">image</label>
                    <input type="file" class="form-control" id="image" name="img">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">update</button>
            </form>
        </div>
        </div>
    
</div>

@endsection


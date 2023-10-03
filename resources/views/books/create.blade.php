@extends('layout')

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Add new post</h3>
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
         

          
    <form method="POST" action="{{ url('/books')}}" enctype="multipart/form-data"> 
        @csrf
            <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="name">
            </div>

            <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="desc" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <select name="category_id" >
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
        </div>
            <div class="mb-3">
                <label for="body" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="img">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

        </div>
    </div>
</div>


@endsection


@section('title')

    add book   
@endsection
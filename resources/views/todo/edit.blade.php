@extends('layout')

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Edit task</h3>
                </div>
                <div>
                    <a href={{url('/todos')}} class="text-decoration-none">Back</a>
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
         

          
    <form method="POST" action="{{ url("/todos/$todo->id")}}"  enctype="multipart/form-data"> 
        @csrf
        @method('put')
            <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
            </div>

            <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="desc" rows="5">{{$todo->desc}}</textarea>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    {{-- <label for="title" class="form-label">Title</label> --}}
                    <input type="file" class="form-control" id="title" name="img">
                </div>
                
                <tr>
                    <td><label for="title" class="form-label">status  : </label></td>
                    <td>
                        <select name="status" >
                            <option value="1"> true</option>
                            <option value="0"> false</option>
                        </select>
                    </td>
                </tr>
                
             </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

        </div>
    </div>
</div>


@endsection


@section('title')

    Edit task    
@endsection
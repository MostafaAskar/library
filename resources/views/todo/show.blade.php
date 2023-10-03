@extends('layout')
@section('title')
    Show Todo
@endsection
@section('content')
    
    <div class="container-fluid pt-4">
    <div class="row">
        
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>{{$todo->title}}</h3>
                </div>
                <div>
                    <a href={{url('/todos')}} class="text-decoration-none">Back</a>
                </div>
            </div>
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <img src="{{asset(str_replace('public/' , 'storage/' , $todo->img))}}" class="card-img-top " style="width: 30px " alt="...">
                    {{$todo->desc}}
                </div>
                    <div style=" margin-bottom: 10px; display: flex; ">
                    <a href="{{url("/todos/$todo->id/edit")}}"  class="btn btn-sm btn-secondary">Edit</a>
                    <br>
                    <form style="margin: 0px 0 0 25px" action="{{url("/todos/$todo->id")}}" method="post" >
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                    </form>
                    <form style="margin: 0px 0 0 25px" action="{{url("/todos/$todo->id")}}" method="post" >
                        @csrf
                        {{-- @method('put') --}}
                        <input class="btn btn-sm btn-success" type="submit" value="Done">
                    </form>
                
            </div>
        </div>
        
    </div>
  </div>
@endsection
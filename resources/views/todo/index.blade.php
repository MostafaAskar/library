@extends('layout')

@section('title')
    ToDo
@endsection

@section('content')

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>All Tasks</h3>
                </div>
                <div>
                    <a href={{url('/todos/create')}} class="btn btn-sm btn-success">Add new task</a>
                    {{-- <a href={{url('/todos/completed')}} class="btn btn-sm btn-success">Completed task</a> --}}
                </div>
                {{-- <div>
                    
                </div> --}}
            </div>
<div class="card m-5">
    @foreach($todos as $todo)
                <div class="card-header">
                    
                    
                        <div class="card-body">
                                <h5 class="card-title">{{$todo->title}}</h5>
                                <p class="card-text">{{$todo->desc}}</p>
                                <div class="button">
                        <a href="{{url("/todos/$todo->id")}}"  class="btn btn-sm btn-primary">   Show   </a>
                        </div>
                </div>
                
            </div>
    @endforeach
    
</div>
{{$todos->links()}}
</div>

@if ($comletedtodos->count())
    
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3> Completed Tasks </h3>
                </div>
                {{-- <div>
                    <a href={{url('/todos')}} class="text-decoration-none">Back</a>
                </div> --}}
                {{-- <div>
                    <a href={{url('/todos/create')}} class="btn btn-sm btn-success">Add new task</a>
                </div>
                <div>
                    <a href={{url('/todos/done')}} class="btn btn-sm btn-success">Comleted task</a>
                </div> --}}
            </div>
<div class="card m-5">
    @foreach($comletedtodos as $comletedtodo)
                <div class="card-header">
                    
                    
                        <div class="card-body">
                                <h5 class="card-title">{{$comletedtodo->title}}</h5>
                                <p class="card-text">{{$comletedtodo->desc}}</p>
                                <div class="button">
                        <a href="{{url("/todos/$comletedtodo->id")}}"  class="btn btn-sm btn-primary">   Show   </a>
                        </div>
                </div>
                
            </div>
    @endforeach
    
</div>
{{$comletedtodos->links()}}
</div>

@endif
    

  @endsection

@extends('layout')

@section('title')
    Hello, world!
@endsection
  @section('content')
      
    <div class="container-fluid pt-4">
      <div class="row">
          <div class="col-md-10 offset-md-1">
              <div class="d-flex justify-content-between border-bottom mb-5">
                  <div>
                      <h3>All posts</h3>
                  </div>
                  <div>
                      <a href={{url('/categories/create')}} class="btn btn-sm btn-success">Add new category</a>
                  </div>
              </div>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Published At</th>
                          {{-- <th scope="col">Actions</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                       @foreach($categories as $category)
                      <tr>
                          <td> <a href="{{url("/categories/$category->id")}}"  >{{$category->name}}</a></td>
                          <td>{{$category->created_at}}</td>
                          <td>
                              {{-- <a href="{{url("/categories/$category->id")}}"  class="btn btn-sm btn-primary">Show</a>
                              <a href="{{url("/categories/$category->id/edit")}}"  class="btn btn-sm btn-secondary">Edit</a>
                              <br> --}}
                              <form style="margin: 10px 0 0 25px" action="{{url("/categories/$category->id")}}" method="post" >
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                               </form>
                              {{-- <a href="{{url("/categories/$category->id/destroy")}}"  class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a> --}}
                          </td>
                      </tr>
                      @endforeach
                      
                    
                  </tbody>
              </table>
              {{ $categories->links() }}
          </div>
      </div>
  </div>

  @endsection


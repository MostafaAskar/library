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
                      <h3>All books</h3>
                  </div>
                  <div>
                      <a href={{url('/books/create')}} class="btn btn-sm btn-success">Add new post</a>
                  </div>
              </div>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Published At</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                   
                       @foreach($books as $book)
                      <tr>
                          <td> {{$book->name}}</td>
                          <td>{{$book->created_at}}</td>
                          <td>
                              <a href="{{url("/books/$book->id")}}"  class="btn btn-sm btn-primary">Show</a>
                              <a href="{{url("/books/$book->id/edit")}}"  class="btn btn-sm btn-secondary">Edit</a>
                              <br>
                              <form style="margin: 10px 0 0 25px" action="{{url("/books/$book->id")}}" method="post" >
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                               </form>
                              {{-- <a href="{{url("/books/$book->id/destroy")}}"  class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a> --}}
                          </td>
                      </tr>
                      @endforeach
                      
                    
                  </tbody>
              </table>
              {{ $books->links() }}
          </div>
      </div>
  </div>

  @endsection


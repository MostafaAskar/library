 @extends('layout')

@section('title')
    Show category - {{$category->name}}
@endsection

@section('content')

<div class="container-fluid pt-4">
  <div class="row">
      
      <div class="col-md-10 offset-md-1">
          <div class="d-flex justify-content-between border-bottom mb-5">
              <div>
                  <h3>{{$category->name}}</h3>
              </div>
              <div>
                <a href={{url('/books/create')}} class="btn btn-sm btn-success">Add new Book</a>
                  <a href={{url('/categories')}} class="text-decoration-none">Back</a>
              </div>
          </div>
          <div class="d-flex justify-content-between border-bottom mb-5">
            
                @if ($category->Books->count() !=0)
                    
               <div>
                <h5>Books</h5>
               </div>
                <br>
                @foreach ($category->Books as $book)
                <div>
                    <p>
                    
                        {{$book->name}}
                        <br>
                    </p>
                </div>
                    
                @endforeach
                @endif
            
          </div>
      </div>
      
  </div>
</div> 


 @endsection

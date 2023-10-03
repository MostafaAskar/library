@extends('layout')

@section('title')
    Show Book - {{$Book->name}}
@endsection

@section('content')

<div class="container-fluid pt-4">
  <div class="row">
      
      <div class="col-md-10 offset-md-1">
          <div class="d-flex justify-content-between border-bottom mb-5">
              <div>
                  <h3>{{$Book->name}}</h3>
              </div>
              <div>
                  <a href={{url('/books')}} class="text-decoration-none">Back</a>
              </div>
          </div>
          <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <img src="{{asset($Book->img)}}">
                </div>
                @if ($Book->category->count() !=0)
                    
                <h5>category</h5>
                {{-- @foreach ($Book->category as $category) --}}
                <p>
                    {{$Book->category->name}}
                </p>
                    
                {{-- @endforeach --}}
                @endif
            <div>
          {{$Book->desc}}
          </div>
          </div>
      </div>
      
  </div>
</div>


@endsection


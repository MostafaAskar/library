@extends('layout')

@section('title')
    register 
@endsection
@section('content')

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>register</h3>
                </div>
                {{-- <div>
                    <a href={{url('/register')}} class="text-decoration-none">Back</a>
                </div> --}}
            </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p> {{ $error}}</p>
                    @endforeach
                    
                </div>
                @endif
               
            <form method="POST" action="{{url('/register')}}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="email" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </form>
        </div>
    </div>
</div>
    
@endsection
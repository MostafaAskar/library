<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @yield('page-style')

  </head>
  <body>
    <nav>
      @guest
      <a href="{{url("/register")}}"  class="btn btn-sm btn-primary">Register</a>
      <a href="{{url("/login")}}"  class="btn btn-sm btn-primary">login</a> 
      @endguest
      @auth
      <form style="margin: 0px 0 0 25px" action="{{url("/logout")}}" method="post" >
          @csrf
          <input class="btn btn-sm btn-primary" type="submit" value="Logout">
      </form>
      @endauth
    </nav>


    @yield('content')




    <script src="{{asset('js/bootstrap.min.js')}}">
    @yield('page-script')
  </body>
</html>
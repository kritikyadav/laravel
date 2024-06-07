<!doctype html>
<html lang="en">

<head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
  @if( session()->has('navtitle') )
    {{session()->get('navtitle')}}
    @else
    {{"Quickcap"}}
    @endif
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/register')}}">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/customer')}}">Customer</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <form action="{{url('/')}}/register" method="post">
            @csrf
            <h1 class="text-center text-primary">
                Registration
            </h1>
            <x-input type="text" name="name"  label="Name"/>
            <x-input type="text" name="email" label="Email"/>
            <x-input type="password" name="password" label="Password"  />
            <x-input type="password" name="password_config" label="Confirm Password" />
            <button class="btn btn-primary">
                save
            </button>
        </form>
    </div>
</body>

</html>
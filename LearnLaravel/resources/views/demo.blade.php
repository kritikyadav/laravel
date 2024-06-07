<!doctype html>
<html lang="en">
  <head>
    <title>Wellcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    @if( session()->has('navtitle') )
    {{session()->get('navtitle')}}
    @else
    {{'Quickcap'}}
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
  <h1 class=" text-center text-primary">Wellcome</h1><hr>
  <h3 class="text-center">This is our Landing Page</h3>
  <h3 class="text-center">Reed the description below for further details</h3><hr>
 
  <ul>
    <li>Firstly register yourself using the register screen</li><hr>
    <li>You can view all the customers record using the customer screen</li><hr>
    <li>Use navigation bar to toggle screens</li><hr>
  </ul>
      
    </tr>
  </table>
</div>
  </body>
</html>
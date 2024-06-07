<!doctype html>
<html lang="en">

<head>
    <title>{{$title}}</title>
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
@if( $edit == '1' )
    <div class="container">
    <h1 class="text-center">{{$title}}</h1>
    <form action="{{$url}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{$customer->name}}" required>
            <span class="text-danger"> @error("name") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Eamil" value="{{$customer->email}}" required>
            <span class="text-danger"> @error("email") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{$customer->address}}" required>
                <span class="text-danger"> @error("address") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-2">
                <label for="">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{$customer->dob}}" >
                <span class="text-danger"> @error("dob") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-1">
            <label for="inputGender">Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" {{$customer->gender == 'M' ? "checked" : ""}} >
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" {{$customer->gender == 'F' ? "checked" : ""}} >
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="O" {{$customer->gender == 'O' ? "checked" : ""}} >
                    <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>
                <span class="text-danger"> @error("gender") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-1">
            <label for="inputStatus">Status:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{$customer->status == '1' ? "checked" : ""}} >
                    <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{$customer->status == '0' ? "checked" : ""}}>
                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                </div>
                <span class="text-danger"> @error("status") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Save</button>
            <a href="{{route('customer.view')}}">
            <button type="button" class="btn btn-primary">Back</button>
            </a>
        </div>
    </form>
    </div>
@else
    <div class="container">
    <h1 class="text-center text-primary">{{$title}}</h1>
    <form action="{{$url}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}" required>
            <span class="text-danger"> @error("name") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Eamil" value="{{ old('email') }}" required>
            <span class="text-danger"> @error("email") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}" required>
                <span class="text-danger"> @error("address") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-2">
                <label for="">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                <span class="text-danger"> @error("dob") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-1">
            <label for="inputGender">Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" >
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" >
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="O" >
                    <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>
                <span class="text-danger"> @error("gender") {{$message}} @enderror </span>
            </div>
            <div class="form-group col-md-1">
            <label for="inputStatus">Status:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" required>
                    <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" >
                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                </div>
                <span class="text-danger"> @error("status") {{$message}} @enderror </span>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Save</button>
            <a href="{{route('customer.view')}}">
            <button type="button" class="btn btn-primary">Back</button>
            </a>
        </div>
    </form>
    </div>
@endif  
</body>

</html>
<!doctype html>
<html lang="en">
  <head>
    <title>Customer Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container{
            position: relative;
            top: 50px;
        }
    </style>
</head>
  <body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    @if( session()->has('navtitle') )
    {{session()->get('navtitle')}}
    @else
    {{"Quickcap"}}
    @endif</a>
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
      <h1 class="text-center text-primary">Customer Data</h1>
      <div class="row m-2">
        <form action="" class="col-10">
          <div class="form">
          <a href="{{route('customer.view')}}">
          <button type="button" class="btn btn-danger float-right" title='Reset'>Reset</button>
          </a> 
          <button class="btn btn-primary float-right">&#128270;</button>
          <input type="search" class="form-control float-right" style="width: 28%;" name='search' placeholder='Search by name or email' value="{{ old('search') }}" />
          </div>
        </form>
        <a href="{{route('customer.trash')}}">
        <button type="button" class="btn btn-dark d-inline-block m-2 float-right" title='Recycle Bin'>Trash</button>
        </a>
        <a href="{{route('customer.create')}}">
        <button type="button" class="btn btn-primary d-inline-block m-2 float-right" title='Add new Customer'>Add</button>
        </a>    
      </div> 
        <table class="table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>DOB</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($customers as $customer)
              <tr style="width: 100%;">
                  <td style="width: 10%;" >{{$customer->name}}</td> 
                  <td style="width: 15%;" >{{$customer->email}}</td>
                  <td style="width: 5%;" >
                      @if($customer->gender == 'M')
                      Male 
                      @endif
                      @if($customer->gender == 'F')
                      Female 
                      @endif
                      @if($customer->gender == 'O')
                      Other 
                      @endif
                  </td>
                  <td style="width: 30%;" >{{$customer->address}}</td>
                  <td style="width: 15%;" >{{get_formatted_date($customer->dob, 'd-M-Y')}}</td>
                  <td style="width: 10%;" >
                      @if($customer->status == "1")
                          <button class="btn"><span class="badge badge-success">Active</span></button>
                      @else
                      <button class="btn"><span class="badge badge-danger">Inactive</span></button>
                      @endif

                  </td>
                  <td style="width: 20%;" >
                      <!-- "{{url('/customer/delete')}}/{{$customer->id}}" sending data using url -->
                      <!-- {{route('customer.delete' , ['id' => $customer->id])}} sending data using route name as key value pair where key(name) should be same on both side in this place and in web call -->
                  <a href="{{route('customer.delete' , ['id' => $customer->id])}}" ><button class="btn btn-danger" title='Move To Recycle Bin'>X</button></a>
                  <a href="{{route('customer.edit' , ['id' => $customer->id])}}" ><button class="btn btn-primary" title='Edit this Record'><span class="glyphicon">&#x270f;</span></button></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <div id='pagination' class="pagination justify-content-end">
        {{$customers->links()}}
        </div>
    </div>
  </body>
</html>
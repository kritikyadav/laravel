<!doctype html>
<html lang="en">
  <head>
    <title>Recycle Bin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container{
            position: relative;
            top: 55px;
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
      <h1 class="text-center text-primary">Recycle Bin</h1>
        <a href="{{route('customer.view')}}">
        <button type="button" class="btn btn-primary d-inline-block m-2 float-right">Back</button>
        </a>        
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
                <tr>
                    <td>{{$customer->name}}</td> 
                    <td>{{$customer->email}}</td>
                    <td>
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
                    <td>{{$customer->address}}</td>
                    <td>{{get_formatted_date($customer->dob, 'd-M-Y')}}</td>
                    <td>
                        @if($customer->status == "1")
                            <button class="btn"><span class="badge badge-success">Active</span></button>
                        @else
                        <button class="btn"><span class="badge badge-danger">Inactive</span></button>
                        @endif

                    </td>
                    <td>
                        <!-- "{{url('/customer/delete')}}/{{$customer->id}}" sending data using url -->
                        <!-- {{route('customer.delete' , ['id' => $customer->id])}} sending data using route name as key value pair where key(name) should be same on both side in this place and in web call -->
                    <a href="{{route('customer.force_delete' , ['id' => $customer->id])}}" ><button style="width: 79px;" class="btn btn-danger" title='Delete Permanently'>Delete</button></a>
                    <a href="{{route('customer.restore' , ['id' => $customer->id])}}" ><button class="btn btn-primary" title='Restore This Record'>Restore</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
  </body>
</html>
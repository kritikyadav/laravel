<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form method='post' action="{{url('/fileupload')}}" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
                <label for="">File</label>
                <input type="file" class="form-control" name="file" id="" placeholder="" area-describedby='helpId'>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
</html>
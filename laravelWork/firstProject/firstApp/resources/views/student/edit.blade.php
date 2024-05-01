

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Updating Student</title>
  </head>
  <body>
    <div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12 bg-secondary rounded py-2">
            <h1 class="text-center text-white">Laravel Crud operations</h1>
        </div>
    </div>
    <div class="row ">
        <div class="col-12  mt-5 d-flex justify-content-end">
            <a href="{{url ('student')}}" class="btn btn-danger">Back</a>
        </div>
        @if (session('status'))
        <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif
    </div>

    <div class="row ">
        <div class="col-8">
        <form action="{{url ('update-student/'.$student->id)}}" method="get" enctype="multipart/form-data">
            @csrf
 
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name" value="{{$student->name}}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" value="{{$student->email}}">
   
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Course</label>
    <input type="text" class="form-control"  name="course" value="{{$student->course}}">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Image</label>
    <input type="file" class="form-control"  name="image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        </div>
        <div class="col-4 d-flex align-items-center flex-column justify-content-center">
        <img src="{{ asset('images/'.$student->image) }}" style="max-width:250px;max-height:250px;" alt='no -figure'>
        <h6 class="mt-2"><i>{{$student->image}}</i></h6>
        </div>
    </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
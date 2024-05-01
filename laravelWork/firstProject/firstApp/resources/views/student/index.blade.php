

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel</title>
  </head>
  <body>
    <div class="container">
    <div class="row mt-5">
        <div class="col-12 bg-secondary rounded py-2">
            <h1 class="text-center text-white">Laravel Crud operations</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-end"><a href="{{url ('add-student')}}" class="btn btn-primary">Add new</a></div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-8">
        <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Course</th>
      <th scope="col">Profile Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($student as $s)
    <tr>
      <th scope="row">{{$s->id}}</th>
      <td>{{$s->name}}</td>
      <td>{{$s->email}}</td>
      <td>{{$s->course}}</td>
  
      <td><img src="{{ asset('images/'.$s->image) }}" style="max-width:70px;max-height:70px;" alt='no -figure'></td>
      <td><a href="{{ url('edit-student/'.$s->id) }}" class="btn btn-sm btn-primary me-3">Update</a><a href="{{ url('delete-student/'.$s->id) }}" class="btn btn-sm btn-danger">Delete</a></td>



    </tr>
    @endforeach
  </tbody>
</table>

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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Calculator</title>
  </head>
  <body>
    <div class="container">
        <div class="row my-5 bg-secondary py-2">
            <div class="col-12">
                <h1 class="text-center text-white">Laravel<span class="fw-bold"> Calculator {{$errors}}</span></h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8">
            <form method="post" action="{{url('calculator/result')}}">
                @csrf
  <div class="mb-3">
    <label for="n1" class="form-label">First number</label>
    <input type="number" class="form-control" name="n1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="n2" class="form-label">Second number</label>
    <input type="number" class="form-control" name="n2">
  </div>
  <select class="form-select" name="op">
  <option selected>Chose operation type</option>
  <option value="+">Addiotn (+)</option>
  <option value="-">Subtraction (-)</option>
  <option value="*">Multiplication (x)</option>
  <option value="/">Divison (/)</option>
  <option value="%">Remainder (%)</option>
</select>
  <button type="submit" class="btn btn-primary my-2">Submit</button>
</form>

            </div>
            <div class="col-2">
    <h1 class="bg-secondary rounded text-center text-white fw-bold d-flex align-items-center justify-content-center">Your result is = {{$res}}</h1>
</div>
        </div>
    </div>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
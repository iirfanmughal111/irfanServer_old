
<?php
include 'connection.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Table Crud</title>
    </head>
    <body>
        
        <div class="container mt-5">
            <div class="row bg-secondary rounded">
                <div class="col-12 ">
                    <h1 class="text-center fw-bold text-white">Table Work</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end my-5">
                    <a class="btn btn-primary" href="create.php">Add new</a>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//      Reading data
                            $sql = "Select * from allData";
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("Invalid!! " . $conn->error);
                            }
//      Reading All Rows
                            while ($row = $result->fetch_assoc()) {
                                echo
                                "<tr>
      <th scope='row'>$row[id]</th>
      <td>$row[name]</td>
      <td>$row[email]</td>
      <td>$row[password]</td>
          <td><img style=' height: 60px; width:60px;' src='images/$row[image]'></td>
      <td><a href='update.php?updateId='$row[id]' class='btn btn-primary btn-sm'>Update</a></td>
      <td><a href='delete.php?deleteId='$row[id]'  class='btn btn-danger btn-sm'>Delete</a></td>
    </tr>";
                            }
                            ?>

                        </tbody>
                    </table>


                </div>

            </div>

        </div>

<?php ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

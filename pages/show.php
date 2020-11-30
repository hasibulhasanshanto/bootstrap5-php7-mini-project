<?php 
    require_once('../lib/connection.php');
    // Start the session
    $success = '';
    $error = '';
    $message = '';
    
    session_start(); 
    if($_SESSION){
        $success = $_SESSION['success']; 
        $error = $_SESSION['error']; 
    }

    $readSql = "SELECT * FROM student_info ORDER BY id desc";

    $read = mysqli_query($conn, $readSql);
    if($read){ 
        $datas = $read;
    } else{
        $error = 'Something went wrong :(';
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style.css">

    <title>PHP CRUD with Bootstrap 5</title>
  </head>
  <body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if($success):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> <?= $success; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
                <?php if($error):?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error! </strong> <?= $error; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>   
                <table class="table table-striped table-hover table-bodered">
                    <tr>
                        <th># SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($datas as $key=> $item): ?>
                        <tr>
                            <td><?= $key+1; ?></td> 
                            <td><?= $item['s_name']; ?></td> 
                            <td><?= $item['s_email']; ?></td> 
                            <td><?= $item['s_phone']; ?></td> 
                            <td><?= $item['s_birth']; ?></td> 
                            <td>
                                <?= ($item['s_gender'] == 0 ? 'Male':'Female') ; ?>
                            </td> 
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>             

            </div>
        </div> 
    </div>


    <!-- All Scripts are as follows --> 
    <!-- Separate Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>

    <script src="src/main.js"></script>
   
  </body>
</html>

<?php
    unset($_SESSION['success']);
    unset($_SESSION['error']);
    session_destroy();
?>
<?php
    require_once('lib/connection.php');

    /*if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else{

        if(isset($_POST['btn_submit'])){            
            // echo "Connected successfully";
            $s_name = $_POST['s_name'];
            $s_email = $_POST['s_email'];
            $s_phone = $_POST['s_phone'];
            $s_birth = $_POST['s_birth'];
            $s_gender = $_POST['s_gender'];
            $s_pass = $_POST['s_pass']; 
            $c_pass = $_POST['c_pass']; 

            if(!($s_pass == $_POST['c_pass'] )){
                return $message = 'Password doesn\'t Match';
            } else{


                return $message = 'Data store successful...!';
            }
        }
    }*/

    $success = '';
    $error = '';
    $message = '';

    if(isset($_POST['btn_submit'])){            
        // echo "Connected successfully";
        $s_name = $_POST['s_name'];
        $s_email = $_POST['s_email'];
        $s_phone = $_POST['s_phone'];
        $s_birth = $_POST['s_birth'];
        $s_gender = $_POST['s_gender'];
        $s_pass = $_POST['s_pass']; 
        $c_pass = $_POST['c_pass']; 

        if(!($s_pass == $_POST['c_pass'] )){

            $message = 'Password doesn\'t Match';
        } else{ 

            $insertSql = "INSERT INTO student_info(s_name, s_email, s_phone, s_birth, s_gender, s_pass) VALUES ('$s_name', '$s_email','$s_phone','$s_birth', $s_gender,'$s_pass')";

            $store = mysqli_query($conn, $insertSql);
            if($store){
                $success = 'Your Registration is Successful...!';
                // Start the session
                session_start();
                // Set session variables
                $_SESSION["success"] = $success;
                header('Location: pages/show.php');

            } else{
                $error = 'Data Store Uccessful...!';
            }

        }
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

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><h3>Student Info</h3></legend>
                        <div class="row mb-3">
                            <label for="s_name" class="form-label">Student Name</label>
                            <input type="text" class="form-control s_name" name="s_name" id="s_name" >
                        </div>
                        <div class="row mb-3">
                            <label for="s_email" class="form-label">Student Email</label>
                            <input type="email" class="form-control s_email" name="s_email" id="s_email">
                        </div>
                        <div class="row mb-3">
                            <label for="s_phone" class="form-label">Student Phone</label>
                            <input type="tel" class="form-control s_phone" name="s_phone" id="s_phone">
                        </div>
                        <div class="row mb-3">
                            <label for="s_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control s_birth" name="s_birth" id="s_birth">
                        </div>
                        <div class="row mb-3">
                            <label for="s_gender" class="form-label">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio1" value="0" checked>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio2" value="1">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div> 
                        </div>
                        <div class="row mb-3">
                            <label for="s_pass" class="form-label">Password</label>
                            <input type="password" class="form-control s_pass" name="s_pass" id="s_pass">
                        </div>
                        <div class="row mb-3">
                            <label for="c_pass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control c_pass" name="c_pass" id="c_pass">
                        </div>
                        <?php if($message):?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error! </strong> <?= $message; ?>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div> 
                        <?php endif;?>

                        <button type="submit" class="btn btn-success" name="btn_submit">Submit</button>
                        <button type="reset" class="btn btn-danger ml-2">Reset</button>

                    </fieldset>
                </form>

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
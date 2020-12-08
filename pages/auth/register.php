<?php
    require_once('../../lib/connection.php');

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
            $s_pass = md5($s_pass);

            $insertSql = "INSERT INTO student_info(s_name, s_email, s_phone, s_birth, s_gender, s_pass) VALUES ('$s_name', '$s_email','$s_phone','$s_birth', $s_gender,'$s_pass')";

            $store = mysqli_query($conn, $insertSql);
            if($store){
                $success = 'Your Registration is Successful! Please login.';
                // Start the session
                // session_start();
                // Set session variables
                $_SESSION["success"] = $success;
                header('Location: login.php');

            } else{
                $error = 'Data Store Uccessful...!';
            }

        }
    }
?>
    <?php include_once('../../inc/header.php'); ?>
    <?php include_once('../../inc/navbar.php'); ?>

    <div class="container my-5">

        <div class="row">
            <div class="col-md-10 offset-md-1">
             <!-- Showing notification message  -->
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
                <!--/. Showing notification message  -->

                <div class="card border-info">
                    <h3 class="card-header">Student Register Form</h3>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="p-5"> 
                            <div class="row mb-3">
                                <label for="s_name" class="form-label">Student Name</label>
                                <input type="text" class="form-control s_name" name="s_name" id="s_name" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_email" class="form-label">Student Email</label>
                                <input type="email" class="form-control s_email" name="s_email" id="s_email" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_phone" class="form-label">Student Phone</label>
                                <input type="tel" class="form-control s_phone" name="s_phone" id="s_phone" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control s_birth" name="s_birth" id="s_birth" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_gender" class="form-label">Gender</label>
                                <div class="input-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio1" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio2" value="1">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="s_pass" class="form-label">Password</label>
                                <input type="password" class="form-control s_pass" name="s_pass" id="s_pass" required>
                            </div>
                            <div class="row mb-3">
                                <label for="c_pass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control c_pass" name="c_pass" id="c_pass" required>
                            </div>
                            <?php if($message):?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error! </strong> <?= $message; ?>
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div> 
                            <?php endif;?>

                            <button type="submit" class="btn btn-success" name="btn_submit">Register</button>
                            <button type="reset" class="btn btn-danger ml-2">Reset</button> 
                        </form>
                    </div>
                </div>
                

            </div>
        </div> 
    </div>

    <?php include_once('../../inc/footer.php'); ?>

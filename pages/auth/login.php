<?php
    require_once('../../lib/connection.php');

    $success = '';
    $error = '';
    $message = '';

    // session_start(); 
    if($_SESSION){
        if($_SESSION['success']){
            $success = $_SESSION['success'];          
        } 
        else{
            $error = $_SESSION['error'];
        }
    }
    
    if(isset($_POST['btn_login'])){    
         
        $l_email = $_POST['l_email']; 
        $l_pass = md5($_POST['l_pass']);  
 

        $loginSql = "SELECT s_email, s_pass FROM student_info WHERE s_email='$l_email' AND s_pass='$l_pass' ";        

        $login = mysqli_query($conn, $loginSql); 
        // print_r($loginSql);
        // die();

        if(mysqli_num_rows($login) == 1){
            $success = 'Login is Successful...!'; 

            session_start(); 
            $_SESSION["auth"] = 1;
            $_SESSION["success"] = $success;
            header('Location: ../dashboard.php');

        } else{
            $error = 'Email and Password don\'t match, try again !!';
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
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong> <?= $error; ?>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
                <!--/. Showing notification message  --> 

                <div class="card border-info">
                    <h3 class="card-header">Student Register Form</h3>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="p-5"> 
                            <!-- input  -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Enter your email" name="l_email">
                            </div>

                            <!-- input  -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm.5 7.415a1.5 1.5 0 1 0-1 0l-.385 1.99a.5.5 0 0 0 .491.595h.788a.5.5 0 0 0 .49-.595L8.5 7.915z"/>
                                    </svg>
                                </span>
                                <input type="password" class="form-control" placeholder="Enter your password" name="l_pass">
                            </div>

                            <?php if($message):?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error! </strong> <?= $message; ?>
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div> 
                            <?php endif;?>

                            <button type="submit" class="btn btn-success" name="btn_login">Login</button>
                            <button type="reset" class="btn btn-danger ml-2">Reset</button> 
                        </form>
                    </div>
                </div> 

            </div>
        </div> 
    </div>

    <?php include_once('../../inc/footer.php'); ?>

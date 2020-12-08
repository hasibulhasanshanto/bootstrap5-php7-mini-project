<?php 
    require_once('../lib/connection.php');
    // Start the session
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

?>
    <?php include_once('../inc/header.php'); ?>
    <?php include_once('../inc/navbar.php'); ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12 ">
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
                    <h3 class="card-header">Welcome to user's dashboard :)</h3>
                    <div class="card-body">                                 

                    </div>
                </div>                
            </div>
        </div> 
    </div>

    <?php include_once('../inc/footer.php'); ?>

<?php
    unset($_SESSION['success']);
    unset($_SESSION["error"]);
    session_destroy();
?>
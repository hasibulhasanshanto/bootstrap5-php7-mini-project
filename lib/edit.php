<?php 
    require_once('connection.php'); 
    // require_once('read.php'); 

    $success = '';
    $error = '';
    $message = '';
    $id= '';
    
    session_start(); 
    if($_SESSION){
        if($_SESSION['success']){
            $success = $_SESSION['success'];          
        } 
        elseif($_SESSION['message']){
            $message = $_SESSION['message'];          
        } 
        else{
            $error = $_SESSION['error'];
        }
    } 

    $id = $_GET['id'];
    
    $showSql = "SELECT * FROM student_info WHERE id=$id ";
    $result = mysqli_query($conn, $showSql);
    
    
    $row = mysqli_fetch_assoc($result); 
    // $row = mysqli_fetch_array($result); 


    $_SESSION["id"] = $id; 

?>

    <?php include_once('../inc/header.php'); ?>
    <?php include_once('../inc/navbar.php'); ?>

    <div class="container my-5">

        <div class="row">
            <div class="col-md-10 offset-md-1">
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

                <div class="card border-info">
                    <h3 class="card-header">Student Register Form</h3>
                    <div class="card-body">
                        <form action="update.php?id=<?= $row['id'];?>" method="POST" class="p-5"> 
                            <div class="row mb-3">
                                <label for="s_name" class="form-label">Student Name</label>
                                <input type="text" class="form-control s_name" name="s_name" id="s_name" value="<?= $row['s_name']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_email" class="form-label">Student Email</label>
                                <input type="email" class="form-control s_email" name="s_email" id="s_email" value="<?= $row['s_email']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_phone" class="form-label">Student Phone</label>
                                <input type="tel" class="form-control s_phone" name="s_phone" id="s_phone" value="<?= $row['s_phone']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control s_birth" name="s_birth" id="s_birth" value="<?= $row['s_birth']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <label for="s_gender" class="form-label">Gender</label>
                                <div class="input-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio1" value="0" <?= ($row['s_gender'] == 0 ? 'checked': ''); ?>>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="s_gender" id="inlineRadio2" value="1" <?= ($row['s_gender'] == 1 ? 'checked': ''); ?>>
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

                            <button type="submit" class="btn btn-warning" name="btn_update">Update</button> 
                        </form>
                    </div>
                </div>
                

            </div>
        </div> 
    </div>

    <?php include_once('../inc/footer.php'); ?>

<?php
    unset($_SESSION['success']);
    unset($_SESSION['error']);
    unset($_SESSION['message']);
    session_destroy();
?>
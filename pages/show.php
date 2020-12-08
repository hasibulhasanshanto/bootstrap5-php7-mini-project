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

    $readSql = "SELECT * FROM student_info ORDER BY id desc";

    $read = mysqli_query($conn, $readSql);
    if($read){ 
        $datas = $read;
    } else{
        $error = 'Something went wrong :(';
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
                    <h3 class="card-header">All Student Info</h3>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered mt-3">
                            <tr>
                                <th># SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <?php foreach($datas as $key=> $row): ?>
                                <tr>
                                    <td><?= $key+1; ?></td> 
                                    <td><?= $row['s_name']; ?></td> 
                                    <td><?= $row['s_email']; ?></td> 
                                    <td><?= $row['s_phone']; ?></td> 
                                    <td><?= $row['s_birth']; ?></td> 
                                    <td>
                                        <?= ($row['s_gender'] == 0 ? 'Male':'Female') ; ?>
                                    </td> 
                                    <td class="text-center">
                                        <a href="../lib/edit.php?id=<?= $row['id']?>" class="btn btn-warning">Edit</a>
                                        <a href="../lib/delete.php?id=<?= $row['id']?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>             

                    </div>
                </div>                
            </div>
        </div> 
    </div>

    <?php include_once('../inc/footer.php'); ?>

<?php
    unset($_SESSION['success']);
    unset($_SESSION['error']);
    session_destroy();
?>
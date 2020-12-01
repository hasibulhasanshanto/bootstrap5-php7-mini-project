<?php 
    require_once('connection.php');
    // Start the session 
    session_start(); 

    ## Student Delete Area
    $deleteSql = "DELETE FROM student_info WHERE id='". $_GET['id'] ."' ";
    $delete = mysqli_query($conn, $deleteSql);

    if($delete){ 
        
        $success = 'Delete Successfully';
        $_SESSION["success"] = $success;
        header("Location: ../pages/show.php");

    } else{

        $error = 'Error deleting record :('. mysql_error($conn);
        $_SESSION["error"] = $error;
        header("Location: ../pages/show.php");
    }

?>
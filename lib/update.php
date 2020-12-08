<?php
    require_once('connection.php');
    // Start the session
    // session_start();
    $id = ''; 

    if (isset($_POST['btn_update'])){
        $s_name = $_POST["s_name"];
        $s_email = $_POST['s_email'];
        $s_phone = $_POST['s_phone'];
        $s_birth = $_POST['s_birth'];
        $s_gender = $_POST['s_gender'];
        $s_pass = $_POST['s_pass']; 
        $c_pass = $_POST['c_pass']; 
 

        if(!($s_pass == $c_pass)){

            $message = 'Password doesn\'t Match';
            $_SESSION["message"] = $message;

        } 
        else{ 
            
            $id = $_GET['id'];  
            $s_pass = md5($s_pass);

            $updateSql = "UPDATE student_info SET s_name='{$s_name}', s_email='{$s_email}', s_phone='{$s_phone}', s_birth='{$s_birth}', s_gender='{$s_gender}', s_pass='{$s_pass}' WHERE id='{$id}' ";

            $update = mysqli_query($conn, $updateSql); 

            if($update){
                $success = 'Data Update is Successful...!';                
                // Set session variables
                $_SESSION["success"] = $success;
                header('Location: ../pages/show.php'); 

            } else{ 
                $error = 'Data Update Uccessful. :('. mysql_error($conn);

                $_SESSION["error"] = $error;
                header("Location: ../pages/show.php"); 
            }
            
        }
    }   
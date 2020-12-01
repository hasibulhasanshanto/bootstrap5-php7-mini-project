<?php  
    ## Student Read Area 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $showSql = "SELECT * FROM student_info WHERE id=$id ";
        $result = mysqli_query($conn, $showSql);
        
        // $row = mysqli_fetch_assoc($result); 
        $row = mysqli_fetch_array($result); 
    }
?>
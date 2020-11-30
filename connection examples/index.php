<?php
/**
 * HOW TO CONNECT DATABASE WITH PHP & MYSQL
 * https://www.studentstutorial.com/php/php-mysqli-connection
 * https://www.w3schools.com/php/php_mysql_connect.asp
 * https://www.w3schools.com/php/func_mysqli_connect.asp
 */
    ## mysqli_connect type 1
    // $conn = mysqli_connect('localhost', 'root1', '', 'php_crud');
    
    ## mysqli_connect type 2
    $servername    = "localhost";
    $username      = "root";
    $password      = "";
    $db            = "php_crud";
    // Create connection
    ## PHP is not case sensative    
    // $conn = new mysqli($servername, $username, $password, $db); 
    $conn = new MYSQLi($servername, $username, $password, $db); 
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else{
        echo "Connected successfully";
    }

?>
<!DOCTYPE html>
<html lang="en">


    <h1>
        <?php if($conn):?>
            <?php echo "Connected";?>
        
        <?php else: ?>
            <?php 
                echo "Failed " .mysqli_connect_error(); 
                // die("Unable to connect to MySQL: " . mysqli_error()); 
            ?>
        <?php endif; ?>
    </h1>

    
</body>
</html>
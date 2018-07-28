<?php
    
    session_start();

    require 'db_connect.php';

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE admin_email = '$email' AND admin_password = '$password'";
    $sql1 = "SELECT * FROM tbl_doctor WHERE doctor_email = '$email'";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $active = $row['admin_name'];
    $count = mysqli_num_rows($result);
     
    if ($count == 1) {
        $_SESSION["admin_name"] = $row['admin_name'];
        $_SESSION["type"] = $row['type'];
        if($row['type']==2){
            $_SESSION["id"] = $row1['doctor_id'];
        }else{
            $_SESSION["id"] = $row['admin_id'];
        }

        header("location: http://localhost/htdocs/new/index.php");
    } 
    
    else {
        header("location: http://localhost/htdocs/new/failed.php");
    }
}
else
    echo "not posted";
?>
<?php
    session_start();
    $admin_name=$_SESSION["admin_name"];

    if ($admin_name == NULL)
    {
        header("location: http://localhost/htdocs/new/login.php");
    }
    require 'function/db_connect.php';

    $sql = "SELECT * FROM tbl_department";
    $result = mysqli_query($conn, $sql);

    $doctor_name=filter_input(INPUT_POST, 'doctor_name');
    $department_id=filter_input(INPUT_POST, 'department_id');
    $doctor_address=filter_input(INPUT_POST, 'doctor_address');
    $doctor_phone=filter_input(INPUT_POST, 'doctor_phone');
    $doctor_email=filter_input(INPUT_POST, 'doctor_email');
    $doctor_visiting_hour=filter_input(INPUT_POST, 'doctor_visiting_hour');
    $doctor_status=filter_input(INPUT_POST, 'doctor_status');
    $doctor_password=filter_input(INPUT_POST, 'doctor_password');

    $sql_insert = "INSERT INTO tbl_doctor (doctor_name,department_id,doctor_address,doctor_phone,doctor_email,doctor_visiting_hour,doctor_status)
        VALUES ('$doctor_name','$department_id','$doctor_address','$doctor_phone','$doctor_email','$doctor_visiting_hour','$doctor_status')";
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>HMS Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>

    <body> 
        <div class="wrapper" style="height: 1000px;">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">    
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="index.php" class="simple-text">                             HMS                         </a>
                    </div>
                    <?php require 'content/nav.php'; ?> 
                </div>
            </div>
            <div class="main-panel">
                <?php require 'content/header.php'; ?>
                <?php require 'content/add_doctor.php'; ?>
                <?php require 'content/footer.php'; ?>
            </div>   
        </div>
    </body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        $('#Form').validate();
    </script>
</html>
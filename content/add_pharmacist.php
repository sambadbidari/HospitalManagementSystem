<?php
session_start();
$admin_name=$_SESSION["admin_name"];

if ($admin_name == NULL)
{
    header("location: http://localhost/htdocs/new/login.php");
}
require '../function/db_connect.php';
$sql = "SELECT * FROM tbl_pharmacist";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HMS Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper"  style="height: 1000px !important;">
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../index.php" class="simple-text">
                    HMS
                </a>
            </div>


            <ul class="nav">
                <li class="active">
                    <a href="../index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_bed.php">
                        <i class="pe-7s-albums"></i>
                        <p>Bed Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_test.php">
                        <i class="pe-7s-graph3"></i>
                        <p>Test Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_ward.php">
                        <i class="pe-7s-culture"></i>
                        <p>Ward Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_admin.php">
                        <i class="pe-7s-user"></i>
                        <p>Admin Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_report.php">
                        <i class="pe-7s-menu"></i>
                        <p>Report Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_doctor.php">
                        <i class="pe-7s-id"></i>
                        <p>Doctor Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_patient.php">
                        <i class="pe-7s-umbrella"></i>
                        <p>Patient Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_department.php">
                        <i class="pe-7s-drawer"></i>
                        <p>Department Manager</p>
                    </a>
                </li>
                <li>
                    <a href="pharmacist_manager.php">
                        <i class="pe-7s-drawer"></i>
                        <p>Pharmacist Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_account.php">
                        <i class="pe-7s-drawer"></i>
                        <p>Account Manager</p>
                    </a>

            </ul>


        </div>
    </div>
    <div class="main-panel">
        <?php require 'header.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <ol class="breadcrumb">
                                <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li><a href="pharmacist_manager.php"><i class="fa fa-globe"></i> Manage Pharmacist</a></li>
                                <li class="active">Add Pharmacist</li>
                            </ol>
                            <div class="header">
                                <h4 class="title">Add Pharmacist</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post">
                                    <?php
                                    if (!empty($pharmacist_name)) {
                                        if (mysqli_query($conn, $sql_insert)) {
                                            echo "New record created successfully";
                                        } else {
                                            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                                        }
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Name</label>
                                                <input type="text" name="pharmacist_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Address</label>
                                                <input type="text" name="pharmacist_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Phone</label>
                                                <input type="text" name="pharmacist_phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Email</label>
                                                <input type="text" name="pharmacist_email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Password</label>
                                                <input type="text" name="pharmacist_password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-info btn-fill">Add Pharmacist</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['submit'])){
                $pharmacist_name = $_POST['pharmacist_name'];
                $pharmacist_address = $_POST['pharmacist_address'];
                $pharmacist_phone = $_POST['pharmacist_phone'];
                $pharmacist_email = $_POST['pharmacist_email'];
                $pharmacist_password = $_POST['pharmacist_password'];

                $query = "INSERT INTO tbl_pharmacist (pharmacist_name, pharmacist_address,pharmacist_phone,pharmacist_email) VALUES ('$pharmacist_name','$pharmacist_address','$pharmacist_phone','$pharmacist_email' )";
                $result = mysqli_query($conn , $query);
                if ($result){
                    $query = "INSERT INTO tbl_admin (admin_name, admin_email, admin_password, admin_status, type) VALUES ('$pharmacist_name','$pharmacist_email','$pharmacist_password', 1, 3 )";
                    $result = mysqli_query($conn , $query);
                    echo("<script>location.href = 'pharmacist_manager.php';</script>");
                }
                else
                    echo "error!! pharmacist not added";
            }
        ?>
        ?>

        <?php require 'footer.php'; ?>
    </div>
</div>
</body>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>



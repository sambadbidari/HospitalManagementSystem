

<?php
session_start();
$admin_name=$_SESSION["admin_name"];

if ($admin_name == NULL)
{
    header("location: http://localhost/htdocs/new/login.php");
}
require '../function/db_connect.php';
$sql1 = "SELECT * FROM tbl_pharmacist WHERE pharmacist_id = ".$_GET['id'];
$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_assoc($result)){
    $pharmacists[] = $row;
}
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

        <?php
        $pharmacist_id = filter_input(INPUT_POST, 'pharmacist_id');
        $pharmacist_name=filter_input(INPUT_POST, 'pharmacist_name');
        $pharmacist_address=filter_input(INPUT_POST, 'pharmacist_address');
        $pharmacist_phone=filter_input(INPUT_POST, 'pharmacist_phone');
        $pharmacist_email=filter_input(INPUT_POST, 'pharmacist_email');
        $sql2 = "UPDATE tbl_pharmacist SET pharmacist_name='$pharmacist_name', pharmacist_address='$pharmacist_address',
 pharmacist_phone='$pharmacist_phone', pharmacist_email='$pharmacist_email' WHERE pharmacist_id=$pharmacist_id ";
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <ol class="breadcrumb">
                                <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li><a href="pharmacist_manager.php"><i class="fa fa-globe"></i> Manage Pharmacist</a></li>
                                <li class="active">Edit Pharmacist</li>
                            </ol>
                            <div class="header">
                                <h4 class="title">Edit Pharmacist</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" name="edit_pharmacist">
                                    <?php
                                    if (!empty($pharmacist_name)) {
                                        if (mysqli_query($conn, $sql2)) {
                                            echo("<script>location.href = 'pharmacist_manager.php';</script>");
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Name</label>
                                                <input type="text" name="pharmacist_name" value="<?php echo $pharmacists[0]['pharmacist_name']?>" class="form-control">
                                                <input type="hidden" name="pharmacist_id" value="<?php echo $pharmacists[0]['pharmacist_id']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Address</label>
                                                <input type="text" name="pharmacist_address" value="<?php echo $pharmacists[0]['pharmacist_address']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Phone</label>
                                                <input type="text" name="pharmacist_phone" value="<?php echo $pharmacists[0]['pharmacist_phone']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Pharmacist Email</label>
                                                <input type="text" name="pharmacist_email" value="<?php echo $pharmacists[0]['pharmacist_email']?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill">Edit Pharmacist</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php require 'footer.php'; ?>
    </div>
</div>
</body>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>
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
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">
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
                <li class="<?php if (basename($_SERVER['PHP_SELF'])=='index.php') echo 'active';?>">
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
                        <p>User Manager</p>
                    </a>
                </li>
                <li>
                    <a href="../manage_report.php">
                        <i class="pe-7s-menu"></i>
                        <p>Report Manager</p>
                    </a>
                </li>
                <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_receptionist.php'|| basename($_SERVER['PHP_SELF'])=='add_receptionist.php'|| basename($_SERVER['PHP_SELF'])=='edit_receptionist.php') echo 'active';?>">
                    <a href="../manage_receptionist.php">
                        <i class="pe-7s-menu"></i>
                        <p>Receptionist Manager</p>
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
                <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_medicine.php') echo 'active';?>">
                    <a href="../manage_medicine.php">
                        <i class="pe-7s-drawer"></i>
                        <p>Medicine Manager</p>
                    </a>
                </li>
                <li class="<?php if (basename($_SERVER['PHP_SELF'])=='pharmacist_manager.php') echo 'active';?>">
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


        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <ol class="breadcrumb">
                                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li><a href="add_pharmacist.php"><i class="fa fa-globe"></i> Add Pharmacist</a></li>
                                <li class="active">Pharmacist Manager</li>
                                <li><a href="add_medicin_to_patient.php">Attach Medicine to patient</a></li>
                            </ol>
                            <div class="header">
                                <h4 class="title">Pharmacist Manager</h4>
                                <p class="category">Here is you can manage your Hospital Pharmacists</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="myTable">
                                    <thead>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['pharmacist_name'] ?></td>
                                            <td><?php echo $row['pharmacist_address'] ?></td>
                                            <td><?php echo $row['pharmacist_phone'] ?></td>
                                            <td><?php echo $row['pharmacist_email'] ?></td>
                                            <td>
                                                <a href="edit_pharmacist.php?id=<?php echo $row['pharmacist_id']; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Pharmacist"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="../function/delete_pharmacist.php?id=<?php echo $row['pharmacist_id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Pharmacist" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
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
<script src="../assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../assets/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../assets/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="../assets/js/jszip.min.js" type="text/javascript"></script>
<script src="../assets/js/pdfmake.min.js" type="text/javascript"></script>
<script src="../assets/js/vfs_fonts.js" type="text/javascript"></script>
<script src="../assets/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="../assets/js/buttons.print.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>
</html>

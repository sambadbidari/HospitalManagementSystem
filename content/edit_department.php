<?php
$department_id = filter_input(INPUT_POST, 'department_id');
$department_name = filter_input(INPUT_POST, 'department_name');
$sql = "UPDATE tbl_department SET department_name='$department_name' WHERE department_id='$department_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_department.php"><i class="fa fa-globe"></i> Manage Department</a></li>
                        <li class="active">Edit Department</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Department</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                                if (!empty($department_id)) {
                                    if (mysqli_query($conn, $sql)) {
                                        echo "Update record created successfully";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input type="text" name="department_name" class="form-control" value="<?php echo $row['department_name']?>">
                                        <input type="hidden" name="department_id" class="form-control" value="<?php echo $row['department_id']?>">
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Department</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
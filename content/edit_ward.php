<?php
$ward_id = filter_input(INPUT_POST, 'ward_id');
$ward_name = filter_input(INPUT_POST, 'ward_name');
$sql = "UPDATE tbl_ward SET ward_name='$ward_name' WHERE ward_id='$ward_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_ward.php"><i class="fa fa-globe"></i> Manage Test</a></li>
                        <li class="active">Edit Test</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Test</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                                if (!empty($ward_id)) {
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
                                        <label>Test Name</label>
                                        <input type="text" name="ward_name" class="form-control" value="<?php echo $row['ward_name']?>">
                                        <input type="hidden" name="ward_id" class="form-control" value="<?php echo $row['ward_id']?>">
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Test</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
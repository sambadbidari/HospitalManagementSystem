<?php
$bed_id = filter_input(INPUT_POST, 'bed_id');
$bed_name = filter_input(INPUT_POST, 'bed_name');
$bed_fee = filter_input(INPUT_POST, 'bed_fee');
$bed_total_sit = filter_input(INPUT_POST, 'bed_total_sit');
$sql = "UPDATE tbl_bed SET bed_name='$bed_name', bed_fee='$bed_fee', bed_total_sit='$bed_total_sit' WHERE bed_id='$bed_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_bed.php"><i class="fa fa-globe"></i> Manage Bed</a></li>
                        <li class="active">Edit Bed</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Bed</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                                if (!empty($bed_id)) {
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
                                        <label>Bed Name</label>
                                        <input type="text" name="bed_name" class="form-control" value="<?php echo $row['bed_name']?>">
                                        <input type="hidden" name="bed_id" class="form-control" value="<?php echo $row['bed_id']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>BED FEE</label>
                                        <input type="text" name="bed_fee" class="form-control" value="<?php echo $row['bed_fee']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>SIT CAPACITY</label>
                                        <input type="text" name="bed_total_sit" class="form-control" value="<?php echo $row['bed_total_sit']?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Bed</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
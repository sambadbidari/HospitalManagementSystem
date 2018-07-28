<?php
$test_id = filter_input(INPUT_POST, 'test_id');
$test_name = filter_input(INPUT_POST, 'test_name');
$cost = filter_input(INPUT_POST, 'cost');
$sql = "UPDATE tbl_test SET test_name='$test_name', cost='$cost' WHERE test_id='$test_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_test.php"><i class="fa fa-globe"></i> Manage Test</a></li>
                        <li class="active">Edit Test</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Test</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                                if (!empty($test_id)) {
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
                                        <input type="text" name="test_name" class="form-control" value="<?php echo $row['test_name']?>">
                                        <input type="hidden" name="test_id" class="form-control" value="<?php echo $row['test_id']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Test Fee</label>
                                        <input type="text" name="cost" class="form-control" value="<?php echo $row['cost']?>">
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
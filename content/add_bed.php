<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_bed.php"><i class="fa fa-globe"></i> Manage Bed</a></li>
                        <li class="active">Add Bed</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Bed</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form">
                            <?php
                                if (!empty($bed_name)) {
                                    if (mysqli_query($conn, $sql)) {
                                        echo "New record created successfully";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Bed Name</label>
                                        <input type="text" name="bed_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>BED FEE</label>
                                        <input type="text" name="bed_fee" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>SIT CAPACITY</label>
                                        <input type="text" name="bed_total_sit" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Bed</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
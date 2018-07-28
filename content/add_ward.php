<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_ward.php"><i class="fa fa-globe"></i> Manage Ward</a></li>
                        <li class="active">Add Ward</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Ward</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form">
                            <?php
                                if (!empty($ward_name)) {
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
                                        <label>*Ward Name</label>
                                        <input type="text" name="ward_name" class="form-control" required>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Ward</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
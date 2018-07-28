<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_department.php"><i class="fa fa-globe"></i> Manage Department</a></li>
                        <li class="active">Add Department</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Department</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                                if (!empty($department_name)) {
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
                                        <label>Department Name</label>
                                        <input type="text" name="department_name" class="form-control">
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Department</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
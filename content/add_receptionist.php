<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_receptionist.php"><i class="fa fa-globe"></i> Manage Receptionist</a></li>
                        <li class="active">Add Receptionist</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Receptionist</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form">
                            <?php
                            if (!empty($receptionist_name)) {
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
                                        <label>*Receptionist Name</label>
                                        <input type="text" name="receptionist_name" class="form-control" placeholder="Enter Receptionist Name" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Email</label>
                                        <input type="email" name="receptionist_email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Password</label>
                                        <input type="password" name="receptionist_password" minlength="4" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Receptionist</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
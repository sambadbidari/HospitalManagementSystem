<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_admin.php"><i class="fa fa-globe"></i> Manage User</a></li>
                        <li class="active">Add Admin</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Admin</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form"
                            <?php
                                if (!empty($admin_name)) {
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
                                        <label>*Admin Name</label>
                                        <input type="text" name="admin_name" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Admin Email</label>
                                        <input type="email" name="admin_email" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Admin Password</label>
                                        <input type="password" minlength="4" name="admin_password" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Admin Status</label>
                                        <select name="admin_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div> 
                                </div> <div class="clearfix"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                <button type="submit" class="btn btn-info btn-fill">Add Admin</button>
                                    </div>
                                </div>
                            </div>

                        <br> <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
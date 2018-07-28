<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Change Password</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Change Password</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                            if (!empty($new_password)) {
                                mysqli_query($conn, $sql);
                                $count = mysqli_affected_rows($conn);
                                if ($count) {
                                    echo "Password has been successfully changed!";
                                } else {
                                    echo "Password has not changed!";
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="text" name="old_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="text" name="new_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Change Password</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
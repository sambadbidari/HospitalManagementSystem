<?php
$admin_id = filter_input(INPUT_POST, 'admin_id');
$admin_name = filter_input(INPUT_POST, 'admin_name');
$admin_email = filter_input(INPUT_POST, 'admin_email');
$admin_password = filter_input(INPUT_POST, 'admin_password');
$admin_status = filter_input(INPUT_POST, 'admin_status');
$sql = "UPDATE tbl_admin SET admin_name='$admin_name', admin_email='$admin_email', admin_password='$admin_password', admin_status='$admin_status' WHERE admin_id='$admin_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_admin.php"><i class="fa fa-globe"></i> Manage Admin</a></li>
                        <li class="active">Edit Admin</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Admin</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_admin">
                            <?php
                                if (!empty($admin_id)) {
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
                                        <label>Admin Name</label>
                                        <input type="text" name="admin_name" value="<?php echo $row['admin_name']?>" class="form-control">
                                        <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']?>">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Admin Email</label>
                                        <input type="email" name="admin_email" value="<?php echo $row['admin_email']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Admin Password</label>
                                        <input type="text" name="admin_password" value="<?php echo $row['admin_password']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Admin Status</label>
                                        <select name="admin_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Admin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
<script>
    document.forms['edit_admin'].elements['admin_status'].value = '<?php echo $row['admin_status']?>';
</script>
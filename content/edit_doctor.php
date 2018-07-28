<?php
    $doctor_id = filter_input(INPUT_POST, 'doctor_id');
    $doctor_name=filter_input(INPUT_POST, 'doctor_name');
    $department_id=filter_input(INPUT_POST, 'department_id');
    $doctor_address=filter_input(INPUT_POST, 'doctor_address');
    $doctor_phone=filter_input(INPUT_POST, 'doctor_phone');
    $doctor_email=filter_input(INPUT_POST, 'doctor_email');
    $doctor_visiting_hour=filter_input(INPUT_POST, 'doctor_visiting_hour');
    $doctor_status=filter_input(INPUT_POST, 'doctor_status');
    $sql = "UPDATE tbl_doctor SET doctor_name='$doctor_name', department_id='$department_id', doctor_address='$doctor_address', doctor_phone='$doctor_phone', doctor_email='$doctor_email', doctor_visiting_hour='$doctor_visiting_hour', doctor_status='$doctor_status' WHERE doctor_id='$doctor_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_doctor.php"><i class="fa fa-globe"></i> Manage Doctor</a></li>
                        <li class="active">Edit Doctor</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Doctor</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_doctor">
                            <?php
                                if (!empty($doctor_name)) {
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
                                        <label>Doctor Name</label>
                                        <input type="text" name="doctor_name" value="<?php echo $row['doctor_name']?>" class="form-control">
                                        <input type="hidden" name="doctor_id" value="<?php echo $row['doctor_id']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Department</label>
                                        <select name="department_id" class="form-control">
                                            <?php
                                            while ($department = mysqli_fetch_assoc($all_department)) {
                                                ?> 
                                                <option value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Address</label>
                                        <textarea rows="5" name="doctor_address" value="<?php echo $row['doctor_address']?>" class="form-control"></textarea>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Phone</label>
                                        <input type="text" name="doctor_phone" value="<?php echo $row['doctor_phone']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Email</label>
                                        <input type="text" name="doctor_email" value="<?php echo $row['doctor_email']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Visiting Hour</label>
                                        <input type="text" name="doctor_visiting_hour" value="<?php echo $row['doctor_visiting_hour']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Status</label>
                                        <select name="doctor_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Doctor</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<script>
    document.forms['edit_doctor'].elements['doctor_status'].value = '<?php echo $row['doctor_status']?>';
    document.forms['edit_doctor'].elements['department_id'].value = '<?php echo $row['department_id']?>';
</script>
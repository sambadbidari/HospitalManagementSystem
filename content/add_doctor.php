<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_doctor.php"><i class="fa fa-globe"></i> Manage Doctor</a></li>
                        <li class="active">Add Doctor</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Doctor</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form">
                            <?php
                                if (!empty($doctor_name)) {
                                    if (mysqli_query($conn, $sql_insert)) {
                                        $query = "INSERT INTO tbl_admin (admin_name, admin_email, admin_password, admin_status, type) VALUES ('$doctor_name','$doctor_email','$doctor_password', $doctor_status, 2 )";
                                        $result = mysqli_query($conn , $query);
                                        echo "New record created successfully";
                                    } else {
                                        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                                    }
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Name</label>
                                        <input type="text" name="doctor_name" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Department</label>
                                        <select name="department_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?> 
                                                <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Address</label>
                                        <textarea rows="5" name="doctor_address" class="form-control"></textarea>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Phone</label>
                                        <input type="text" name="doctor_phone"  class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Email</label>
                                        <input type="email" name="doctor_email" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor Visiting Hour</label>
                                        <input type="text" name="doctor_visiting_hour" class="form-control" >
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Password</label>
                                        <input type="password" name="doctor_password" minlength="4" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Doctor Status</label>
                                        <select name="doctor_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Doctor</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
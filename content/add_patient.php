<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_patient.php"><i class="fa fa-globe"></i> Manage Patient</a></li>
                        <li class="active">Add Patient</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Patient</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" id="Form">
                            <?php
                                if (!empty($patient_name)) {
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
                                        <label>*Select Ward</label>
                                        <select name="ward_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_ward)) {
                                                ?> 
                                                <option value="<?php echo $row['ward_id'] ?>"><?php echo $row['ward_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Select Bed</label>
                                        <select name="bed_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_bed)) {
                                                ?>
                                                <option value="<?php echo $row['bed_id'] ?>"><?php echo $row['bed_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Select Doctor</label>
                                        <select name="doc_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_doctor)) {
                                                ?>
                                                <option value="<?php echo $row['doctor_id'] ?>"><?php echo $row['doctor_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Patient Name</label>
                                        <input type="text" name="patient_name" class="form-control" placeholder="Enter Patient Name" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea rows="5" name="patient_address" class="form-control"></textarea>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Phone</label>
                                        <input type="text" name="patient_phone" class="form-control" required>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>NID</label>
                                        <input type="text" name="patient_nid" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>*Admission Date</label>
                                        <input type="text" id="date" name="admission_date" class="form-control" required>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Patient</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
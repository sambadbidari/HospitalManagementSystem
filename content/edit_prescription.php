<?php
    $prescription_id=filter_input(INPUT_POST, 'prescription_id');
    $doctor_id=filter_input(INPUT_POST, 'doctor_id');
    $patient_id=filter_input(INPUT_POST, 'patient_id');
    $prescription=filter_input(INPUT_POST, 'prescription');

    $sql = "UPDATE tbl_prescription SET doctor_id='$doctor_id', patient_id='$patient_id', prescription='$prescription' WHERE prescription_id='$prescription_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_prescription.php"><i class="fa fa-globe"></i> Manage Prescription</a></li>
                        <li class="active">Edit Prescription</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Prescription</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_prescription">
                            <?php
                            if (!empty($doctor_id)) {
                                if (mysqli_query($conn, $sql)) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <?php if($type == 2){?>
                                        <label>Doctor</label>
                                        <input type="text" name="doctor" class="form-control" value="<?php echo $admin_name; ?>" disabled>
                                        <input type="hidden" name="doctor_id" value="<?php echo $id; ?>">
                                    <?php } else{?>
                                    <div class="form-group">
                                        <label>Select Doctor</label>
                                        <select name="doctor_id" class="form-control">
                                            <?php
                                            while ($doctor = mysqli_fetch_assoc($all_doctor)) {
                                                ?> 
                                                <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['doctor_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Select Patient</label>
                                        <select name="patient_id" class="form-control">
                                            <?php
                                            while ($patient = mysqli_fetch_assoc($all_patient)) {
                                                ?> 
                                                <option value="<?php echo $patient['patient_id'] ?>"><?php echo $patient['patient_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Prescription</label>
                                        <textarea name="prescription" class="form-control"><?php echo $all_prescription['prescription']?></textarea>
                                        <input type="hidden" name="prescription_id" value="<?php echo $all_prescription['prescription_id']?>">
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Prescription</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
<script>
    document.forms['edit_prescription'].elements['doctor_id'].value = '<?php echo $all_prescription['doctor_id']?>';
    document.forms['edit_prescription'].elements['patient_id'].value = '<?php echo $all_prescription['patient_id']?>';
</script>
<?php
    $ward_id=filter_input(INPUT_POST, 'ward_id');
    $bed_id=filter_input(INPUT_POST, 'bed_id');
    $patient_id=filter_input(INPUT_POST, 'patient_id');
    $patient_name=filter_input(INPUT_POST, 'patient_name');
    $patient_address=filter_input(INPUT_POST, 'patient_address');
    $patient_phone=filter_input(INPUT_POST, 'patient_phone');
    $patient_nid=filter_input(INPUT_POST, 'patient_nid');
    $amount=filter_input(INPUT_POST, 'amount');


    $sql = "UPDATE account SET ward_id='$ward_id', bed_id='$bed_id', patient_name='$patient_name', patient_address='$patient_address', patient_phone='$patient_phone', patient_nid='$patient_nid', amount='$amount' WHERE id='$patient_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_account.php"><i class="fa fa-globe"></i> Manage Account</a></li>
                        <li class="active">Edit Transaction</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Transaction</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_patient">
                            <?php
                                if (!empty($patient_name)) {
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
                                        <label>Select Ward</label>
                                        <select name="ward_id" class="form-control">
                                            <?php
                                            while ($ward = mysqli_fetch_assoc($all_ward)) {
                                                ?> 
                                                <option value="<?php echo $ward['ward_id'] ?>"><?php echo $ward['ward_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Select Bed</label>
                                        <select name="bed_id" class="form-control">
                                            <?php
                                            while ($bed = mysqli_fetch_assoc($all_bed)) {
                                                ?> 
                                                <option value="<?php echo $bed['bed_id'] ?>"><?php echo $bed['bed_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input type="text" name="patient_name" value="<?php echo $all_patient['patient_name']?>" class="form-control">
                                        <input type="hidden" name="patient_id" value="<?php echo $all_patient['patient_id']?>">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea rows="5" name="patient_address" class="form-control"><?php echo $all_patient['patient_address']?></textarea>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="patient_phone" value="<?php echo $all_patient['patient_phone']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>NID</label>
                                        <input type="text" name="patient_nid" value="<?php echo $all_patient['patient_nid']?>" class="form-control">
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Amount</label>
										<input type="text" name="amount" value="<?php echo $all_patient['amount']?>" class="form-control">
                                     
                                    </div>        
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Patient</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
<script>
    document.forms['edit_patient'].elements['ward_id'].value = '<?php echo $all_patient['ward_id']?>';
    document.forms['edit_patient'].elements['bed_id'].value = '<?php echo $all_patient['bed_id']?>';
</script>
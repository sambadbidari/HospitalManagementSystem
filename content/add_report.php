<?php
$patient = "SELECT * FROM tbl_patient";
$all_patient = mysqli_query($conn, $patient);

$test = "SELECT * FROM tbl_test";
$all_test = mysqli_query($conn, $test);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_report.php"><i class="fa fa-globe"></i> Manage Report</a></li>
                        <li class="active">Add Report</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Report</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                            if (!empty($patient_id)) {
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
                                        <label>Select Patient</label>
                                        <select name="patient_id" class="form-control" id="combobox">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_patient)) {
                                                ?> 
                                                <option value="<?php echo $row['patient_id'] ?>"><?php echo $row['patient_phone'].'('. $row['patient_name'].')';?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Select Test</label>
                                        <select name="test_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_test)) {
                                                ?> 
                                                <option value="<?php echo $row['test_id'] ?>"><?php echo $row['test_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="report_description" class="form-control"></textarea>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">   
                                        <label>
                                            <input type="radio" name="report_result" value="Positive"> Positive
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">   
                                        <label>
                                            <input type="radio" name="report_result" value="Negative"> Negative
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Published Date</label>
                                        <input type="date" name="report_published_date" class="form-control">
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Report</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
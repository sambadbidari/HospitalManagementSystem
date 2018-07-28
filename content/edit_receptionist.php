<?php

$receptionist_id = filter_input(INPUT_POST, 'receptionist_id');
$receptionist_name = filter_input(INPUT_POST, 'receptionist_name');
$receptionist_email = filter_input(INPUT_POST, 'receptionist_email');

$sql = "UPDATE tbl_admin SET admin_name='$receptionist_name', admin_email='$receptionist_email' WHERE admin_id='$receptionist_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_receptionist.php"><i class="fa fa-globe"></i> Manage Receptionist</a></li>
                        <li class="active">Edit Receptionist</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Receptionist</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_report">
                            <?php
                            if (!empty($receptionist_id)) {
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
                                        <label>Name</label>
                                        <input name="receptionist_id" type="hidden" class="form-control" value="<?php echo $receptionist['admin_id']?>" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="receptionist_name" class="form-control" value="<?php echo $receptionist['admin_name']?>" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="receptionist_email" class="form-control" value="<?php echo $receptionist['admin_email']?>" >
                                    </div>
                                </div>
                                <div style="clear: both;"></div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Receptionist</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['edit_report'].elements['patient_id'].value = '<?php echo $specific_report['patient_id']?>';
    document.forms['edit_report'].elements['test_id'].value = '<?php echo $specific_report['test_id']?>';
    document.forms['edit_report'].elements['report_result'].value = '<?php echo $specific_report['report_result']?>';
</script>
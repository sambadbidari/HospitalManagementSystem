<?php
    $testBills = null;
    $patientDetails = null;
    $reports = null;
    $tot = 0;
    if(isset($_POST['GenerateBill']) && isset($_POST['patient_id'])){
        $patient_id = $_POST['patient_id'];
        $sql = "SELECT * FROM tbl_patient WHERE patient_id=".$patient_id;
        $result = mysqli_query($conn, $sql);
        $patientDetails = mysqli_fetch_assoc($result);
        $date1=date_create($patientDetails['admission_date']);
        $date2=date_create($patientDetails['release_date']);
        $diff=date_diff($date1,$date2);
        $sql = "SELECT * FROM tbl_bed WHERE bed_id=". $patientDetails['bed_id'];
        $result1 = mysqli_query($conn, $sql);
        $bed = mysqli_fetch_assoc($result1);
        $sql = "SELECT * FROM tbl_report, tbl_test WHERE patient_id=".$patient_id." and tbl_report.test_id=tbl_test.test_id";
        $reports = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM 	tbl_medicine_history WHERE patient_id=".$patient_id;
        $medicines = mysqli_query($conn, $sql);
    }
$sql = "SELECT * FROM tbl_patient";
$result = mysqli_query($conn, $sql);
?>
<script>
    function check_delete()
    {
        var chk = confirm('Are You Want To Delete This');
        if (chk)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">                   
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <?php if($_SESSION['type'] == 1){?>
                        <li><a href="add_account.php"><i class="fa fa-globe"></i> Account Manager</a></li>
                        <?php } ?>
                        <li class="active">Bills</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Bill Generation</h4>
                    </div>
                    <div class="content">
                        <div class="billing-form">
                            <form action="" method="post">
                                <div class="form-group col-md-4 col-md-offset-4" style="">
                                    <label for="patient_id" style="font-weight: bold; font-size: 15px; text-transform: none;">Patient</label>
                                    <select name="patient_id" id="combobox" class="form-control">
                                        <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['patient_id'] ?>" <?php if(isset($patientDetails)&&$patientDetails){if($patientDetails['patient_id']==$row['patient_id']) echo 'selected'; } ?>><?php echo $row['patient_phone'].'('. $row['patient_name'].')';?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <input type="submit" name="GenerateBill" class="btn pull-right" value="Generate Bill">
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix"></div>
                            <br>
                        </div>

                    </div>
                </div>
            </div>  
        </div>
    <?php if($patientDetails){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 40px 30px;">

                    <div class="header">
                        <h3 class="title" style="text-align: center; color: #000;">Hospital Management System</h3>
                    </div>
                    <br> <br>
                    <div class="content">
                        <fieldset style="width: 80%; margin: auto;">
                            <legend>Patient Details:</legend>
                            <table class="table table-borderless" style="border: none !important;">
                                <tr class="table-borderless">
                                    <td class="text-right">Name</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_name']; ?></td>
                                    <td></td>
                                    <td class="text-right">Contact</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">NID</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_nid']; ?></td>
                                    <td></td>
                                    <td class="text-right">Admission Date</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['admission_date']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Address</td>
                                    <td>:</td>
                                    <td colspan="5"><?php echo $patientDetails['patient_address']; ?></td>
                                </tr>
                            </table>
                        </fieldset> <br> <br>
                        <?php if(isset($reports)&&$reports!=null && mysqli_num_rows($reports)){?>
                        <fieldset style="width: 80%; margin: auto;">
                            <legend>#Test Bill</legend>
                            <table class="table table-borderless" style="border: none !important;">
                                <tr>
                                    <td class="">Test Name</td>
                                    <td class="">Result</td>
                                    <td class="">Publishing Date</td>
                                    <td class="">Testing Cost</td>
                                </tr>
                                <?php
                                    $total = 0;
                                    while ($row = mysqli_fetch_assoc($reports)) {
                                ?>
                                <tr class="table-borderless">
                                    <td><?php echo $row['test_name']; ?></td>
                                    <td><?php echo $row['report_result']; ?></td>
                                    <td><?php echo $row['report_published_date']; ?></td>
                                    <td><?php echo $row['cost']; $total+=$row['cost']; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><strong><?php echo $total; $tot+=$total; ?></strong></td>
                                </tr>
                            </table>
                        </fieldset>
                        <?php } ?>

                        <?php if(isset($reports)&&$reports!=null && mysqli_num_rows($medicines)){?>
                            <fieldset style="width: 80%; margin: auto;">
                                <legend>#Medicine Bill</legend>
                                <table class="table table-borderless" style="border: none !important;">
                                    <tr>
                                        <td colspan="2">Names</td>
                                        <td class="">Date</td>
                                        <td class="">Cost</td>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    while ($row = mysqli_fetch_assoc($medicines)) {
                                        ?>
                                        <tr class="table-borderless">
                                            <td colspan="2"><?php echo $row['medicines']; ?></td>
                                            <td><?php echo substr($row['date'], 0, 10); ?></td>
                                            <td><?php echo $row['total_cost']; $total+=$row['total_cost']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td><strong><?php echo $total; $tot+=$total; ?></strong></td>
                                    </tr>
                                </table>
                            </fieldset>
                        <?php } ?>

                        <fieldset style="width: 80%; margin: auto;">
                            <legend>#Bed Cost</legend>
                            <table class="table table-borderless" style="border: none !important; width: 500px;">
                                <tr>
                                    <td class="text-right">Bed Type</td>
                                    <td>:</td>
                                    <td><?php echo $bed['bed_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Duration</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['admission_date']; ?> to <?php echo $patientDetails['release_date']; ?> (<?php echo $diff->format('%a days') ?>)</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Cost</td>
                                    <td>:</td>
                                    <td><?php echo ($diff->format('%a') * $bed['bed_fee']); $tot+=($diff->format('%a') * $bed['bed_fee']);?></td>
                                </tr>


                        </table>
                            <label style="color: #000; font-weight: bold;" for="">Total Bill :  <?php echo $tot; ?></label>
                    </fieldset>

                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
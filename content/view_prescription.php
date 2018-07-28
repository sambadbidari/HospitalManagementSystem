<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_prescription.php"><i class="fa fa-globe"></i> Manage Prescription</a></li>
                        <li class="active">View Prescription</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">View Prescription</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Prescription ID: #<?php echo $specific_prescription['prescription_id'] ?></p>
                                <p style="line-height: 2%;">Date: <?php echo $specific_prescription['prescription_time'] ?></p>
                                <p style="line-height: 142%;">Hospital Management System</p>
                            </div>
                            <div class="col-xs-4 col-xs-offset-4">
                                <p>Doctor Name: <?php echo $specific_prescription['doctor_name'] ?></p>
                                <p style="line-height: 1px;">Phone: <?php echo $specific_prescription['doctor_phone'] ?></p>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Rx,</p>
                                <?php echo $specific_prescription['prescription'] ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_report.php"><i class="fa fa-globe"></i> Manage Report</a></li>
                        <li class="active">View Report</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">View Report</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Report ID: #<?php echo $specific_report['report_id'] ?></p>
                                <p style="line-height: 1px;"> Hospital Management System</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <h3><?php echo $specific_report['test_name'] ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Patient Name: <?php echo $specific_report['patient_name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <?php echo $specific_report['report_description'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                Report Result: <span style="color: red;"><?php echo $specific_report['report_result'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                Published Date: <?php echo $specific_report['report_published_date'] ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
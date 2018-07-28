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
                        <?php if($type!=2){?>
                        <li><a href="add_report.php"><i class="fa fa-globe"></i> Add Report</a></li>
                        <?php } ?>
                        <li class="active">Report Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Report Manager</h4>
                        <p class="category">Here is you can manage your Hospital Reports</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Patient Name</th>
                                <th>Test Name</th>
                                <th>Result</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['patient_name'] ?></td>
                                        <td><?php echo $row['test_name'] ?></td>
                                        <td><?php echo $row['report_result'] ?></td>
                                        <td><?php echo $row['report_published_date'] ?></td>
                                        <td>
                                            <a href="view_report.php?id=<?php echo $row['report_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="View Report"><i class="fa fa-shield"></i></a>
                                            <?php if($type!=2){?>
                                            <a href="edit_report.php?id=<?php echo $row['report_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Report"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_report.php?id=<?php echo $row['report_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Report" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>                    
    </div>
</div>
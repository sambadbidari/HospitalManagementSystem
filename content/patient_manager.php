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
                        <?php if($type !=2){ ?>
                            <li><a href="add_patient.php"><i class="fa fa-globe"></i> Add Patient</a></li>
                        <?php }?>
                        <li class="active">Patient Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Patient Manager</h4>
                        <p class="category">Here is you can manage your Hospital Patients</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Admission Date</th>
                                <th>Release Date</th>
                                <th>Report</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['patient_name'] ?></td>
                                        <td><?php echo $row['patient_phone'] ?></td>
                                        <td><?php echo $row['admission_date'] ?></td>
                                        <td><?php echo $row['release_date'] ?></td>
                                        <td><a href="manage_report.php?pid=<?php echo $row['patient_id'] ?>">Report</a></td>
                                        <td>
                                            <a href="edit_patient.php?id=<?php echo $row['patient_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Patient"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_patient.php?id=<?php echo $row['patient_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Patient" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
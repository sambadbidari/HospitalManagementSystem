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
                        <li><a href="add_prescription.php"><i class="fa fa-globe"></i> Add Prescription</a></li>
                        <li class="active">Prescription Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Prescription Manager</h4>
                        <p class="category">Here is you can manage your Hospital Prescriptions</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Prescription</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['doctor_name'] ?></td>
                                        <td><?php echo $row['patient_name'] ?></td>
                                        <td><?php echo $row['prescription'] ?></td>
                                        <td>
                                            <a href="view_prescription.php?id=<?php echo $row['prescription_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="View Prescription"><i class="fa fa-shield"></i></a>
                                            <a href="edit_prescription.php?id=<?php echo $row['prescription_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Prescription"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_prescription.php?id=<?php echo $row['prescription_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Prescription" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
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
                        <li><a href="add_doctor.php"><i class="fa fa-globe"></i> Add Doctor</a></li>
                        <li class="active">Doctor Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Doctor Manager</h4>
                        <p class="category">Here is you can manage your Hospital Doctors</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Visiting Hour</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['doctor_name'] ?></td>
                                        <td><?php echo $row['doctor_phone'] ?></td>
                                        <td><?php echo $row['doctor_visiting_hour'] ?></td>
                                        <td>
                                            <span style="color:green; font-weight: bold;">
                                                <?php
                                                if ($row['doctor_status'] == 1) {
                                                    echo 'Active';
                                                }
                                                ?> 
                                            </span>
                                            <span style="color:red; font-weight: bold;">
                                                <?php
                                                if ($row['doctor_status'] == 0) {
                                                    echo 'Inactive';
                                                }
                                                ?>   
                                            </span>
                                        </td>
                                        <td>
                                            <a href="edit_doctor.php?id=<?php echo $row['doctor_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Doctor"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_doctor.php?id=<?php echo $row['doctor_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Doctor" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
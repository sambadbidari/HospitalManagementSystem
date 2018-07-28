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
                        <li><a href="add_receptionist.php"><i class="fa fa-globe"></i> Add Receptionist</a></li>
                        <li class="active">Receptionist Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Receptionist Manager</h4>
                        <p class="category">Here is you can manage your Hospital Receptionists</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                            <th>Receptionist Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['admin_name'] ?></td>
                                    <td><?php echo $row['admin_email'] ?></td>
                                    <td>
                                        <a href="edit_receptionist.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Receptionist"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="function/delete_receptionist.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Receptionist" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
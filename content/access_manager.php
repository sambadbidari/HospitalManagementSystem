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
                        <li><a href="add_access.php"><i class="fa fa-globe"></i> Add Access</a></li>
                        <li class="active">Access Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Access Manager</h4>
                        <p class="category">Here is you can manage your Accessed</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>email</th>
                            <th>password</th>
                            <th>access</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <td><?php echo $row['access_id'] ?></td>
                                    <td>
                                        <a href="function/delete_access.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Admin" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
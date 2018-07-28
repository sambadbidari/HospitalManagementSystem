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
                        <li><a href="add_medicine.php"><i class="fa fa-globe"></i> Add Medicine</a></li>
                        <li class="active">Medicine Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Medicine Manager</h4>
                        <p class="category">Here is you can manage your Medicine</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Available</th>
                            <th>Already Sold</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['store'] ?></td>
                                    <td><?php echo $row['sold'] ?></td>
                                    <td>
                                        <a href="edit_medicine.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Medicine"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="function/delete_medicine.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Medicine" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
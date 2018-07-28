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
                        <li><a href="add_test.php"><i class="fa fa-globe"></i> Add Test</a></li>
                        <li class="active">Test Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Test Manager</h4>
                        <p class="category">Here is you can manage your Hospital Tests</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Name</th>
                                <th>Test Fee</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['test_name'] ?></td>
                                        <td><?php echo $row['cost'] ?></td>
                                        <td>
                                            <a href="edit_test.php?id=<?php echo $row['test_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Test"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_test.php?id=<?php echo $row['test_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Test" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
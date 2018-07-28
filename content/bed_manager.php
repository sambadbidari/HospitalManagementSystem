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
                        <li><a href="add_bed.php"><i class="fa fa-globe"></i> Add Bed</a></li>
                        <li class="active">Bed Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Bed Manager</h4>
                        <p class="category">Here is you can manage your Hospital Beds</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" id="myTable">
                            <thead>
                                <th>Name</th>
                                <th>Bed Fee</th>
                                <th>Sit Capacity</th>
                                <th>Booked Sit</th>
                                <th>Free Sit</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>    
                                    <tr>
                                        <td><?php echo $row['bed_name'] ?></td>
                                        <td><?php echo $row['bed_fee'] ?></td>
                                        <td><?php echo $row['bed_total_sit'] ?></td>
                                        <td><?php echo $row['bed_booked'] ?></td>
                                        <td><?php echo ($row['bed_total_sit'] - $row['bed_booked']) ?></td>
                                        <td>
                                            <a href="edit_bed.php?id=<?php echo $row['bed_id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Bed"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="function/delete_bed.php?id=<?php echo $row['bed_id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Bed" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
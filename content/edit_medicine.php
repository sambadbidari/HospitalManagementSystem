<?php
$id = filter_input(INPUT_POST, 'id');
$name=filter_input(INPUT_POST, 'name');
$price=filter_input(INPUT_POST, 'price');
$store=filter_input(INPUT_POST, 'store');
$sql = "UPDATE tbl_medicine SET name='$name', price='$price', store='$store' WHERE id='$id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_medicine.php"><i class="fa fa-globe"></i> Manage Medicine</a></li>
                        <li class="active">Edit Medicine</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Doctor</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_doctor">
                            <?php
                            if (!empty($name)) {
                                if (mysqli_query($conn, $sql)) {
                                    echo "Update record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Medicine Name</label>
                                        <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control">
                                        <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="price" value="<?php echo $row['price']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" name="store" value="<?php echo $row['store']?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Medicine</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

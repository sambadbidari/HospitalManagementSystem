<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_medicine.php"><i class="fa fa-globe"></i> Manage Medicine</a></li>
                        <li class="active">Add Medicine</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Medicine</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                            if (!empty($name)) {
                                if (mysqli_query($conn, $sql)) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Medicine Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" name="store" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Medicine</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
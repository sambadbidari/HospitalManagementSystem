<?php

require '../function/db_connect.php';
$bed_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_bed WHERE bed_id='$bed_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_bed.php");
?>
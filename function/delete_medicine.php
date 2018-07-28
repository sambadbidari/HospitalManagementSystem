<?php

require '../function/db_connect.php';
$doctor_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_medicine WHERE id='$doctor_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_medicine.php");
?>
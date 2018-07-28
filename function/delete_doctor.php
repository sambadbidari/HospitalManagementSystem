<?php

require '../function/db_connect.php';
$doctor_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_doctor WHERE doctor_id='$doctor_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_doctor.php");
?>
<?php

require '../function/db_connect.php';
$ward_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_ward WHERE ward_id='$ward_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_ward.php");
?>
<?php

require '../function/db_connect.php';
$pharmacist_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_pharmacist WHERE pharmacist_id='$pharmacist_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_pharmacist.php");
?>
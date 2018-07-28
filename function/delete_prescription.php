<?php

require '../function/db_connect.php';
$prescription_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_prescription WHERE prescription_id='$prescription_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_prescription.php");
?>
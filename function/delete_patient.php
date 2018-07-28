<?php

require '../function/db_connect.php';
$patient_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_patient WHERE patient_id='$patient_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_patient.php");
?>
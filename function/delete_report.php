<?php

require '../function/db_connect.php';
$report_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_report WHERE report_id='$report_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_report.php");
?>
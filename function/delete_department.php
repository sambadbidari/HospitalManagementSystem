<?php

require '../function/db_connect.php';
$department_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_department WHERE department_id='$department_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_department.php");
?>
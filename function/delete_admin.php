<?php

require '../function/db_connect.php';
$admin_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_admin WHERE admin_id='$admin_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_admin.php");
?>
<?php

require '../function/db_connect.php';
$patient_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM account WHERE id='$patient_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/htdocs/new/manage_account.php");
?>
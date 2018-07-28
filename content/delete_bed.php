<?php

require 'function/db_connect.php';

$delete = $_GET['id'];
$delete = mysql_query("DELETE FROM tbl_bed WHERE bed_id='$delete'");
?>
<?php
include '../db/connect.php';

$id = $_POST['id'];
//echo $id;
//die();
$sql = "update customerorders set order_delivered = 1 where id = '$id' ";
//die();
$result = mysql_query($sql) or die(mysql_error());

?>
<?php 

include_once("config.php");

$delete_id = $_GET['delete_id'];

$sql = "DELETE FROM employees WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $delete_id));

header("Location:index.php");



?>
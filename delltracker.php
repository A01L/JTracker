<?php 
require_once 'vendor/db.php';
require_once 'vendor/adf/adf.php';
$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `redirect` WHERE `redirect`.`id` = $id");
header("Location: pages/stat.php#listtracker");
 ?>
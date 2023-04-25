<?php 
require_once 'vendor/db.php';
require_once 'vendor/adf/adf.php';
$title = $_POST['title'];
$data = $_POST['data'];
$link = $_POST['link'];

mysqli_query($connect, "INSERT INTO `redirect`(`id`, `data`, `link`, `title`) VALUES (NULL,'$data','$link','$title')");
header("Location: pages/stat.php#listtracker");
 ?>
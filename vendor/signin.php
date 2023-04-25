<?php 
session_start();
require_once "db.php";
require_once "adf/adf.php";

$key = $_POST['key'];

$check_user = mysqli_query($connect, "SELECT * FROM `admins` WHERE `key` = '$key'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['admin'] = [
            "id" => $user['id']
        ];
        ini_set('session.gc_maxlifetime', 172800);
        ini_set('session.cookie_lifetime', 172800);

        header('Location: ../pages/stat.php');

    } else {
        $_SESSION['msg'] = '<script type="text/javascript">alert("Не верный ключь!");</script>';
        header('Location: ../admin/login.php');
    }

 ?>
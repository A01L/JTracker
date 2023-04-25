<?php 
require_once 'Mobile_Detect.php';
require_once 'vendor/db.php';
require_once 'vendor/adf/adf.php';
$detect = new Mobile_Detect;

if($detect->isTablet() ) { $device = 'Tablet'; }
elseif($detect->isMobile() && !$detect->isTablet() ) { $device = 'Phone'; }
else{ $device = "PC";}

if($detect->isiOS() ) { $os = 'IOS'; }
elseif($detect->isAndroidOS() ) { $os = 'AOS'; }
elseif($detect->isBlackBerryO() ) { $os = 'BB'; }
elseif($detect->iswebOS() ) { $os = 'WEOS'; }
else{ $os = 'Windows OS';}


if($detect->isiPhone() ) { $phone = 'iPhone'; }
elseif($detect->isSamsung() ) { $phone = 'Samsung'; }
elseif($detect->isBlackBerry() ) { $phone = 'BB'; }
elseif($detect->isSony() ) { $phone = 'Sony'; }
else{ $phone = 'null';}


if($detect->isChrome() ) { $browser = 'Chrome'; }
if($detect->isOpera() ) { $browser = 'Opera'; }
if($detect->isSafari() ) { $browser = 'Safari'; }
if($detect->isEdge() ) { $browser = 'Edge'; }
if($detect->isIE() ) { $browser = 'IE'; }
if($detect->isFirefox() ) { $browser = 'Firefox'; }
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
    $browser = 'Chrome';
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'OPR') !== FALSE) {
    $browser = 'Opera';
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'YaBrowser') !== FALSE) {
    $browser = 'Yandex';
}
else {
    $browser = 'null';
}


$ip = $_SERVER['REMOTE_ADDR']; 
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip.'?lang=ru'));
    if($query && $query['status'] == 'success') {
        $country = $query['country'];
        $city = $query['city'];
        } else {
        $country = "null";
        $city = "null";
    }
$today = date("Y-m-d H:i:s"); 
$link = $_GET['l'];
$link_id = get_data_db($connect, "redirect", "id", "data", $link);
$redirect = get_data_db($connect, "redirect", "link", "data", $link);
mysqli_query($connect, "INSERT INTO `data`(`id`, `date`, `redirect`, `timer`, `country`, `region`, `device`, `model_device`, `browser`, `os`, `sex`, `age`, `other`) VALUES (NULL,'$today','$link_id','0','$country','$city','$device','$phone','$browser','$os','0','0','0')");
header("Location: $redirect");

 ?>

<?php 
session_start();
if ($_SESSION['admin']) {
	header('Location: ../pages/stat.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Авторизация</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php
    if ($_SESSION['msg']) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<div _ngcontent-dht-c57="" class="bg-lock-screen">
  <div _ngcontent-dht-c57="" class="wrapper">
    <div _ngcontent-dht-c57="" class="authentication-lock-screen d-flex align-items-center justify-content-center">
      <div _ngcontent-dht-c57="" class="card shadow-none bg-transparent">
        <div _ngcontent-dht-c57="" class="card-body p-md-5 text-center">
          <h2 _ngcontent-dht-c57="" class="text-white">Добро пожаловать!</h2>
          <h5 _ngcontent-dht-c57="" class="text-white"><!-- Tuesday, January 14, 2021 --> </h5>
          <div _ngcontent-dht-c57="">
            <img _ngcontent-dht-c57="" src="user.png" width="120" alt="" class="mt-5"></div>
            <p _ngcontent-dht-c57="" class="mt-2 text-white">Админ</p>
            <form action="../vendor/signin.php" method="post">
              <div _ngcontent-dht-c57="" class="mb-3 mt-3">
                <input name="key" type="password" placeholder="Ваш ключь..." class="form-control">
              </div>
              <div _ngcontent-dht-c57="" class="d-grid">
                <button class="btn btn-white">Войти</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
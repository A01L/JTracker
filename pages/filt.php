<?php 
require_once '../vendor/db.php';
require_once '../vendor/adf/adf.php';
$datefilt = $_POST['date'];
session_start();
if (!$_SESSION['admin']) {
    header('Location: ../admin/login.php');
}
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Static analysis</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fonts/icofont/icofont.min.css">
	<link rel="stylesheet" href="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="../assets/plugins/apex/apexcharts.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="sidebar-folded">
	<div class="offcanvas-overlay"></div>
	<div class="wrapper">
		<header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
			<div class="logo">
				<a href="../index.html" class="default-logo">
					<img src="../assets/img/logo.png" alt="">
				</a>
				<a href="../index.html" class="mobile-logo">
					<img src="../assets/img/mobile-logo.png" alt="">
				</a>
			</div>
			<div class="main-header">
				<div class="container-fluid">
					<div class="row justify-content-between">
						<div class="col-3 col-lg-1 col-xl-4">
							<div class="main-header-left h-100 d-flex align-items-center">
								<div class="main-header-user">
									<a href="#" class="d-flex align-items-center" data-toggle="dropdown">
										<!-- <div class="menu-icon">
											<span></span>
											<span></span>
											<span></span>
										</div> -->
										<div class="user-profile d-xl-flex align-items-center d-none">

											<div class="user-avatar">
												<img src="../assets/img/avatar/f5.png" alt="">
											</div>

											<div class="user-info">
												<h4 class="user-name">Just Adil</h4>
												<p class="user-email">justadil@gmail.com</p>
											</div>
										</div>
									</a>
									<!-- <div class="dropdown-menu">
										<a href="#">My Profile</a>
										<a href="#">task</a>
										<a href="#">Settings</a>
										<a href="#">Log Out</a>
									</div> -->
								</div>
								<div class="main-header-menu d-block d-lg-none">
									<div class="header-toogle-menu">
										<img src="../assets/img/menu.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-9 col-lg-11 col-xl-8">
							<div class="main-header-right d-flex justify-content-end">
								<ul class="nav">
									<li class="d-none d-lg-flex">
										<div class="main-header-date-time text-right">
											<h3 class="time">
												<span id="hours">00</span>
												<span id="point">:</span>
												<span id="min">XX</span>
											</h3>
											<span class="date">
												<span id="date"></span>
											</span>
										</div>
									</li>
									<li class="d-none d-lg-flex">
										<div class="main-header-btn ml-md-1">
											<a href="../vendor/out.php" class="btn">Выйти</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
</header>
	<div class="main-wrapper">
		<div class="main-content">
<div class="col-12">
	<div class="card bg-transparent">
		<div class="card-body card_color-bg">
			<div class="d-flex flex-column flex-xl-row justify-content-xl-between mb-2">
				<div class="mb-4 mb-xl-0">

					<h4 class="mb-1">Статистика трекеров</h4>

					<p class="font-14">Все данные за <span class="full-date ml-2">	<?php echo $datefilt; ?></span></p>
				</div>

				<a href="stat.php" style="border: 3px solid #5C46DA; color: white; border-radius: 20px; padding: 5px; font-family: arial; font-size: 1.1em; padding-right: 20px; padding-left: 20px; margin-left: 45%;">Все время</a>
			
				<form style="float: right; width: 30%;" method="post" action="filt.php">
					<button style="float: left; width: 50%; background: #5C46DA; color: white; font-family: arial; font-size: 1.2em; border-radius: 15px 0px 0px 15px;height: 90%;">Фильтрировать</button>
				<input type="date" class="theme-input-style" placeholder="set date" style="float: right; width: 50%; border-radius: 0px 15px 15px 0px;" name="date">
				</form>
			</div>
		</div>

		<div class="table-responsive">
			<div style="background: gray; width: 100%; height: 3px;"></div>
			<div class="product-statistics">
				<div class="statistic-row pb-1">
					<div class="bold">Статистика</div>
					<div class="bold">Телефоны</div>
					<div class="bold">Планшеты</div>
					<div class="bold">Компьютеры</div>
					<div class="bold">Общее</div>
				</div>
				<!-- <div class="statistic-row bg-transparent days">today</div> -->


				<div class="statistic-row">
					<div>
						Общее количество трекингов
					</div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'Phone' AND `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'Tablet' AND `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					 <div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'PC' AND `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
				</div>

				</div>



			<div style="background: gray; width: 100%; height: 3px;"></div>
				<div class="product-statistics">
				<div class="statistic-row pb-1">
					<div class="bold"></div>
					<div class="bold">iOS</div>
					<div class="bold">Android</div>
					<div class="bold">Windows</div>
					<div class="bold">BlacBerry</div>
					<div class="bold">WebOS</div>
				</div>
				<!-- <div class="statistic-row bg-transparent days">today</div> -->


				<div class="statistic-row">
					<div>Операционные системы</div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `os` = 'IOS' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `os` = 'AOS' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					 <div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `os` = 'Windows OS' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `os` = 'BB' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `os` = 'WEOS' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
				</div>

				<div style="background: gray; width: 100%; height: 3px;"></div>
				<div class="product-statistics">
				<div class="statistic-row pb-1">
					<div class="bold"></div>
					<div class="bold">iPhone</div>
					<div class="bold">Samsung</div>
					<div class="bold">BlackBerry</div>
					<div class="bold">Sony</div>
					<div class="bold">Копмьютеры & другие</div>
				</div>
				<!-- <div class="statistic-row bg-transparent days">today</div> -->


				<div class="statistic-row">
					<div>Модель гаджетов</div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `model_device` = 'iPhone' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `model_device` = 'Samsung' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					 <div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `model_device` = 'BB' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `model_device` = 'Sony' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
					<div><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `model_device` = 'null' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					 ?></div>
				</div>
<br>



				<div class="card" style="float: left; width: 49%;">
					<div class="card-body">
						<div class="title-content mb-4">
							<h4>Тип гаджета</h4>

						</div>

						<div class="browser-status font-14 bold mt-n1"><div class="d-flex justify-content-between align-items-center"><div class="browser-name font-12 regular text_color">Тип</div><div class="using-rate font-12 regular text_color">От общего</div></div>
						<div style="background: #5C46DA; width: 100%; height: 1px;"></div>

				<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Смартфоны</div><div class="using-rate">
					<?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'Phone' AND  `date` LIKE '$datefilt%'");
						$coll_phone = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_phone);
						echo round((100/$all)*$coll_phone);
					 ?>%
				</div></div>

				<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

				<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Планшеты</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'Tablet' AND  `date` LIKE '$datefilt%'");
						$coll_tablet = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_tablet);
						echo round((100/$all)*$coll_tablet);
					 ?>%</div></div>

					 <div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

				<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Компьютеры</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `device` = 'PC' AND  `date` LIKE '$datefilt%'");
						$coll_pc= mysqli_num_rows($result);
						$results = round((100/$all)*$coll_pc);
						echo round((100/$all)*$coll_pc);
					 ?>%</div></div>
					<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

				
			</div>
		</div>
	</div>


				<div class="card" style="float: right; width: 49%;">
					<div class="card-body">
						<div class="title-content mb-4">
							<h4>Статистика браузеров</h4>
						</div>
						<div class="browser-status font-14 bold mt-n1">
							<div class="d-flex justify-content-between align-items-center">
								<div class="browser-name font-12 regular text_color">Название</div>
								<div class="using-rate font-12 regular text_color">От общего</div>
							</div>
							<div style="background: #5C46DA; width: 100%; height: 1px;"></div>

							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Google Chrome</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'Chrome' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
					 <div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>


							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Firefox</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'Firefox' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
							<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Opera</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'Opera' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>


							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Yandex</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'Yandex' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>


							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Safari</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'Safari' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>


							<div class="d-flex justify-content-between align-items-center"><div class="browser-name">Неизвестный</div><div class="using-rate"><?php 
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `browser` = 'null' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
							<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

						</div>
					</div>
				</div>


				<div class="card" style="float: left; width: 49%; margin-top: 30px;">
					<div class="card-body">
						<div class="title-content mb-4">
							<h4>Статистика стран</h4>
						</div>
						<div class="browser-status font-14 bold mt-n1">
							<div class="d-flex justify-content-between align-items-center">
								<div class="browser-name font-12 regular text_color">Страна</div>
								<div class="using-rate font-12 regular text_color">От общего</div>
							</div>
							<div style="background: #5C46DA; width: 100%; height: 1px;"></div>

							<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                $list = array("lim");
                foreach($result as $row){

					if (in_array($row["country"], $list)) {
					}
					else{
						array_push($list, $row["country"]);
                   ?>

                   						<div class="d-flex justify-content-between align-items-center"><div class="browser-name"><?php echo $row['country']; ?></div><div class="using-rate"><?php 
                   		$countr = $row['country'];
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `country` = '$countr' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
					 	<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>

                   <?php
               }

                }
                if ($rowsCount == "0") {           
                                echo "<h2 class='msg_not'>Список пустой</h2>";
                }

                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
    
?>

						</div>
					</div>
				</div>

				<div class="card" style="float: right; width: 49%; margin-top: 30px;">
					<div class="card-body">
						<div class="title-content mb-4">
							<h4>Статистика регионов</h4>
						</div>
						<div class="browser-status font-14 bold mt-n1">
							<div class="d-flex justify-content-between align-items-center">
								<div class="browser-name font-12 regular text_color">Регион & Город</div>
								<div class="using-rate font-12 regular text_color">От общего</div>
							</div>
							<div style="background: #5C46DA; width: 100%; height: 1px;"></div>
							<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                $list = array("lim");
                foreach($result as $row){

					if (in_array($row["region"], $list)) {
					}
					else{
						array_push($list, $row["region"]);
                   ?>

                   						<div class="d-flex justify-content-between align-items-center"><div class="browser-name"><?php echo $row['region']; ?></div><div class="using-rate"><?php 
                   		$countr = $row['region'];
						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `date` LIKE '$datefilt%'");
						$ress = mysqli_num_rows($result);
						$all = $ress;

						$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `region` = '$countr' AND  `date` LIKE '$datefilt%'");
						$coll_res = mysqli_num_rows($result);
						$results = round((100/$all)*$coll_res);
						echo round((100/$all)*$coll_res);
					 ?>%</div></div>
					 	<div style="background: #50C878; width: <?php echo $results+1; ?>%; height: 3px;"></div>


                   <?php
               }

                }
                if ($rowsCount == "0") {           
                                echo "<h2 class='msg_not'>Список пустой</h2>";
                }

                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
    
?>

						</div></div></div>
</div>

				</div>
			</div> </div></div>
<br> <br>



			<div class="col-12" style="float: left;">
	<div class="card mb-30">


<div class="col-xl-20" style="float: right;">

	<div class="card mb-30 mb-xl-0">

		<div class="card-body">
			<div class="d-flex justify-content-between media" id="listtracker">
				<div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3 media-body">	
<center><h3>Список трекеров</h3></center>
			
			</div>
	
		</div>
	</div>
	<hr>
	<div class="table-responsive">
		<table class="style--four table-striped text-nowrap">

			<thead>
				<tr>
					<th>ID</th>
					<th>Заголовок</th>
					<th>Редирект код</th>
					<th>Ссылка</th>
					<th>Посещение</th>
					<th>Мод</th>
				</tr>
			</thead>

			<tbody>
				<form action="../addtracker.php" method="post">
					<tr>
				
					<td>Auto</td>
					<td><input type="text" id="as_phone2" class="theme-input-style" name="title" required="" placeholder="Заголовок..."></td>
					<td><input type="text" id="as_phone2" class="theme-input-style" name="data" required="" placeholder="GET код..."></td>
					<td><input type="text" id="as_phone2" class="theme-input-style" name="link" required="" placeholder="Ссылка..."></td>
					<td>---</td>
					<td><button style="background: #5C46DA; color: white; border: none; border-radius: 15px; padding: 8px; padding-left: 22px; padding-right: 22px;">+ Добавить</button></td>

				</tr>
				</form>

<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `redirect`";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // chech new message
                    
                   ?>	
				<tr>
				
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["title"]; ?></td>
					<td>https://jcode.space/kazinfo/index.php?l=<?php echo $row["data"]; ?></td>
					<td><?php echo $row["link"]; ?></td>
					<td><?php 
					$idr = $row["id"];
					$result = mysqli_query($connect, "SELECT * FROM `data` WHERE `redirect` = '$idr' AND  `date` LIKE '$datefilt%'");
						$num_rows = mysqli_num_rows($result);
						echo $num_rows;
					?></td>
					<td><a href="../delltracker.php?id=<?php echo $row["id"]; ?>" class="details-btn">Удалить <i class="icofont-arrow-right"></i></a></td>

				</tr>
				<?php

                }
                if ($rowsCount == "0") {           
                                echo "<h2 class='msg_not'>Список пустой</h2>";
                }

                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }

    
?>
<?php


// $result = mysqli_query($connect, "SELECT * FROM redirect");
// $num_rows = mysqli_num_rows($result);

// echo "Получено $num_rows рядов\n";

?>


				

				 </tbody>
			</table>	
	</div>
</div>
</div>

				</div>



				</div>
			
		</div>
	</div>

				<footer class="footer">JCS Stat © 2022 created by <a href="https://jcode.space"> Adil</a>
				</footer>
			</div>
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
			<script src="../assets/js/script.js"></script>
			<script src="../assets/plugins/apex/apexcharts.min.js"></script>
			<script src="../assets/plugins/apex/custom-apexcharts.js"></script>
	</body>
</html>
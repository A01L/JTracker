<?php 
// Just a Code Space
// Author: Just Adil

						// data base control
	function db_connect($log, $pass, $name, $server = 'localhost'){
		$connect = mysqli_connect("$server", "$log", "$pass", "$name");

		if (!$connect) {
			$connect = 'Error connect to Data base!';
		}
		return $connect;
	}
	function get_data_db($db, $table, $data, $index, $index2){
		$querry = mysqli_query($db, "SELECT * FROM `$table` WHERE `$index` = '$index2'");
		$datas = mysqli_fetch_assoc($querry);
   	    return $datas["$data"];
	}
    function replace_simbols($start, $text, $end){
    $t1 = mb_eregi_replace("(.*)[^.]{".$end."}$", '\\1', $text);
    $t2 = mb_eregi_replace("^.{".$start."}(.*)$", '\\1', $t1);
    $text = $t2;
    return $text;
}
	function loop_data_start($db, $table){
		echo "<?php";
		echo "$conn = $db;";
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 
           echo "$sql = 'SELECT * FROM `".$table."`';";
           echo "if($result = $conn->query($sql)){";
           echo "$rowsCount = $result->num_rows; // ID - constant";
           echo "foreach($result as $row){";
           echo "?>";

	}
	function loop_data_end(){
		echo "<?php";
		echo "}";
                echo "if ($rowsCount == '0') {";           
                                echo "<h2 class='msg_not'>Список пустой</h2>";
                echo "}";
                echo "$result->free();";
            echo "} else{";
                echo "Ошибка: " . $conn->error;
            echo "}";
            echo "?>";
	}
	// function get_data_loop($conn, $table, $temp){
	// 		$tm = require_once "$temp";
 //            if($conn->connect_error){
 //                die("Ошибка: " . $conn->connect_error);
 //            }
 //            // sql query 
 //            $sql = "SELECT * FROM $table";
 //            if($result = $conn->query($sql)){
 //                $rowsCount = $result->num_rows; // ID - constant
 //                foreach($result as $row){

 //                        // start display form data from db
 //                    echo "$tm";

 //                    // end display form data from db
 //                }

 //                if ($rowsCount == "0") {           
 //                                echo "<h2 class='msg_not'>Список пустой</h2>";
 //                }

 //                $result->free();
 //            } else{
 //                echo "Ошибка: " . $conn->error;
 //            }
	// }
 ?>

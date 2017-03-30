<?php
	$uname = $_GET['username'];

	$conn = mysql_connect('localhost:3306', 'root', '');
	if(!$conn){
		die('数据库连接出错');
	}
	mysql_select_db('shoujidiy');

	$sql = "SELECT COUNT(*) from user WHERE username='$uname'";
	$result = mysql_query($sql, $conn);
	$row = mysql_fetch_array($result);

	if($row){
		if($row[0] >= 1){
			echo '{"status":1, "message":"user exists"}';
		}else{
			echo '{"status":0, "message":"user not exists"}';
		}
	}

	mysql_close($conn);
?>
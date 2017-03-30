<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$conn = mysql_connect('localhost:3306', 'root', '');
	if(!$conn){
		die('数据库连接失败');
	}


	mysql_select_db('shoujidiy');

	$sql = "INSERT INTO user VALUES(NULL, '$username', '$password', '$email', default)";
	$result = mysql_query($sql, $conn);

	if($result){
		echo '{"status": 1, "massage": "success"}';
	}else{
		echo '{"status": 0, "massage": "出错原因：'.mysql_error().'"}';
	}

	mysql_close($conn);
?>
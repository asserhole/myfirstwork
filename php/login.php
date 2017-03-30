<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$conn = mysql_connect('localhost:3306', 'root', '');
	if(!$conn){
		die ('数据库连接失败');
	}

	mysql_select_db('shoujidiy');

	$sql = "SELECT * from user WHERE (username='$username' OR email='$email') AND password='$password'";
	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_array($result, MYSQL_ASSOC);

	if($row){
		echo '{"status":1, "message":"success", "userinfo":'.json_encode($row).'}';
	}else{
		echo '{"status":0, "message":"用户名或密码错误"}';
	}

	mysql_close($conn);
?>
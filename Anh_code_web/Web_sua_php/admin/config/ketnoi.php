<?php
	$host = "localhost";
	$username = "root";
	$pass = "";
	$db = "websua_msql";
	$conn = mysqli_connect($host, $username, $pass, $db) or die("Kết nối CSDL thất bại");
	mysqli_set_charset($conn, "utf8"); //thiết lập mã tiếng Việt khớp với thiết kế CSDL
?>
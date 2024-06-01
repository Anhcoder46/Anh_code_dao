<?php
//+++++++++++++XU LY HANG SUA ++++++++++++++++++++++++++
	//ket noi csdl
	include('../../config/ketnoi.php');
	//xu ly them hang sua
	$themthutu =$_POST['txtthutu'];
	$themmahangsua =$_POST['txtmahangsua'];
	$themhangsua =$_POST['txthangsua'];
	$themdiachi =$_POST['txtdiachi'];
	$themdienthoai =$_POST['txtdienthoai'];
	$thememail =$_POST['txtemail'];
	//ton tai
	if(isset($_POST['sbhangsua'])){
		$sql_them = "insert into msql_danhmuc(thutu_hangsua,ma_hangsua,ten_hangsua, diachi_hangsua, dienthoai_hangsua, email_hangsua) values('".$themthutu."','".$themmahangsua."','".$themhangsua."','".$themdiachi."','".$themdienthoai."','".$thememail."')";
		mysqli_query($conn,$sql_them);
		header("location:../../index.php?quanly=danhsachhangsua");
	}
	//sua
	else if(isset($_POST['sbsuahangsua'])){
		$sql_sua = "update msql_danhmuc set thutu_hangsua='".$themthutu."',ma_hangsua='".$themmahangsua."',ten_hangsua='".$themhangsua."', diachi_hangsua='".$themdiachi."', dienthoai_hangsua='".$themdienthoai."', email_hangsua='".$thememail."' where id_hangsua ='$_GET[idhangsua]'";
		mysqli_query($conn,$sql_sua);
		header("location:../../index.php?quanly=danhsachhangsua");
	}
	else{
		//XOA H
		$id = $_GET['idhangsua'];
		$sql_xoa = "delete from msql_danhmuc where id_hangsua ='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header("location:../../index.php?quanly=danhsachhangsua");
	}

?>
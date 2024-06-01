<?php
//+++++++++++++XU LY HANG SUA ++++++++++++++++++++++++++
	//ket noi csdl
	include('../../config/ketnoi.php');
	//xu ly them hang sua
	$ma =$_POST['txtma'];
	$ten =$_POST['txtten'];
	$hang =$_POST['txthang'];
	$loai =$_POST['txtloai'];
	$trongluong =$_POST['txttrongluong'];
	$dongia=$_POST['txtdongia'];
	$thanhphan =$_POST['txttpdd'];
	$loiich =$_POST['txtloiich'];
	//xu ly hinh anh
	$anh = $_FILES['txtanh']['name'];
	$anh_tmp =$_FILES['txtanh']['tmp_name'];
	$anh =time().'_'.$anh;
	// $anh =$_POST['txtemail'];
	//Thêm sữa vào csdl
	//ton tai
	if(isset($_POST['sbthemsua'])){
		$sql_them = "insert into msql_spsua(ma_spsua,ten_spsua,hang_spsua,loai_spsua,trongluong_spsua,dongia_spsua,thanhphan_spsua,loiich_spsua,anh_spsua) values('".$ma."','".$ten."','".$hang."','".$loai."','".$trongluong."','".$dongia."','".$thanhphan."','".$loiich."','".$anh."')";
		mysqli_query($conn,$sql_them);
		move_uploaded_file($anh_tmp,'upanh/'.$anh);
		header("location:../../index.php?quanly=danhsachsua");
	}//Sửa sữa
	else if(isset($_POST['sbsua'])){
		if($anh !=''){
		move_uploaded_file($anh_tmp,'upanh/'.$anh);
		$sql_sua = "update msql_spsua set id_spsua='".$ma."',ten_spsua='".$ten."',hang_spsua='".$hang."',loai_spsua='".$loai."',trongluong_spsua='".$trongluong."',dongia_spsua='".$dongia."',thanhphan_spsua='".$thanhphan."',loiich_spsua='".$loiich."',anh_spsua='".$anh."' where id_spsua ='$_GET[idsua]'";
		}else{
		$sql_sua = "update msql_spsua set id_spsua='".$ma."',ten_spsua='".$ten."',hang_spsua='".$hang."',loai_spsua='".$loai."',trongluong_spsua='".$trongluong."',dongia_spsua='".$dongia."',thanhphan_spsua='".$thanhphan."',loiich_spsua='".$loiich."' where id_spsua ='$_GET[idsua]'";
		}
		mysqli_query($conn,$sql_sua);
		header("location:../../index.php?quanly=danhsachsua");
	}
	else{
		//Xóa Sữa
		//+Xóa sữa kèm xóa ảnh+
		$id = $_GET['idsua'];
		$sql ="select * from msql_spsua where id_spsua='$id'";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($query)){
			unlink('upanh/'.$row['anh_spsua']);
		}
		//--
		$sql_xoa = "delete from msql_spsua where id_spsua='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header("location:../../index.php?quanly=danhsachsua");
	}

?>
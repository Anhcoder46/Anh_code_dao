<!-- main chinh	 -->
<section class="content">
<?php
	include 'modum/main_left.php';
	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
	}else{
		$tam ='';
	}
	if($tam =='danhsachhangsua'){
		include 'modum/main_right/hangsua.php';
	}else if($tam =='themhangsuamoi'){
		include 'modum/main_right/themhangsuamoi.php';
	}else if($tam =='suahangsua'){
		include 'modum/main_right/sua_hangsua.php';
	}else if($tam =='suaspsua'){
		include 'modum/main_right_themsua/sua_hangsua.php';
	}else if($tam =='danhsachsua'){
		include 'modum/main_right_themsua/hangsua.php';
	}else if($tam =='themsuamoi'){
		include 'modum/main_right_themsua/themhangsuamoi.php';
	}else{
		include 'modum/xinchao.php';
	}		
?>
</section>
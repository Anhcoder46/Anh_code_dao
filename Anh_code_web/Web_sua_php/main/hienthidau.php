<div>
	<?php
	if(isset($_GET['quanly'])) {
		$tam = $_GET['quanly'];
	} else {
		$tam ='';
	} 

	if($tam =='ds_sanpham') {
		include 'home/sanpham.php';
	} else if(($tam =='lienhe')) {
		include 'home/lienhe.php';
	} else if(($tam =='xuhuong')) {
		include 'home/xuhuong.php';
	}else if($tam =='thongtinsua'){
        include "home/thongtinsua.php";
    }else{
		include 'home/gioithieu.php';
		include 'home/ds_sanpham.php';
		include 'home/xuhuong.php';
		include 'home/lienhe.php';
	}
	?>
</div>
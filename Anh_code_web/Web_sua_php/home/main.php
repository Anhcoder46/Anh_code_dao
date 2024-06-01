<?php
 	if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
    }else{
        $tam ="";
    }
    if($tam ='danhmucsanpham'){
        include "home/sanpham.php";
    }
?>
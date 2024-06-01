<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Websize</title>
    <link rel="stylesheet" href="css/home/style.css">
    <link rel="stylesheet" href="css/home/pro.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
    include "admin/config/ketnoi.php";
    include "home/danhmuc.php";
    include "main/hienthidau.php";
    include "home/footer.php";

    // if(isset($_GET['quanly'])){
    //     $tam = $_GET['quanly'];
    // }else{
    //     $tam ="";
    // }
    // if($tam = 'danhmucsanpham'){
    //     include "../home/sanpham.php";
    // }
?>
<script src="javascript/home/footer.js"></script>
<script src="javascript/home/scripts.js"></script>
<script src="javascript/main.js"></script>
</body>
</html>
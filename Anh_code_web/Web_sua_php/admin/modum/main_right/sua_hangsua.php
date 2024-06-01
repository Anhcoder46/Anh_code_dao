<!-- SỬA HÃNG SỮA -->
<?php
	//lay ra tu csdl
	$id = $_GET["idhangsua"];
	$sql_sua_hangsua ="select * from msql_danhmuc where id_hangsua= $id";
	$query_sua_hangsua = mysqli_query($conn,$sql_sua_hangsua);
?>
<div class="content-right">
			<div class="content-right-themhangsua">
				<h1>Sửa Hãng Sữa</h1>
				<form action="modum/main_right/xuly.php?idhangsua=<?php echo $_GET["idhangsua"];?>" method="POST" enctype="mltipart/form-data">
					<?php
						while($dong = mysqli_fetch_assoc($query_sua_hangsua)){
						
					?>
					<label>Thu tu<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['thutu_hangsua']  ?>" name="txtthutu"><br>
					<label>Ma hang sua<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['ma_hangsua'] ?>" name="txtmahangsua"><br>
					<label>Ten hang sua<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['ten_hangsua'] ?>" name="txthangsua"><br>
					<label>Dia chi<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['diachi_hangsua'] ?>" name="txtdiachi"><br>
					<label>Dien thoai<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['dienthoai_hangsua'] ?>" name="txtdienthoai"><br>
					<label>Email<span style="color:red;">*</span></label>
					<input type="text" value="<?php echo $dong['email_hangsua'] ?>" name="txtemail">
					<br>
					<input type="submit" name="sbsuahangsua" value="Sua">
					<?php
						}
					?>
				</form>
			</div>
</div>
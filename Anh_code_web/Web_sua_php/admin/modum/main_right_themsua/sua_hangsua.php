<!-- SỬA HÃNG SỮA -->
<?php
	//lay ra tu csdl
	$id = $_GET["idsua"];
	$sql_sua_hangsua ="select * from msql_spsua where id_spsua= $id";
	$query_sua_hangsua = mysqli_query($conn,$sql_sua_hangsua);
?>
<div class="content-right">
			<div class="content-right-themhangsua">
				<h1>Sửa Hãng Sữa</h1>
				<form action="modum/main_right_themsua/xuly.php?idsua=<?php echo $_GET["idsua"];?>" method="POST" enctype="mltipart/form-data" >
					<?php
						while($dong = mysqli_fetch_assoc($query_sua_hangsua)){
						
					?>
					<label>Ma Sua<span style="color:red;">*</span></label>
					<input type="text" name="txtma" value="<?php echo $dong['ma_spsua'] ?>"><br>

					<label>Ten sua<span style="color:red;">*</span></label>
					<input type="text" name="txtten" value="<?php echo $dong['ten_spsua'] ?>"><br>

					<label>Hang sua<span style="color:red;">*</span></label>
					
					<select name="txthang" >
					
					<?php   
						$sql_danhsach_hangsua ="select * from msql_danhmuc order by thutu_hangsua desc";
						$query_danhsach_hangsua = mysqli_query($conn,$sql_danhsach_hangsua);
						while($row = mysqli_fetch_assoc($query_danhsach_hangsua)){
					
					?>
						<option><?php echo $row['ten_hangsua'] ?></option>
					<?php
						}
					?>
					</select><br>	
					
					<label>Loai sua<span style="color:red;">*</span></label>
					<input type="text" name="txtloai" value="<?php echo $dong['loai_spsua'] ?>"><br>

					<label>Trong luong<span style="color:red;">*</span></label>
					<input type="text" name="txttrongluong" value="<?php echo $dong['trongluong_spsua'] ?>"><br>

					<label>Don gia<span style="color:red;">*</span></label>
					<input type="text" name="txtdongia" value="<?php echo $dong['dongia_spsua'] ?>"><br>

					<label>Thanh phan dinh duong<span style="color:red;">*</span></label>
					<textarea name="txttpdd" rows="5" style="resize: none;" ><?php echo $dong['thanhphan_spsua'] ?></textarea><br>

					<label>Loi ich<span style="color:red;">*</span></label>
					<textarea name="txtloiich" rows="5" style="resize: none;" ><?php echo $dong['loiich_spsua'] ?></textarea><br>
					

					<label>Anh<span style="color:red;">*</span></label>
					<input type="file" name="txtanh" >
					<img src="modum/main_right_themsua/upanh/<?php echo $dong['anh_spsua'] ?>" width="100px" >
					<br>
					<input type="submit" name="sbsua" value="Cập Nhật">
					<?php
						}
					?>
				</form>
			</div>
</div>
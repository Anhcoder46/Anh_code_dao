<!-- THEM SUA MOI -->
<div class="content-right">
			<div class="content-right-themhangsua">
				<h1>Them Sua Moi</h1>
				<form action="modum/main_right_themsua/xuly.php" method="POST" enctype="multipart/form-data">

					<label>Ma Sua<span style="color:red;">*</span></label>
					<input type="text" name="txtma"><br>

					<label>Ten sua<span style="color:red;">*</span></label>
					<input type="text" name="txtten"><br>

					<label>Hang sua<span style="color:red;">*</span></label>
					
					<select name="txthang" >
					<!--list ra Hãng sữa đã có-->
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
					<input type="text" name="txtloai"><br>

					<label>Trong luong<span style="color:red;">*</span></label>
					<input type="text" name="txttrongluong"><br>

					<label>Don gia<span style="color:red;">*</span></label>
					<input type="text" name="txtdongia"><br>

					<label>Thanh phan dinh duong<span style="color:red;">*</span></label>
					<textarea name="txttpdd" rows="5" style="resize: none;"></textarea><br>

					<label>Loi ich<span style="color:red;">*</span></label>
					<textarea name="txtloiich" rows="5" style="resize: none;"></textarea><br>
					

					<label>Anh<span style="color:red;">*</span></label>
					<input type="file" name="txtanh" >
					<br>
					<input type="submit" name="sbthemsua" value="Them sua ">
				</form>
			</div>
</div>
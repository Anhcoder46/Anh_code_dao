<?php
	//lay ra tu csdl
	$sql_danhsach_hangsua ="select * from msql_spsua order by id_spsua desc";
	$query_danhsach_hangsua = mysqli_query($conn,$sql_danhsach_hangsua);
?>

<div>
<h2 style="text-align: center;">Danh Sách Sữa</h2>
<table style="width: 100%; " border="1" >
	<tr>
		<th>ID</th>
		<th>Hình Ảnh</th>
		<th>Mã Sữa</th>
		<th>Tên Sữa</th>
		<th>Hãng Sữa</th>
		<th>Loại Sữa</th>
		<th>Trọng Lượng</th>
		<th>Đơn Giá</th>
		<th>Thành Phần Dinh Dưỡng</th>
		<th>Lợi Ích</th>
		<th>Chức Năng</th>	
	</tr>
	<?php
		$i = 0;
		while($row = mysqli_fetch_assoc($query_danhsach_hangsua)){
			$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><img src="modum/main_right_themsua/upanh/<?php echo $row['anh_spsua'] ?>" width="100px" ></td>
		<td><?php echo $row['ma_spsua'] ?></td>
		<td><?php echo $row['ten_spsua'] ?></td>
		<td><?php echo $row['hang_spsua'] ?></td>
		<td><?php echo $row['loai_spsua'] ?></td>
		<td><?php echo $row['trongluong_spsua'] ?></td>
		<td><?php echo $row['dongia_spsua'] ?></td>
		<td><?php echo $row['thanhphan_spsua'] ?></td>
		<td><?php echo $row['loiich_spsua'] ?></td>
		<td>
			<a href="?quanly=suaspsua&idsua=<?php echo $row['id_spsua'];?>">Sua</a> | 

			<a href="modum/main_right_themsua/xuly.php?idsua=<?php echo $row['id_spsua'];?>">Xoa</a>
		</td>
	</tr>
	<?php
		}
	?>
</table>
</div>
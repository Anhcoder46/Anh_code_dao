<?php
	//lay ra tu csdl
	$sql_danhsach_hangsua ="select * from msql_danhmuc order by thutu_hangsua desc";
	$query_danhsach_hangsua = mysqli_query($conn,$sql_danhsach_hangsua);
?>
<div>
<h2>Danh Sach Hang Sua</h2>
<table style="width: 200%; " border="1" >
	<tr>
		<th>ID</th>
		<th>Ma Hang Sua</th>
		<th>Ten Hang Sua</th>
		<th>Dia Chi</th>
		<th>Dien Thoai</th>
		<th>Email</th>
		<th>Chuc Nang</th>
	</tr>
	<?php
		$i = 0;
		while($row = mysqli_fetch_assoc($query_danhsach_hangsua)){
			$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['ma_hangsua'] ?></td>
		<td><?php echo $row['ten_hangsua'] ?></td>
		<td><?php echo $row['diachi_hangsua'] ?></td>
		<td><?php echo $row['dienthoai_hangsua'] ?></td>
		<td><?php echo $row['email_hangsua'] ?></td>
		<td>
			<a href="?quanly=suahangsua&idhangsua=<?php echo $row['id_hangsua'];?>">Sua</a> | 
			<a href="modum/main_right/xuly.php?idhangsua=<?php echo $row['id_hangsua'];?>">Xoa</a>
		</td>
	</tr>
	<?php
		}
	?>
</table>
</div>
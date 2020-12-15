<link rel="stylesheet" href="baitap/css/grid.css">

	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang";
		$result = mysqli_query($conn, $sql);
		echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
		echo "<table align='center' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
		echo '	<tr>
				<th>Mã KH</th>
				<th width="">Tên khách hàng</th>
				<th width="">Giới tính</th>
				<th width="">Địa chỉ</th>
				<th width="">Số điện thoại</th>
				<th width="">Email</th>
				<th width=""><img src="baitap/images/edit.png"/></th>
				<th width=""><img src="baitap/images/delete.png"/></th>
			</tr>';
		if(mysqli_num_rows($result)<>0){
			while($rows=mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$rows['Ma_khach_hang']."</td>";
				echo "<td>".$rows['Ten_khach_hang']."</td>";
				echo "<td>".($rows['Phai']?"Nam":"Nữ")."</td>";
				echo "<td>".$rows['Dia_chi']."</td>";
				echo "<td>".$rows['Dien_thoai']."</td>";
				echo "<td>".$rows['Email']."</td>";
				echo "<td><a href='?path=baitap/php/MySQL/edit.php&MAKH=".$rows["Ma_khach_hang"]."'>Sửa</a></td>";
				echo "<td><a href='?path=baitap/php/MySQL/delete.php&MAKH=".$rows["Ma_khach_hang"]."'>Xóa</a></td>";
				echo "</tr>";
			}
		}echo"</table>";
	 ?>
<link rel="stylesheet" href="baitap/css/grid.css">

	<?php
		
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh
			FROM sua s, hang_sua hs, loai_sua ls
			WHERE s.Ma_hang_sua = hs.Ma_hang_sua and s.Ma_loai_sua = ls.Ma_loai_sua";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)<>0){
		echo "<div class=\"form f-column\">";
		echo "<p align='center'><font size='5'> THÔNG TIN CÁC SẢN PHẨM</font></p>";
		$stt=1;
		echo "<div class=\"grid-container-5-even\">";
			while($rows=mysqli_fetch_array($result)){
				echo 
				"<div class=\"grid-item text-center\" style='border-bottom: 1px solid black;'>
					<h3><a href='?MASP=$rows[0]&path=baitap/php/MySQL/B_7_ListChiTiet.php'>".$rows[1]."</a></h3>
					<p>".$rows[2]." gr - ".number_format($rows[3])." VNĐ</p>
					<img width='100' src='baitap/images/Hinh_sua/".$rows[4]."'/>
				</div>";
				if($stt % 5 == 0)
				$stt+=1;
			}
		}
		echo "</div></div>";
	 ?>
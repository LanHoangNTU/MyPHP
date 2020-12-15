<link rel="stylesheet" href="baitap/css/grid.css">

	<?php
		
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql = "SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, Trong_luong, Don_gia, Hinh
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
					<h5>".$rows[0]."</h5>
					<small>".$rows[3]." gr - ".number_format($rows[4])." VNĐ</small>
					<img width='100' src='baitap/images/Hinh_sua/".$rows[5]."'/>
				</div>";
				if($stt % 5 == 0)
				$stt+=1;
			}
		}
		echo "</div></div>";
	 ?>
<link rel="stylesheet" href="baitap/css/grid.css">

	<?php 
		$MASUA = $_GET['MASP'];
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');
		$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
			FROM sua
			WHERE Ma_sua = '$MASUA'";
		$result = mysqli_query($conn, $sql);
		$item = mysqli_fetch_row($result);
	 ?>
	 <div class="form">
	 	<div class="row border border-info rounded px-3">
	 		<div class="col-lg-12 text-center">
	 			<h1><?php echo $item[0]; ?></h1>
	 			<hr>
	 		</div>
	 		<div class="col-lg-4 text-center">
	 			<img src=<?php echo "baitap/images/Hinh_sua/$item[5]" ?>>
	 		</div>
	 		<div class="col-lg-8">
	 			<b>Thành phần dinh dưỡng: </b>
	 			<p><?php echo $item[1]; ?></p><br>
	 			<b>Lợi ích</b>
	 			<p><?php echo $item[2]; ?></p><br>
	 			<p align="right">
	 				<b>Trọng lượng: </b><?php echo $item[3] ?> grid - <b>Đơn giá: </b><?php echo number_format($item[4]) ?> VNĐ
	 			</p>
	 		</div>
	 		<div class="grid-item text-center">
	 			<a href="javascript:window.history.back(-1);">Quay lại trang trước.</a>
	 		</div>
	 	</div>
	 </div>
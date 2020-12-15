<link rel="stylesheet" href="baitap/css/grid.css">

	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');
		$rowsPerPage = 2;
		if (!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}

		$offset = ($_GET['page'] - 1) * $rowsPerPage;
		$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
			FROM sua
			LIMIT ".$offset.', '.$rowsPerPage;
		$result = mysqli_query($conn, $sql);
	 ?>
	 <div class="row">
	 	<?php 
	 		while ($item = mysqli_fetch_row($result)) {
	 			echo
				'<div class="row col-lg-12 rounded border border-info mt-3">
	 		 		<div class="col-lg-12 text-center b-border">
	 		 			<h2>'.$item[0].'</h2>
	 		 		</div>
	 		 		<div class="col-lg-4 text-center r-border">
	 		 			<img width="100%" src="baitap/images/Hinh_sua/'.$item[5].'">
	 		 		</div>
	 		 		<div class="col-lg-8">
	 		 			<b>Thành phần dinh dưỡng: </b>
	 		 			<p>'.$item[1].'</p><br>
	 		 			<b>Lợi ích</b>
	 		 			<p>'.$item[2].'</p><br>
	 		 			<p align="right">
	 		 				<b>Trọng lượng: </b>'.$item[3].' gr - <b>Đơn giá: </b>'.number_format($item[4]) .' VNĐ
	 		 			</p>
	 		 		</div>
	 		 	</div>';
	 		}

	 		$numRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sua"));
			$maxPage = floor($numRows/$rowsPerPage + 1);
			echo "<div class='text-center mx-auto'>";
			echo "<p align='center' class='text-center'>";
			if($_GET['page'] > 1)
				echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Prev</a> ";
			for ($i=1 ; $i<=$maxPage ; $i++){  
				if ($i == $_GET['page']){
					echo '<b>'.$i.'</b> ';
				}
				else
					echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";}
			if($_GET['page'] < $maxPage)
				echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a> ";
			echo "</p>";
			echo "</div>";
	 	 ?>
	 </div>
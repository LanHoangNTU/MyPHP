<link rel="stylesheet" href="baitap/css/grid.css">

	<?php
		function getArray($n){
			$arr = array();
			for ($i=0; $i < $n; $i++) { 
				$arr[] = rand(0, 20);
			}

			return $arr;
		}

		function outArray($arr){
			return implode(" ", $arr);
		}

		function getSum($arr){
			$sum = 0;
			foreach ($arr as $value) {
				$sum += $value;
			}

			return $sum;
		}

		function getMax($arr){
			$size = count($arr);
			if($size == 1)
				return $arr[0];
			else if($size == 0)
				return 0;

			$carry = $arr[0];
			for ($i=1; $i < $size; $i++) { 
				if($arr[$i] > $carry)
					$carry = $arr[$i];
			}

			return $carry;
		}

		function getMin($arr){
			$size = count($arr);
			if($size == 1)
				return $arr[0];
			else if($size == 0)
				return 0;

			$carry = $arr[0];
			for ($i=1; $i < $size; $i++) { 
				if($arr[$i] < $carry)
					$carry = $arr[$i];
			}

			return $carry;
		}

		if (!empty($_POST['n'])) {
			$n = $_POST['n'];
			$arr = getArray($n);
			$array = outArray($arr);
			$max = getMax($arr);
			$min = getMin($arr);
			$sum = getSum($arr);
		}
		else{
			$array = '';
			$max = '';
			$min = '';
			$sum = '';
		}
	 ?>
	<form action="" method="POST" accept-charset="utf-8">
		<div class="grid-container-3-even">
			<div class="grid-item item1-4 text-center">
				<h3>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item"><h4>Nhập số phần tử:</h4></div>
			<div class="grid-item">
				<input type="number" name="n" value="<?php echo($n) ?>" placeholder="Nhập số phần tử">
			</div>
			<div class="grid-item">
				<input class="submit" type="submit" name="submit" value="Phát sinh và tính toán">
			</div>

			<div class="grid-item"><h4>Mảng:</h4></div>
			<div class="grid-item item2-4">
				<input type="text" name="array" disabled value="<?php echo($array) ?>">
			</div>

			<div class="grid-item"><h4>GTLN (MAX) trong mảng:</h4></div>
			<div class="grid-item">
				<input type="text" name="max" value="<?php echo($max) ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item"><h4>GTNN (MIN) trong mảng:</h4></div>
			<div class="grid-item">
				<input type="text" name="min" value="<?php echo($min) ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item"><h4>Tổng mảng:</h4></div>
			<div class="grid-item">
				<input type="text" name="sum" value="<?php echo($sum) ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item item1-4" style="text-align: center;">
				<h4>
					(<font class="error">Ghi chú: </font>
					Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
				</h4>
			</div>
		</div>
	</form>
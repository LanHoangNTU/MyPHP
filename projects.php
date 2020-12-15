<?php # Script 3.4 - index.php
$page_title = 'My projects';
include ('includes/header.php');
?>
<style>
	dl {
	  display: block;
	  margin-top: 1em;
	  margin-bottom: 1em;
	  margin-left: 0;
	  margin-right: 0;
	}
	dd{
		margin-left: 2em;
	}
</style>
<div class="row container-fluid px-5" style="margin: auto;">
	<div class="col-lg-4 rounded border border-info bg-light my-3">
		<dl>
			<dt>- Form</dt>
			<dd><a href="?path=baitap/php/Form/Bai_1.php">Bài 1: Diện tích hình chữ nhật</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_2.php">Bài 2: Diện tích và chu vi hình tròn</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_3.php">Bài 3: Thanh toán tiền điện</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_4.php">Bài 4: Kết quả thi đại học</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_5.php">Bài 5: Tính tiền Karaoke</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_6.php">Bài 6: Phép tính trên hai số</a></dd>
			<dd><a href="?path=baitap/php/Form/Bai_7.php">Bài 7: Gửi thông tin sang form khác</a></dd>
		</dl>
		<dl>
			<dt>- Array, String and Files</dt>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_1.php">Bài 1: Sinh mảng ngẫu nhiên</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_2.php">Bài 2: Tính năm âm lịch</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_3.php">Bài 3: Tính năm nhuận</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_4.php">Bài 4: Nhập và tính trên dãy số</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_5.php">Bài 5: Phát sinh mảng và tính toán</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_6.php">Bài 6: Tìm kiếm trong mảng</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_7.php">Bài 7: Thay thế phần tử trong mảng</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_7.php">Bài 8: Sắp xếp mảng</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_7.php">Bài 9: Đếm phần tử, ghép mảng và sắp xếp</a></dd>
			<dd><a href="?path=baitap/php/Array_String/BaiTap_7.php">Bài 10: Mua hoa</a></dd>
		</dl>
		<dl>
			<dt>- Object oriented programming</dt>
			<dd><a href="?path=baitap/php/OOP/OOP_Bai_1.php">Bài 1: Quản lý nhân viên</a></dd>
			<dd><a href="?path=baitap/php/OOP/OOP_Bai_2.php">Bài 2: các phép tính cơ bản trên hai phân số</a></dd>
		</dl>
		<dl>
			<dt>- MySQL</dt>
			<dd><a href="?path=baitap/php/MySQL/B_1_MySQL.php">Bài 1: Thông tin hãng sữa (Hiển thị lưới)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_2_MySQL.php">Bài 2: Thông tin khách hàng (Lưới định dạng)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_3_MySQL.php">Bài 3: Thông tin khách hàng (Lưới tùy biến)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_4_MySQL.php">Bài 4: Thông tin sữa (Lưới phân trang)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_5_MySQL.php">Bài 5: Thông tin các sản phẩm (List đơn giản)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_6_MySQL.php">Bài 6: Thông tin các sản phẩm (List dạng cột)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_7_MySQL.php">Bài 7: Thông tin các sản phẩm (List dạng cột có link)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_8_MySQL.php">Bài 8: Thông tin chi tiết các loại sữa (List chi tiết có phân trang)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_9_MySQL.php">Bài 9: Tìm kiếm Thông tin sữa (Tìm kiếm đơn giản)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_10_MySQL.php">Bài 10: Tìm kiếm Thông tin sữa (Tìm kiếm nâng cao)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_11_MySQL.php">Bài 11: Thêm sữa mới (Thêm mới)</a></dd>
			<dd><a href="?path=baitap/php/MySQL/B_12_MySQL.php">Bài 12: Thông tin khách hàng (Xóa - sửa)</a></dd>
		</dl>
	</div>
	<div class="col-lg-8 px-5">
		<?php 
			if (isset($_GET['path'])) {
				include($_GET['path']);
			}
		 ?>
	</div>
</div>

<!-- <div class="container view mt-5 bg-light p-2 rounded">
	<ul class="nav nav-tabs nav-justified" role="tablist">
		<li class="nav-item"><a class="nav-link active" href="#form" data-toggle="tab">Form</a></li>
		<li class="nav-item"><a class="nav-link" href="#array" data-toggle="tab">Array, String and File</a></li>
		<li class="nav-item"><a class="nav-link" href="#oop" data-toggle="tab">OOP</a></li>
		<li class="nav-item"><a class="nav-link" href="#mysql" data-toggle="tab">MySQL</a></li>
	</ul>

	<div class="tab-content pt-3 bg-white border-left border-right border-bottom">
		<div id="form" class="container tab-pane active">
			<div class="container">
				<div class="list-group list-group-flush">
					<a href="baitap/php/Form/Bai_1.php" class="list-group-item">Bài 1: Diện tích hình chữ nhật</a>
					<a href="baitap/php/Form/Bai_2.php" class="list-group-item">Bài 2: Diện tích và chu vi hình tròn</a>
					<a href="baitap/php/Form/Bai_3.php" class="list-group-item">Bài 3: Thanh toán tiền điện</a>
					<a href="baitap/php/Form/Bai_4.php" class="list-group-item">Bài 4: Kết quả thi đại học</a>
					<a href="baitap/php/Form/Bai_5.php" class="list-group-item">Bài 5: Tính tiền Karaoke</a>
					<a href="baitap/php/Form/Bai_6.php" class="list-group-item">Bài 6: Phép tính trên hai số</a>
					<a href="baitap/php/Form/Bai_7.php" class="list-group-item">Bài 7: Gửi thông tin sang form khác</a>
				</div>
			</div>
		</div>
		<div id="array" class="container tab-pane fade">
			<div class="container">
				<div class="list-group list-group-flush">
					<a href="baitap/php/Array_String/BaiTap_1.php" class="list-group-item">Bài 1: Sinh mảng ngẫu nhiên</a>
					<a href="baitap/php/Array_String/BaiTap_2.php" class="list-group-item">Bài 2: Tính năm âm lịch</a>
					<a href="baitap/php/Array_String/BaiTap_3.php" class="list-group-item">Bài 3: Tính năm nhuận</a>
					<a href="baitap/php/Array_String/BaiTap_4.php" class="list-group-item">Bài 4: Nhập và tính trên dãy số</a>
					<a href="baitap/php/Array_String/BaiTap_5.php" class="list-group-item">Bài 5: Phát sinh mảng và tính toán</a>
					<a href="baitap/php/Array_String/BaiTap_6.php" class="list-group-item">Bài 6: Tìm kiếm trong mảng</a>
					<a href="baitap/php/Array_String/BaiTap_7.php" class="list-group-item">Bài 7: Thay thế phần tử trong mảng</a>
					<a href="baitap/php/Array_String/BaiTap_7.php" class="list-group-item">Bài 8: Sắp xếp mảng</a>
					<a href="baitap/php/Array_String/BaiTap_7.php" class="list-group-item">Bài 9: Đếm phần tử, ghép mảng và sắp xếp</a>
					<a href="baitap/php/Array_String/BaiTap_7.php" class="list-group-item">Bài 10: Mua hoa</a>
					<div class="h-divider border border-dark"></div>
					<a href="baitap/php/Array_String/dulieu_BaiTap_4.txt" class="list-group-item">Dữ liệu bài 4: dulieu_BaiTap_4.txt</a>
					<a href="baitap/php/Array_String/dulieu_bai8.txt" class="list-group-item">Dữ liệu bài 8: dulieu_bai8.txt</a>
				</div>
			</div>
		</div>
		<div id="oop" class="container tab-pane fade">
			<div class="container">
				<div class="list-group list-group-flush">
					<a href="baitap/php/OOP/OOP_Bai_1.php" class="list-group-item">Bài 1: Quản lý nhân viên</a>
					<a href="baitap/php/OOP/OOP_Bai_2.php" class="list-group-item">Bài 2: các phép tính cơ bản trên hai phân số</a>
				</div>
			</div>
		</div>
		<div id="mysql" class="container tab-pane fade">
			<div class="container">
				<div class="list-group list-group-flush">
					<a href="baitap/php/MySQL/B_1_MySQL.php" class="list-group-item">Bài 1: Thông tin hãng sữa (Hiển thị lưới)</a>
					<a href="baitap/php/MySQL/B_2_MySQL.php" class="list-group-item">Bài 2: Thông tin khách hàng (Lưới định dạng)</a>
					<a href="baitap/php/MySQL/B_3_MySQL.php" class="list-group-item">Bài 3: Thanh toán tiền điện (Lưới tùy biến)</a>
					<a href="baitap/php/MySQL/B_4_MySQL.php" class="list-group-item">Bài 4: Thông tin sữa (Lưới phân trang)</a>
					<a href="baitap/php/MySQL/B_5_MySQL.php" class="list-group-item">Bài 5: Thông tin các sản phẩm (List đơn giản)</a>
					<a href="baitap/php/MySQL/B_6_MySQL.php" class="list-group-item">Bài 6: Thông tin các sản phẩm (List dạng cột)</a>
					<a href="baitap/php/MySQL/B_7_MySQL.php" class="list-group-item">Bài 7: Thông tin các sản phẩm (List dạng cột có link)</a>
					<a href="baitap/php/MySQL/B_8_MySQL.php" class="list-group-item">Bài 8: Thông tin chi tiết các loại sữa (List chi tiết có phân trang)</a>
					<a href="baitap/php/MySQL/B_9_MySQL.php" class="list-group-item">Bài 9: Tìm kiếm Thông tin sữa (Tìm kiếm đơn giản)</a>
					<a href="baitap/php/MySQL/B_10_MySQL.php" class="list-group-item">Bài 10: Tìm kiếm Thông tin sữa (Tìm kiếm nâng cao)</a>
					<a href="baitap/php/MySQL/B_11_MySQL.php" class="list-group-item">Bài 11: Thêm sữa mới (Thêm mới)</a>
					<a href="baitap/php/MySQL/B_12_MySQL.php" class="list-group-item">Bài 12: Thông tin khách hàng (Xóa - sửa)</a>
				</div>
			</div>
		</div>
	</div>
</div> -->

<?php
include ('includes/footer.html');
?>
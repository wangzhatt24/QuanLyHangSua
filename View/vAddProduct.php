<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>	
<?php 
	include_once("Controller/cProduct.php");
	
	if(isset($_REQUEST["btnsubmit"])) {
		$ma = $_REQUEST["txtMaSP"];
		$ten = $_REQUEST["txtTenSP"];
		$gia = $_REQUEST["txtGiaSP"];
		$mota = $_REQUEST["txtMota"];
		$cty = $_REQUEST["cboCty"];
		$loai = $_REQUEST["txtloaiSP"];
		$trongluong = $_REQUEST["txtTrongluongSP"];
		$file = $_FILES["ffile"]["tmp_name"];
		$type = $_FILES["ffile"]["type"];
		$name = $_FILES["ffile"]["name"];
		$size = $_FILES["ffile"]["size"];
		$p = new controlProduct();
		
		$kq = $p->AddProduct( $ma, $ten, $cty, $loai, $trongluong, $gia, $mota, $file, $type, $name, $size);

		if($kq==1) {
			echo "<script>alert('Thêm dữ liệu thành công')</script>";
			echo header("refresh: 0; url='index.php?Prod'");
		} elseif($kq==0){
			echo "<script>alert('Không thể insert')</script>";
		} elseif($kq==1) {
			echo "<script>alert('Không thể upload ảnh')</script>";
		} else if($kq==-2) {
			echo "<script>alert('Size > 2MB')</script>";
		} elseif($kq==-3) {
			echo "<script>alert('Không đúng định dạng')</script>";
		} else {
			echo "Lỗi không xác định";
		} 
	}
?>
<body>
<div style="width:100% ; height: 100%; background: #FF3300; ">
	<h2 style="padding-top: 10px">THÊM SẢN PHẨM</h2>
	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; text-align: left; width:100%;background: #FF99FF;">
        	<tr>
				<td>Mã sữa</td>
				<td><input type="text" name="txtMaSP" required></td>
			</tr>
			<tr>
				<td>Tên sữa</td>
				<td><input type="text" name="txtTenSP" required></td>
			</tr>
            <tr>
				<td>Hãng sữa</td>
				<td>
                <select name="cboCty">
                	<?php
						include("Controller/cCompany.php");
						$p = new controlCompany();
						$tblCompany = $p->getAllCompany();
						if(mysql_num_rows($tblCompany)> 0){
							while($row = mysql_fetch_assoc($tblCompany)){
								echo "<option value='". $row["CompID"]."'>". $row["CompName"]."</option>";
							}
						}
					?>
                </select>
                </td>
			</tr>
			
			<tr>
            	<td>Loại sữa</td>
                <td> 
                	<select name="txtloaiSP"> 
                    	<option value="Sữa tươi">Sữa tươi</option>
                        <option value="Sữa bột">Sữa bột</option>
                        <option value="Sữa tắm">Sữa tắm</option>
                        <option value="Sữa chua">Sữa chua</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td> Trọng lượng</td>
                <td>
                	<input type="number" name= "txtTrongluongSP" required> (ml or gr)
                </td>
            </tr>
            <tr>
				<td>Đơn giá</td>
				<td><input type="number" name="txtGiaSP" required> (VND)</td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea rows="5" cols="22" name="txtMota"></textarea></td>
			</tr>
			<tr>
				<td>Hình ảnh</td>
				<td><input type="file" name="ffile" required</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btnsubmit" value="Thêm">
					<input type="reset" value="Nhập lại">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
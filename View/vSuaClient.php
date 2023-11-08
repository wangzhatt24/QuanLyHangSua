<?php
	echo "<meta charset='utf-8'>";
    include_once("Controller/cClient.php");

	$p = new controlClient();
	
	if(isset($_REQUEST["upClient"])) {
		$ma = $_REQUEST["upClient"];
		$tblClient = $p->getAllClientInformationByma($ma);
	}	
	if($tblClient) {
		$row = mysql_fetch_assoc($tblClient);
	}
?>
<!DOCTYPE html>
<html>
<head>
		<title>Insert Form</title>
</head> 
<body>
	<h2>SỬA THÔNG TIN KHÁCH HÀNG</h2>
	<form action="#" method="post" enctype="multipart/form-data">
		<table style="margin: auto; text-align: left;">
        	<tr>
				<td>Mã Khách hàng</td>
				<td><input type="text"  value="<?php $ma= $row['ClientID']; echo "" . $row['ClientID'] . "" ?>" name="txtMaKH" readonly></td>
			</tr>
			<tr>
				<td>Tên Khách hàng</td>
				<td><input type="text" value=<?php echo "'" . $row['ClientName'] . "'" ?> name="txtTenKH" required></td>
			</tr>
            <tr>
				<td>Phái</td>
				<td>
                	<?php 
						if($row['ClientSex'] ==1){
							echo '<input type="radio" name="phai" value="1" checked="checked" />Nữ ';
                    		echo '<input type="radio" name="phai" value="0" />Nam';
						}
						else{
							echo '<input type="radio" name="phai" value="1"  />Nữ ';
                    		echo '<input type="radio" name="phai" value="0" checked="checked"/>Nam';	
						}
					?>
                </td>
			</tr>
            <tr>
            	<td> Địa chỉ</td>
                <td>
                	<input type="text" value=<?php echo "'" . $row['ClientAddress'] . "'" ?> name= "txtDiachiKH" required>
                </td>
            </tr>
            <tr>
				<td>Phone</td>
				<td><input type="number" value=<?php echo "'" . $row['ClientPhone'] . "'" ?> name="txtPhoneKH" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" value=<?php echo "'" . $row['ClientEmail'] . "'" ?> name="txtMailKH" required</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btnsua" value="Thêm">
					<input type="reset" value="Nhập lại">
                    <input type="submit" name="btnhuy" value="Hủy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	include_once("Controller/cClient.php");
	
	if(isset($_REQUEST["btnhuy"])) {
		echo header("refresh: 0; url='index.php'");
	} 
	if(isset($_REQUEST["btnsua"])) {
		$ma = $_REQUEST["txtMaKH"];;
		$ten = $_REQUEST["txtTenKH"];
		$sex = $_REQUEST["phai"];
		$dc = $_REQUEST["txtDiachiKH"];
		$phone = $_REQUEST["txtPhoneKH"];
		$mail = $_REQUEST["txtMailKH"];
		$p = new controlClient();
		$kq = $p->getUpdateClient($ma,$ten,$sex,$dc,$phone,$mail);
		echo $ma,$ten,$sex,$dc,$phone,$mail."<br>";
		if($kq==1){
			echo "<script>alert('Sửa dữ liệu thành công')</script>";
			echo header("refresh: 0; url='index.php?mProd'");
		} else if($kq==0){
			echo "<script>alert('Không thể sửa')</script>";
		}else {
			echo "Lỗi không xác định";
		} 
	}
?>
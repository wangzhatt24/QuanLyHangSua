<?php
	echo "<meta charset='utf-8'>";
    include_once("Controller/cCompany.php");

	$p = new controlCompany();
	
	if(isset($_REQUEST["upComp"])) {
		$MAHS = $_REQUEST["upComp"];
		$tblCompany = $p->getAllCompanyInformationByMAHS($MAHS);
	}	
	if($tblCompany) {
		$row = mysql_fetch_assoc($tblCompany);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Form</title>
	</head> 
	<body>
		<h2>Thông tin công ty</h2>
		
		<form action="#" method="post" enctype="multipart/form-data">
        	<table style="margin: auto; text-align: left;">
            	<tr>
                	<td>ID Company </td>
                	<td>
                    	<input type="text" value=<?php $ID= $row['CompID']; echo "'" . $row['CompID'] . "'" ?> name="ID" readonly>
                    </td>
                </tr>
      			<tr>
                	<td>Mã hãng sữa </td>
                	<td>
                    	<input type="text" value=<?php echo "'" . $row['CompHangSua'] . "'" ?> name="MAHS" required>
                    </td>
                </tr>
				<tr>
                	<td>Tên hãng sữa</td>
                	<td>
                    	<input type="text" value=<?php echo "'" . $row['CompName'] . "'" ?> name="TENHS" required>
                    </td>
                </tr>
				<tr>
                	<td>Địa chỉ</td>
                	<td>
                    	<input type="text" value=<?php echo "'" . $row['CompAddress'] . "'" ?> name="DIACHI" required>
                    </td>
                </tr>
                <tr>
                	<td>Điện thoại</td>
                	<td>
                    <input type="text" value=<?php echo "'" . $row['CompPhone'] . "'" ?> name="DIENTHOAI" required>
                    </td>
                </tr>
				<tr>
                	<td>Email</td>
                	<td>
                    	<input type="text" value=<?php echo "'" . $row['CompEmail'] . "'" ?> name="EMAIL" required>
                    </td>
                	 
                </tr>
				<tr>
                	<td>
                    	
                    </td>
                	<td>
                    	<input type="submit" name="btnsua" value="Sửa">
                    	<input type="reset" value="Nhập lại">
                        <input type="submit" name="btnhuy" value="Hủy">
                    </td>
		
                </tr>
			</table>
		</form>
	</body>
</html>
<?php 
	include_once("Controller/cCompany.php");
	
	if(isset($_REQUEST["btnhuy"])) {
		echo header("refresh: 0; url='index.php'");
	} 
	if(isset($_REQUEST["btnsua"])) {
		$ID = $_REQUEST["ID"];
		$MAHS = $_REQUEST["MAHS"];
		$TENHS = $_REQUEST["TENHS"];
		$DIACHI = $_REQUEST["DIACHI"];
		$DIENTHOAI = $_REQUEST["DIENTHOAI"];
		$EMAIL = $_REQUEST["EMAIL"];
		$p = new controlCompany();
		$kq = $p->getUpdateCompany($MAHS, $TENHS, $DIACHI, $DIENTHOAI, $EMAIL, $ID);
		
		if($kq==1) {
			echo "<script>alert('Sửa dữ liệu thành công')</script>";
			echo header("refresh: 0; url='index.php?mProd'");
		} else if($kq==0){
			echo "<script>alert('Không thể sửa')</script>";
		}else {
			echo "Lỗi không xác định";
		} 
	}
?>
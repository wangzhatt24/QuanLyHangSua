<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
	<table border="1px solid" style="margin: auto; text-align: center; width: 960px">
		<tr class="normal">
			<td colspan="2">Banner</td>
		</tr>
		<tr class="normal">
			<td colspan="2">Menu|
            <a href="index.php">Trang Chủ</a>|
            <a href="admin.php">Trang Admin</a>|
            </td>
		</tr>
		<tr class="normal">
			<td width="15%" align="center" style="vertical-align:top;">
            	<b>ADMIN</b><hr/>
				<a href="admin.php?addProd">Thêm sản phẩm</a><hr/>
                <a href="admin.php?showComp">Xem công ty</a><hr/>
                <a href="admin.php?showProd">Xem sản phẩm</a><hr/>
                 <a href="admin.php?showCliet">Xem Khách hàng</a>
			</td>
			<td id="main">
				<?php
					 if(isset($_REQUEST["addProd"])) {
						include ("View/vAddProduct.php");
					}else if(isset($_REQUEST["showComp"])) {
						include ("View/vAdminComp.php");
					}else if(isset($_REQUEST["showProd"])){
						include ("View/vAdminprod.php");
					}else if(isset($_REQUEST["showCliet"])) {
						include ("View/vAdminClient.php");
					}else if(isset($_REQUEST["UpClient"])) {
						include ("View/vAdminClient1.php");
					}else if(isset($_REQUEST["upComp"])) {
						include ("View/vSuaComp.php");
					}else if(isset($_REQUEST["upClient"])) {
						include ("View/vSuaClient.php");
					}else{
						echo "TRANG DÀNH CHO ADMIN";
					}
				?>
			</td>
		</tr>
		<tr class="normal">
			<td colspan="2">Footer</td>
		</tr>
	</table>
</body>
</html>
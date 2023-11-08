<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Tuần 9</title>
</head>

<body>
	<table border="1px solid" style="margin: auto;text-align:center; width: 960px;">
    	<tr>
        	<td colspan="2">Banner</td>
</tr>
        <tr>
        	<td colspan="2">Menu|
            <a href="index.php">Trang Chủ</a>|
            <a href="admin.php">Trang Admin</a>|
            </td>
        </tr>
        <tr>
        	<td width="15%" align="left" style="vertical-align:top;">
            	<b>Danh sách Công Ty</b><hr/>
            	<?php
					include_once("View/vCompany.php");
				?>
            </td>
            <td style="vertical-align:top"><b>Sản Phẩm</b><hr/>
            	<?php
					if(isset($_REQUEST["inforProd"])) {
						include ("View/vInforPrd.php");
					}else{
						include_once("View/vProduct.php");
					}
				?>
            </td>
            
        </tr>
        <tr>
        	<td colspan="2">
            	Footer
            </td>
        </tr>
    </table>
</body>
</html>
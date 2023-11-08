<?php
	echo "<meta charset='utf-8'>";
    include_once("Controller/cProduct.php");

	$p = new controlProduct();
	
	if(isset($_REQUEST["inforProd"])) {
		$ID = $_REQUEST["inforProd"];
		$tblProduct = $p->getAllProductInformationByID($ID);
	}	
	if($tblProduct) {
		$row = mysql_fetch_assoc($tblProduct);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Form</title>
	</head> 
	<body>
		<h2>Thông tin sản phẩm</h2>
        <table style="width:100%; height:100%; text-align:center;">
        	<tr>
            	<td rowspan="6">
                	<?php
                		echo "<img width = '100px' height='100px' src='image/".$row['ProdImage']."'/>"	
					?>
                </td>
                
           	</tr>
            <tr>
            	<td>Tên Sản Phẩm: </td>
            	<td>
                	<?php
                		echo "<b>".$row['ProdName']."</b><br>";
					?>
                </td>
            </tr>
            
            <tr>
            	<td>Loại Sản Phẩm: </td>
            	<td>
                	<?php
						echo $row['ProdType']."<br>";
					?>
                </td>
            </tr>
            <tr>
            	<td>Trọng lượng Sản Phẩm: </td>
            	<td>
                	<?php
                		echo $row['ProdWeight']." ml<br>";
						
					?>
                </td>
            </tr>
            <tr>
            	<td>Giá Sản Phẩm: </td>
            	<td>
                	<?php
                		
						echo $row['ProdPrice'].".đ<br>";
					?>
                </td>
            </tr>
             <tr>
             	<td>Mô tả Sản Phẩm: </td>
             	<td>
                	<?php
                		echo $row['ProdDescription']."<br>";
						
					?>
                </td>
             </tr> 
             <tr>
             	<td></td>
                <td></td>
                <td>
                <?php
                	echo "<a href='index.php?Comp=".$row["CompID"]."'>Quay Lại</a>";
				?>
                </td>
             </tr>  
        </table>
	</body>
</html>
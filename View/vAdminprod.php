<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
		echo '<table border="1" style="width: 100%;">';
            echo '<tr>';
                echo '<th>STT</th>';
                echo '<th>Tên sữa</th>';
				echo '<th>Hãng sữa</th>';
                echo '<th>Giá</th>';
				echo '<th>Loại sữa</th>';
				echo '<th>Trọng Lượng</th>';
                echo '<th>Hình</th>';
            echo '</tr>';
            require_once 'Controller/cProduct.php';
            $p = new controlProduct();
			$tblProduct = $p->getAllProduct();
			$i =1;
            if ($tblProduct){
                if(mysql_num_rows($tblProduct)>0){
                    while($rows = mysql_fetch_assoc($tblProduct)){
                            echo '<tr>';
                                echo '<td>'. $i++.'</td>';
                                echo '<td>'.$rows["ProdName"].'</td>';
								require_once 'Controller/cCompany.php';
            					$p = new controlCompany();
								$tblCompany = $p->getAllCompany();
								if ($tblCompany){
                					if(mysql_num_rows($tblCompany)>0){
                    					while($row = mysql_fetch_assoc($tblCompany)){
											if($row["CompID"] == $rows["CompID"]){
												echo '<td>'.$row["CompName"].'</td>';
											}
										}
									}
								}
								
                                echo '<td>'.$rows["ProdPrice"].".đ".'</td>';
								echo '<td>'.$rows["ProdType"].'</td>';
								echo '<td>'.$rows["ProdWeight"].'Gram</td> ';
                                echo '<td>'."<img width = '100px' height='100px' src='image/".$rows["ProdImage"]."'/>".'</td>';

                            echo '</tr>';
                    }
                }else{
                    echo "0 result";
                }
            }else{
                echo "Error";
            }
            echo '</table>';
	?>
    
</body>
</html>

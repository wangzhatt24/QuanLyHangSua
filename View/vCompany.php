<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>	
<body>
<?php
		include("Controller/cCompany.php");
		$p = new controlCompany();
		$tblCompany = $p->getAllCompany();
		if($tblCompany){
			if(mysql_num_rows($tblCompany)> 0)	{
				while($row = mysql_fetch_assoc($tblCompany)){
					echo "<a href='index.php?Comp=".$row["CompID"]."'>".$row["CompName"]."</a><br>"; 
				}
			}
			else{
				echo "0 result";	
			}
		}
		else{
			echo "Error";	
		}
	?>
</body>
</html>
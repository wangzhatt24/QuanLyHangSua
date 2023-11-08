<?php
	include_once("Ketnoi.php");
	
	class modelCompany{
		function SelectAllCompany(){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$sQuery= "select * from company";	 
				$table=mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
				
			}else{
				return false;	
			}
		}
		function SelectAllCompanyInformationByMAHS($MAHS) {
            $con;

            $p = new ketnoiDB();

            if($p->ketnoi($con)) {
                $string = "SELECT * FROM company WHERE CompID = '$MAHS'";
                $table = mysql_query($string);

                $p->dongketnoi($con);

                return $table;
            } else {
                return false;
            }
        }
		function UpdateCompany($MAHS, $TENHS, $DIACHI, $DIENTHOAI, $EMAIL, $ID) {
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)) {
				$sQuery = "UPDATE company
				SET CompHangSua =N'".$MAHS."', CompName = N'".$TENHS."', CompAddress = N'".$DIACHI."', CompPhone = ".$DIENTHOAI.", CompEmail = N'".$EMAIL."' WHERE CompID = '".$ID."';";
			
				$table = mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
			} else {
				return false;
			}
		}	
	}
?>
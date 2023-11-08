<?php
	include_once("Ketnoi.php");
	
	class modelClient{
		function SelectAllClient(){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$sQuery= "select * from client";	 
				$table=mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
				
			}else{
				return false;	
			}
		}
		function SelectAllClientInformationByma($ma) {
            $con;

            $p = new ketnoiDB();

            if($p->ketnoi($con)) {
                $sQuery = "SELECT * FROM client WHERE ClientID = N'".$ma."';";
                $table = mysql_query($sQuery);

                $p->dongketnoi($con);

                return $table;
            } else {
                return false;
            }
        }	
		function UpdateClient($ma,$ten,$sex,$dc,$phone,$mail){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				echo $ma,$ten,$sex,$dc,$phone,$mail."<br>";
				$sQuery= "UPDATE client
				SET ClientName=N'".$ten."', ClientSex=".$sex.",ClientAddress=N'".$dc."', ClientPhone=".$phone.", ClientEmail=N'".$mail."' where ClientID=N'".$ma."';";	 
				$table=mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
				
			}else{
				return false;	
			}
		}
	}
?>
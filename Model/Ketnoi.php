<?php
	class ketnoiDB{
		function ketnoi(& $con){
			$con = mysql_connect("localhost","thuan","123");
			mysql_set_charset("utf8");
			if($con){
				return mysql_select_db("qlhs");
					
			}else{
				return false;	
			}
		}
		function dongketnoi($con){
			mysql_close($con);	
		}
	}
?>
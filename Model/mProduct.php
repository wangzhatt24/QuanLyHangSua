<?php
	include_once("Ketnoi.php");
	
	class modelProduct{
		function SelectAllProduct(){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$sQuery= "select * from product";	
				$table=mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
				
			}else{ 
				return false;	
			}
		}	
		function SelectAllProductByCompany($comp){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$sQuery = "select * from product where CompID =".$comp;
				$table=mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function SelectAllProductPage($limit, $count) {
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				//Truy van du lieu lay danh sach san pham tu vi tri limit den vi tri count
				$sQuery = "SELECT * FROM PRODUCT ORDER BY ProdID DESC LIMIT $limit, $count"; /*. $limit . "," . $count;*/
				$table = mysql_query($sQuery);
				$p->dongketnoi($con);
				return $table;
			} else {
				return false;
			}
		}
		function InsertProduct( $ma, $ten, $cty, $loai, $trongluong, $gia, $mota, $file, $type, $name, $size) {
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "insert into product( ProdID, ProdName, CompID, ProdType, ProdWeight, ProdPrice, ProdDescription, ProdImage) values ";
				$string .= "(N'".$ma."',N'".$ten."',".$cty.",N'".$loai."',".$trongluong.",".$gia.",N'".$mota."',N'".$name."')";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;
			} else {
				return false;
			}
		}
			function SelectAllProductInformationByID($ID) {
            $con;

            $p = new ketnoiDB();

            if($p->ketnoi($con)) {
                $string = "SELECT * FROM product WHERE ProdID = '$ID'";
                $table = mysql_query($string);

                $p->dongketnoi($con);

                return $table;
            } else {
                return false;
            }
        }

	}
?>
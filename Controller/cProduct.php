<?php
	include_once("Model/mProduct.php");
	
	class controlProduct{
			function countProduct() {
				$p = new modelProduct();
				$tblProduct = $p->SelectAllProduct();
				return mysql_num_rows($tblProduct);
			}
			function getAllProduct() {
				$p = new modelProduct();
				$tblProduct = $p->SelectAllProduct();
				return $tblProduct;
			}
			function getAllProductByCompany($comp){
				$p = new modelProduct();
				$tblproduct = $p->SelectAllProductByCompany($comp);
				return $tblproduct;
			}
			function getAllProductPage($page, $count) {
				$p = new modelProduct();
				$tblProduct = $p->SelectAllProductPage(($page - 1) * $count, $count);
				return $tblProduct;
			}
			function AddProduct($ma, $ten, $cty, $loai, $trongluong, $gia, $mota, $file, $type, $name, $size) {
			if($type == "image/jpeg" || $type == "image/png") {
				if($size <= 2*1024*1024) {
					if(move_uploaded_file($file, "image/" . $name)) {
						$p = new modelProduct();
						$ins = $p->InsertProduct($ma, $ten, $cty, $loai, $trongluong, $gia, $mota, $file, $type, $name, $size);
						if($ins) {
							return 1;
						} else {
							return 0; 
						}
					} else {
						return -1; 
					}
				} else {
					return -2; 
				} 
			} else {
				return -3; 
			}
		}
		function getAllProductInformationByID($ID) {
            $p = new modelProduct();
            $tblProduct = $p->SelectAllProductInformationByID($ID);
            return $tblProduct;
			}
	}
?>
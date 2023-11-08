<?php
	include_once("Model/mCompany.php");
	
	class controlCompany{ 
			function getAllCompany(){
				$p = new modelCompany();
				$tblComp = $p->SelectAllCompany();
				return $tblComp;
			}
			function getAllCompanyInformationByMAHS($MAHS) {
            $p = new modelCompany();
            $tblCompany = $p->SelectAllCompanyInformationByMAHS($MAHS);
            return $tblCompany;
			}
			function getUpdateCompany($MAHS, $TENHS, $DIACHI, $DIENTHOAI, $EMAIL, $ID) {
			$p = new modelCompany();
			$ins = $p->UpdateCompany($MAHS, $TENHS, $DIACHI, $DIENTHOAI, $EMAIL, $ID);
			if($ins) {
				return 1;
			} else {
				return 0; //Insert Failed
			}
		}
	}
?>
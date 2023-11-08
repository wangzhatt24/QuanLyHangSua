<?php
	include_once("Model/mClient.php");
	
	class controlClient{ 
			function getAllClient(){
				$p = new modelClient();
				$tblClient = $p->SelectAllClient();
				return $tblClient;
			}
			function getAllClientInformationByma($ma) {
            $p = new modelClient();
            $tblCompany = $p->SelectAllClientInformationByma($ma);
            return $tblCompany;
		}
			function getUpdateClient($ma,$ten,$sex,$dc,$phone,$mail){
				echo $ma,$ten,$sex,$dc,$phone,$mail ."<br>";
				$p = new modelClient();
				$tblClient = $p->UpdateClient($ma,$ten,$sex,$dc,$phone,$mail);
				if($tblClient) {
					return 1;
				} else {
					return 0;
				}
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
       #client:nth-child(even) {
            background-color: orange;
        }
 </style>
<body>
	<h2>XEM THÔNG TIN KHÁCH HÀNG</h2>
	<a href="admin.php?UpClient">Sửa thông tin</a>
    <form action="#" method="post" enctype="multipart/form">
        <?php 
            echo '<table border="1" style="width: 100%;">';
            echo '<tr>';
                echo '<th>ClientID</th>';
                echo '<th>Client</th>';
                echo '<th>ClientAddress</th>';
                echo '<th>ClientPhone</th>';
                echo '<th>ClientEmail</th>';
            echo '</tr>';
            require_once 'Controller/cClient.php';
            $p = new controlClient();
            $tblClient = $p-> getAllClient();
            if ($tblClient){
                if(mysql_num_rows($tblClient)>0){
                    while($rows = mysql_fetch_assoc($tblClient)){
                            echo '<tr id="client">';
                                echo '<td>'. $rows["ClientID"] .'</td>';
                                echo '<td>'.$rows["ClientName"].'</td>';
                              //  echo '<td>'.$rows["ClientSex"].'</td>';
								if($rows["ClientSex"] == 0){
									echo '<td>Nam</td>';
								}else{ 
									echo '<td>Nữ</td>';
								}
                                echo '<td>'.$rows["ClientPhone"].'</td>';
                                echo '<td>'.$rows["ClientEmail"].'</td>';

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
    </form>
</body>
</html>
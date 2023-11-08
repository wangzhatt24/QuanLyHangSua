<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form">
        <?php 
            echo '<table border="1" style="width: 100%;">';
            echo '<tr>';
                echo '<th>Hãng sữa</th>';
                echo '<th>CompName</th>';
                echo '<th>CompAddress</th>';
                echo '<th>CompPhone</th>';
                echo '<th>CompEmail</th>';
				echo '<th>Attion</th>';
            echo '</tr>';
            require_once 'Controller/cCompany.php';
            $p = new controlCompany();
            $tblCompany = $p-> getAllCompany();
            if ($tblCompany){
                if(mysql_num_rows($tblCompany)>0){
                    while($rows = mysql_fetch_assoc($tblCompany)){
                            echo '<tr>';
                                echo '<td>'. $rows["CompHangSua"] .'</td>';
                                echo '<td>'.$rows["CompName"].'</td>';
                                echo '<td>'.$rows["CompAddress"].'</td>';
                                echo '<td>'.$rows["CompPhone"].'</td>';
                                echo '<td>'.$rows["CompEmail"].'</td>';
                                echo '<td>
                                    <a href="#">Xoá</a>
                                    <a href="admin.php?upComp='.$rows["CompID"].'">Sửa</a>
                                </td>';

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
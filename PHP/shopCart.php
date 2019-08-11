<?php
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server");
    mysqli_select_db($link, $dbname);
    $content = [];//用陣列存取

    for($i = 0 ; $i<count($_SESSION["shopcart"]) ; $i++){
        $sqlCommand = "select * from product where id ='".$_SESSION["shopcart"][$i]."'";
        $result = mysqli_query($link,$sqlCommand);
        $content[] = mysqli_fetch_assoc($result);
    }
    
    
    // $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>購物車</title>
    <style>
        body {
            background-color: lightblue;
        }
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>您選購的商品</h1>
    <div align="center">
        <table>
            <tr>
                <?php
                   foreach ($content as $key => $value) {
                        echo "<td>";
                        echo '<h2>'.$value["pName"].'</h2><br>';
                        echo "<img src='data:image/png;base64,".base64_encode($value['pImg'])."' />";
                        echo '<h3>$'.$value["price"].'</h3><br>';
                        echo "</td>";
                    }
                ?>
            </tr>
        </table>
    </div>
</body>
</html>
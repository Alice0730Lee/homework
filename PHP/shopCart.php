<?php
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server");
    mysqli_select_db($link, $dbname);
    $sqlCommand = "select * from product where id ='".$_SESSION["shopcart"]."'";
    $result = mysqli_query($link,$sqlCommand);
    $content = [];//用陣列存取
    $row = mysqli_fetch_assoc($result);
    // var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>購物車</title>
</head>
<body>
    <h1>您選購的商品</h1>

</body>
</html>
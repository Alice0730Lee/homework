<?php
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server");
    mysqli_select_db($link, $dbname);
    $sqlCommand = "select * from product";
    $result = mysqli_query($link,$sqlCommand);
    $content = [];
    $row = mysqli_fetch_assoc($result);
    while(isset($row) != ""){
        $content[] = $row;
        $row = mysqli_fetch_assoc($result);
    }
    // var_dump($content);
    // exit();

    if(isset($_POST["btnLogin"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>CY SHOP</title>
    <style>
        body {
            background-color: lightblue;
        }
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div align="center">
        <h1>CY SHOP</h1>
    </div>
    <div align="right">
        <form method="post" action="">
            <input type = "submit" name = "btnLogin" value = "登入會員"/>
        </form>
    </div>
    <div align="center">
        <form method="post" action="">
            <table>
                <tr>
                <?php
                   foreach ($content as $key => $value) {
                        echo "<script><td></script>";
                        echo 'value='.$value["pName"].'<br>';
                        echo 'value='.$value["price"].'<br>';
                        echo "<i class='fas fa-cart-plus' style='font-size:36px'></i>";
                        echo "<script></td></script>";
                    }
                ?>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
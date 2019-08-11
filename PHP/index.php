<?php
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server");
    mysqli_select_db($link, $dbname);
    $sqlCommand = "select * from product";//列出資料表內的所有資料
    $result = mysqli_query($link,$sqlCommand);
    $content = [];//用陣列存取
    $row = mysqli_fetch_assoc($result);

    //直到$row沒有值
    while(isset($row) != ""){
        $content[] = $row;
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_POST["btnLogin"])){
        header("Location: login.php");
    }
    if(isset($_POST["btnCart"])){
        var_dump($_POST);
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
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
    <script>
        function add(){
            let add = document.getElementsbyName();
            alert("已加入購物車");
        }
    </script>
</head>
<body>
    <div align="center">
        <h1>CY SHOP</h1>
    </div>
    <form method="post" action="">
    <div align="right">
        
            <input type = "submit" name = "btnCart" value = "查看購物車"/>
            <input type = "submit" name = "btnLogin" value = "登入會員"/>
    </div>
    <div align="center">
            <table>
                <tr>
                <?php
                   foreach ($content as $key => $value) {
                        echo "<td>";
                        echo '<h2>'.$value["pName"].'</h2><br>';
                        // echo "<img src='/;charset=utf-8;base64,".$value['pImg']."' />";
                        echo '<h3>$'.$value["price"].'</h3><br>';
                        echo "<input type='button' name='".$value["id"]."' onclick='add()' value='加入購物車'>";
                        // echo "<a type='submit' name=".$value["id"]."><i class='fas fa-cart-plus' style='font-size:36px'></i></a>";
                        echo "</td>";
                    }
                ?>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
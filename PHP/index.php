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
    // var_dump($content);
    // exit();
    if(isset($_SESSION["uName"])){
        $logIO = "登出會員";
    }
    else if(!isset($_SESSION["uName"])){
        $logIO = "登入會員";
    }

    if(isset($_POST["btnLogIO"])){
        if(isset($_SESSION["uName"])){
            unset($_SESSION["uName"]);
            $logIO = "登入會員";
        }
        else{
        header("Location: login.php");
        }
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
            let add = document.getElementsByTagName("input");
            console.log(add.id);
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
            <input type = "submit" name = "btnLogIO" value = "<?=$logIO?>"/>
    </div>
    <div align="center">
            <table>
                <tr>
                <?php
                   foreach ($content as $key => $value) {
                        echo "<td>";
                        echo '<h2>'.$value["pName"].'</h2><br>';
                        echo "<img src='data:image/png;base64,".base64_encode($value['pImg'])."' />";
                        echo '<h3>$'.$value["price"].'</h3><br>';
                        echo "<input class='add' type='button' id='".$value["id"]."' onclick='add()' value='加入購物車'>";
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
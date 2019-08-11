<?php
    //連接資料庫
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server"); 
    mysqli_select_db($link, $dbname);

    if(isset($_SESSION["join"])){
        echo "<script>alert('恭喜您已加入會員，請登入開始購物囉!')</script>";
        unset($_SESSION["join"]);
    }

    // 確認有這組帳密
    if(isset($_POST["btnLogin"])){
        $sqlCommandChk = "select * from User where UserName = '".$_POST["userName"]."' and UserPassword = '".$_POST["userPassword"]."'";
        $resultChk = mysqli_query($link, $sqlCommandChk);
        $rowChk = mysqli_fetch_assoc($resultChk);
        if($rowChk){
            $_SESSION["uName"] = $_POST["userName"];
            header("Location: index.php");
        }
        else{
            echo "<script>alert('帳號密碼有誤!')</script>";
        }
    } 
    //申請會員
    if(isset($_POST["btnJoin"])){
        header("Location: join.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CY會員登入</title>
    <style>
        #div, body{
            background-color: lightblue;
            
        }
        span{
            font-size : 20px;
        }

        input[type=text], input[type=password], select {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 50%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="div" align="center">
        <h1>會員登入</h1>
        <form method="post" action="">
            <span>帳號：</span><input type="text" name = "userName" /><br>
            <span>密碼：</span><input type="password" name = "userPassword"/><br>
            <input type="submit" name = "btnLogin" value = "登入"/>
            <input type="submit" name = "btnJoin" value = "申請會員"/>
        </form>
    </div>
</body>
</html>
<?php
    //連接資料庫
    require_once("config.php");
    session_start();
    $link = mysqli_connect($dbhost, $dbuser,$dbpass) or die("Unable to connect to SQL server");
    mysqli_select_db($link, $dbname);

    if(isset($_POST["btnJoinUser"])){
        if($_POST["userPassword"] != $_POST["chkPassword"]){
            echo "<script>alert('密碼輸入有誤，請再確認一次!')</script>";
        }
        if(isset($_POST["name"]) and isset($_POST["tel"]) and isset($_POST["userName"]) and isset($_POST["userPassword"]) and isset($_POST["chkPassword"])){
            $_SESSION["join"] = true;
            $joinIf = [$_POST['name'],$_POST['tel'],$_POST['userName'],$_POST['userPassword']];
            $sqlIndertCommamd=
                "insert into user (name,tel,userName,userPassword) values
                ('$joinIf[0]','$joinIf[1]','$joinIf[2]','$joinIf[3]')";
                mysqli_query($link, $sqlIndertCommamd);
            header("Location: login.php");
        }
        else{
            echo "<script>alert('欄位不得為空!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申請會員</title>
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
        <h1>會員資料</h1>
        <form method="post" action="">
            <span>名稱：<input type="text" name="name" /></span><br><br>
            <span>電話：<input type="text" name="tel"/></span><br><br>
            <span>帳號：<input type="text" name="userName"/></span><br><br>
            <span>密碼：<input type="password" name="userPassword"/></span><br><br>
            <span>確認密碼：<input type="password" name="chkPassword"/></span><br><br>
            <input type="submit" name="btnJoinUser" value="申請會員"/>
        </form>
    </div>
</body>
</html>
<?php
session_start();
if(isset($_POST["btnlogout"])){
    unset($SESSION["uName"]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div align="center">
        <form method="post" action="">
            <h1>歡迎光臨!!<?= $_SESSION["uName"]?></h1>
            <h3>此頁面功能即將開放，盡請期待~</h3>
            <input type="submit" name="btnlogout" value = "登出"/>
            <input type="submit" name="btnIndex" value="回首頁">
        </form>
    </div>
</body>
</html>
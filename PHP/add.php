<?php
session_start();
$_SESSION["shopcart"][] = $_POST['id'];
?>
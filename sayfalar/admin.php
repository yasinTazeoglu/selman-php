<?php
session_start();
if (isset($_SESSION["user"])){
    header("Location: /neverThink/sayfalar/AdminPanel.php");
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/adminLogin.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/adminK.js"></script>
</head>
<body>

<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div>never<span>Think</span></div>
</div>
<br>
<div class="loginForm">
    <input type="text" placeholder="username" autocomplete="off" name="user"><br>
    <input type="password" placeholder="password" name="password"><br>
    <input type="button" class="login" value="Login"><br>
    <input class="homepage" type="button" value="Anasayfa">
</div>
</body>
</html>
<?php include '../phpKontrol/adminpanelKontrol.php';
include '../phpKontrol/database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="../css/adminPanel.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/AdminPanel.js"></script>
</head>
<body>
<div class="header">
    <div class="logo"><h2>never<span class="think">Think</span></h2></div>
    <div class="banner">Admin</div>
    <div class="header-right"><a class="exit">Cıkıs Yap</a></div>
</div>
<div class="sidebar">
    <ul id="accordion">
        <li>
            <div><a class="onaylanmayan">Onaylanmayan Yemekler</a></div>
        </li>
        <li>
            <div><a>Yemek Listesi</a></div>
        </li>
    </ul>
</div>
<div class="content"></div>
</body>
</html>


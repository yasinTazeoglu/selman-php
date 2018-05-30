<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: /neverThink/sayfalar/admin.php");
}if (isset($_POST["exit"])){
    session_destroy();
    echo json_encode("1");
}
?>

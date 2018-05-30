<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=yemekliste;charset=utf8", "root", "");//bağlantı
} catch (PDOException $e) {
    print $e->getMessage();
}
$pdo = PDO::FETCH_ASSOC;
?>
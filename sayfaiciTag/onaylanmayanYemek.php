<?php
include '../phpKontrol/adminpanelKontrol.php';
include '../phpKontrol/database.php';
echo '<hr>';
$saveEat = $db->query("SELECT * FROM yemeksave", $pdo);
foreach ($saveEat as $item) {
    $savemal = $db->query("SELECT * FROM malzemesave where yemek_id=" . $item["id"], $pdo);
    $disap = "";
    foreach ($savemal as $value) {
        $disap .= $value["miktar"] . " " . $value["miktartur"] . " " . $value["isim"] . " ";
    }
    echo '<div class="list"><div class="isim">' . $item["isim"] . '</div><div class="label">';
    if (strlen($disap) > 26) {
        for ($i = 0; $i < 26; $i++) {
            echo $disap[$i];
        }
    } else {
        echo $disap;
    }
    echo '...</div><span class="buton">Onayla</span><span class="buton">sil<span class="delet">X</span></span></div>
    <hr>';
    //  echo "</ul>";
    //echo "<li>".$item["tarif"]."</li></ul><br><br>";
}
?>
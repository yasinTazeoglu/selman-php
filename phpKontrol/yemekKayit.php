<?php
include 'database.php';
if (isset($_POST)) {
    $Kgelenyemek = $_POST['a'];
    $bool = false;
    $query = $db->prepare("INSERT INTO yemeksave SET
isim = ?,
tarif = ?");
    $insert = $query->execute(array(
        $Kgelenyemek[0], $Kgelenyemek[2]
    ));
    if ($insert) {
        $last_id = $db->lastInsertId();
        foreach ($Kgelenyemek[1] as $item) {
            $malzeme = $db->prepare("INSERT INTO malzemesave SET
miktar = ?,
miktartur = ?,
isim=?,
yemek_id=?
");
            $malzemeinsert = $malzeme->execute(array(
                $item[0],
                $item[1],
                $item[2],
                $last_id
            ));
            if ($malzemeinsert) {
                $last_idmalemem= $db->lastInsertId();
                $bool = true;
            }
        }

    }
    echo json_encode($bool);
}
?>
<?php
include 'database.php';
$malzemeler = $db->query("SELECT * FROM malzemeler",$pdo);
$yan_malzemeler = $db->query("SELECT * FROM yan_malzemeler",$pdo);
$miktar_tur = $db->query("SELECT * FROM miktar_tur",$pdo);
$gelen_Malzeme=array();
$gelenyanMalzeme=array();
$gelenmiktarTur=array();
$toplu=array();
foreach ($malzemeler as $item){
    array_push($gelen_Malzeme,$item);
}
foreach ($yan_malzemeler as $item){
    array_push($gelenyanMalzeme,$item);
}
foreach ($miktar_tur as $item){
    array_push($gelenmiktarTur,$item);
}
array_push($toplu,$gelen_Malzeme);
array_push($toplu,$gelenyanMalzeme);
array_push($toplu,$gelenmiktarTur);
$gidenMalzeme = json_encode($gelen_Malzeme);
$gidenToplu=json_encode($toplu);


?>
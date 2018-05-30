<?php

include 'fun.php';
include 'database.php';
if (isset($_POST)) {
    $gelenToplu = $_POST['a'];
    $gelenAnaMalzemeler = $gelenToplu[0];
    $gelenYanMalzemeler = $gelenToplu[1];
    $yemeklerArray = array();
    $genel = array();
    $yemekler = $db->query("SELECT * FROM yemekler", $pdo);
    $malzemeler = $db->query("SELECT * FROM malzemeler", $pdo);
    $yanmalzemeler = $db->query("SELECT * FROM yan_malzemeler", $pdo);
    $malzemesayisi = $malzemeler->rowCount();
    $yan_malzemesayisi = $yanmalzemeler->rowCount();
    $yemeklerdizi = array();
    $onerilenyemek = array();
    $a = 0;
    foreach ($yemekler as $rows) {
        $gidenYanMalzeme = array();
        $sayac = 0;
        $sayac2 = 0;
        $yemek_id = $db->query("SELECT * FROM yemek_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
        foreach ($yemek_id as $row) {
            $sayac++;//yemekteki malzeme sayısı

            for ($k = 0; $k <= $malzemesayisi + 1; $k++) {
                if (isset($gelenAnaMalzemeler[$k])) {
                    if ($gelenAnaMalzemeler[$k][2] == $row["malzeme_id"]) {
                        $sayac2++;//secilen malzeme sayısı
                    }
                }
            }
        }
        if ($sayac == $sayac2) {
            $malzemelerArray = array();

            $yemek_id2 = $db->query("SELECT * FROM yemek_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
            $yan_malzeme = $db->query("SELECT * FROM yemek_yan_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
            foreach ($yemek_id2 as $key) {
                $miktarim = $db->query("SELECT * FROM miktar_tur WHERE id=" . $key["miktar_tur_id"] . " ", $pdo)->fetch();
                $malzemem = $db->query("SELECT * FROM malzemeler WHERE id=" . $key["malzeme_id"] . " ", $pdo)->fetch();


                for ($f = 0; $f < count($gelenAnaMalzemeler); $f++) {
                    if ($gelenAnaMalzemeler[$f][2] == $key["malzeme_id"]) {
                        $gelenMiktarTur = $gelenAnaMalzemeler[$f][1];
                        $gelenMiktarim = $gelenAnaMalzemeler[$f][0];
                        $miktarN = $key["miktar"];
                        $miktarTI = $key["miktar_tur_id"];
                        settype($miktarN, "integer");
                        settype($miktarTI, "integer");
                        settype($gelenMiktarTur, "integer");
                        settype($gelenMiktarim, "float");

                        $giden = ['miktarid' => $miktarim["id"], 'malzemeid' => $malzemem["id"]];
                        $gidenAs = [$key["miktar"], $miktarim["isim"], $malzemem["isim"]];
                        $gidenGG = [(string)gramC($miktarTI, (string)gelenturC($gelenMiktarTur, $gelenMiktarim)), $miktarim["isim"], $malzemem["isim"]];
                        $uygunluk = (string)cevirmen($gelenMiktarTur, $gelenMiktarim, $miktarTI, $miktarN);
                        array_push($malzemelerArray, ['asMalzeme' => $gidenAs, 'secMalzeme' => $gidenGG, 'uygunluk' => $uygunluk, 'kd' => $giden]);
                    }
                }


            }

            $yan_malzeme = $db->query("SELECT * FROM yemek_yan_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
            foreach ($yan_malzeme as $key) {
                $yM_miktar = $db->query("SELECT * FROM miktar_tur WHERE id=" . $key["miktar_tur_id"] . " ", $pdo)->fetch();
                $yan_malzemem = $db->query("SELECT * FROM yan_malzemeler WHERE id=" . $key["malzeme_id"] . " ", $pdo)->fetch();
                $yemeklerdizi[] = $key["malzeme_id"];
                for ($k = 0; $k < $yan_malzemesayisi; $k++) {
                    if (isset($gelenYanMalzemeler[$k])) {
                        if ($gelenYanMalzemeler[$k] == $key["malzeme_id"]) {
                            if (in_array($key["malzeme_id"], $yemeklerdizi)) {
                                $a++;
                            }
                        }
                    }
                }

                if ($gelenYanMalzemeler[0] != "-1") {

                    if ($a == 0) {
                        array_push($gidenYanMalzeme, [$key["miktar"], $yM_miktar["isim"], $yan_malzemem["isim"], 0]);
                    } else {
                        array_push($gidenYanMalzeme, [$key["miktar"], $yM_miktar["isim"], $yan_malzemem["isim"], 1]);
                    }
                } else {
                    array_push($gidenYanMalzeme, [$key["miktar"], $yM_miktar["isim"], $yan_malzemem["isim"], 0]);
                }
                unset($yemeklerdizi[0]);
                $yemeklerdizi = array_values($yemeklerdizi);
                $a = 0;
            }
            array_push($yemeklerArray, ['isim' => $rows["isim"],'id'=>$rows['id'], 'malzeme' => $malzemelerArray, 'tarif' => $rows["tarif"], 'yan' => $gidenYanMalzeme]);


        } else if ($sayac == $sayac2 + 1) {

            $malzemelerArray = array();

            $yemek_id2 = $db->query("SELECT * FROM yemek_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
            $yan_malzeme = $db->query("SELECT * FROM yemek_yan_malzeme WHERE yemek_id=" . $rows["id"] . " ", $pdo);
            foreach ($yemek_id2 as $key) {
                $miktarim = $db->query("SELECT * FROM miktar_tur WHERE id=" . $key["miktar_tur_id"] . " ", $pdo)->fetch();
                $malzemem = $db->query("SELECT * FROM malzemeler WHERE id=" . $key["malzeme_id"] . " ", $pdo)->fetch();


                for ($f = 0; $f < count($gelenAnaMalzemeler); $f++) {
                    if ($gelenAnaMalzemeler[$f][2] == $key["malzeme_id"]) {
                        $gelenMiktarTur = $gelenAnaMalzemeler[$f][1];
                        $gelenMiktarim = $gelenAnaMalzemeler[$f][0];
                        $miktarN = $key["miktar"];
                        $miktarTI = $key["miktar_tur_id"];
                        settype($miktarN, "integer");
                        settype($miktarTI, "integer");
                        settype($gelenMiktarTur, "integer");
                        settype($gelenMiktarim, "float");

                        $giden = ['miktarid' => $miktarim["id"], 'malzemeid' => $malzemem["id"]];
                        $gidenAs = [$key["miktar"], $miktarim["isim"], $malzemem["isim"]];
                        $gidenGG = [(string)gramC($miktarTI, (string)gelenturC($gelenMiktarTur, $gelenMiktarim)), $miktarim["isim"], $malzemem["isim"]];
                        $uygunluk = (string)cevirmen($gelenMiktarTur, $gelenMiktarim, $miktarTI, $miktarN);
                        array_push($malzemelerArray, ['asMalzeme' => $gidenAs, 'secMalzeme' => $gidenGG, 'uygunluk' => $uygunluk, 'kd' => $giden]);
                    }
                }


            }
            foreach ($yan_malzeme as $key) {
                $yM_miktar = $db->query("SELECT * FROM miktar_tur WHERE id=" . $key["miktar_tur_id"] . " ", $pdo)->fetch();
                $yan_malzemem = $db->query("SELECT * FROM yan_malzemeler WHERE id=" . $key["malzeme_id"] . " ", $pdo)->fetch();
                $yemeklerdizi[] = $key["malzeme_id"];
                for ($k = 0; $k < $yan_malzemesayisi; $k++) {
                    if (isset($gelenYanMalzemeler[$k])) {
                        if ($gelenYanMalzemeler[$k] == $key["malzeme_id"]) {
                            if (in_array($key["malzeme_id"], $yemeklerdizi)) {
                                $a++;
                            }
                        }
                    }
                }

                if ($a == 0) {
                    array_push($gidenYanMalzeme, [$key["miktar"], $yM_miktar["isim"], $yan_malzemem["isim"], 0]);
                } else {
                    array_push($gidenYanMalzeme, [$key["miktar"], $yM_miktar["isim"], $yan_malzemem["isim"], 1]);
                }
                unset($yemeklerdizi[0]);
                $yemeklerdizi = array_values($yemeklerdizi);
                $a = 0;
            }
            array_push($onerilenyemek, ['isim' => $rows["isim"],'id'=>$rows['id'], 'malzeme' => $malzemelerArray, 'tarif' => $rows["tarif"], 'yan' => $gidenYanMalzeme]);

        }
    }

    if (count($yemeklerArray) > 0 || count($onerilenyemek) > 0) {
        $genel['onerilen'] = $onerilenyemek;
        $genel['yapilan'] = $yemeklerArray;
        echo json_encode($genel);

    } else {
        echo json_encode("false");
    }

} else {
    echo json_encode("error");
}

?>


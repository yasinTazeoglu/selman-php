<?php
function cevirmen($gelenTur,$gelenMiktar,$dbTur,$dbMiktar){
  if (($dbTur!=7&&$dbTur!=12)&&($gelenTur!=7&&$gelenTur!=12)) {
  return  hesap($gelenTur,$gelenMiktar,$dbTur,$dbMiktar);
  }elseif($dbTur==7&&$gelenTur==7){
  return  hesap($gelenTur,$gelenMiktar,$dbTur,$dbMiktar);
  }elseif ($dbTur==12&&$gelenTur==12) {
  return  hesap($gelenTur,$gelenMiktar,$dbTur,$dbMiktar);
  }else {
    return -1;
  }




}
function hesap($gelenTur,$gelenMiktar,$dbTur,$dbMiktar){
  $kGelen=gelenturC($gelenTur,$gelenMiktar);
  $dbGelen=gelenturC($dbTur,$dbMiktar);
  if ($kGelen>=$dbGelen*0.85) {
    return 1;
  }elseif ($kGelen>=$dbGelen*0.7) {
    return 2;
  }elseif ($kGelen>=$dbGelen*0.55) {
    return 3;
  }elseif ($kGelen>=$dbGelen*0.45) {
    return 4;
  }else{
    return 5;
  }
}
function gelenturC($gelenTur,$gelenMiktar){
  $gram=-1;
  switch ($gelenTur) {
    case 1:
    case 10:
    case 13:
      $gram=200*$gelenMiktar;
      break;
    case 2:
        $gram=100*$gelenMiktar;
      break;
    case 3:
          $gram=10*$gelenMiktar;
      break;
    case 4:
          $gram=3*$gelenMiktar;
      break;
    case 5:
            $gram=5*$gelenMiktar;
      break;
    case 6:
    case 8:
        $gram=1000*$gelenMiktar;
      break;
      case 9:
            $gram=$gelenMiktar;
        break;
      case 11:
              $gram=75*$gelenMiktar;
        break;
  }
  return $gram;
}
function yazi($gelenTur,$gelenMiktar,$dbTur,$dbMiktar){
  switch (cevirmen($gelenTur,$gelenMiktar,$dbTur,$dbMiktar)) {
    case 1:
    return "malzeme yeterli";
    break;
    case 2:
    return "malzeme az ama yemege etki etmez";
    break;
    case 3:
    return "malzeme az ve yemege etki edebilir";
    break;
    case 4:
    return "malzemenin yarisi var";
    break;
    case 5:
    return "bu malzeme bu yemek icin yeterli degil";
    break;
    case -1:
    return "bu türler birbirini desteklemiyor";
    break;
  }
}
function gramC($gelenTur,$gelenMiktar){
  $gram=-1;
  switch ($gelenTur) {
    case 1:
    case 10:
    case 13:
      $gram=$gelenMiktar/200;
      break;
    case 2:
        $gram=$gelenMiktar/100;
      break;
    case 3:
          $gram=$gelenMiktar/10;
      break;
    case 4:
          $gram=$gelenMiktar/3;
      break;
    case 5:
            $gram=$gelenMiktar/5;
      break;
    case 6:
    case 8:
        $gram=$gelenMiktar/1000;
      break;
      case 7:
      case 9:
      case 12:
            $gram=$gelenMiktar;
        break;
      case 11:
              $gram=$gelenMiktar/75;
        break;
  }
  return $gram;
}
 ?>

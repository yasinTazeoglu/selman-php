<?php
if (isset($_POST)){
    $usr="yasin";
    $psw="12345";
    $login=$_POST["a"];
    $user=$login[0];
    $password=$login[1];
    if ($user==$usr&&$password==$psw){
        session_start();
        $_SESSION["user"]=true;
        echo json_encode(1);
    }else{
        echo json_encode(0);
    }
}
?>
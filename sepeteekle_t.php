<?php
    ob_start();
    session_start();
    include("baglanti.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
﻿<?php 
    $urunid=$_GET['id'];
    if(isset($_SESSION['giris'])){
        $kullanici=$_SESSION['kullanici_adi'];

        $yaz=mysql_fetch_array(mysql_query("select * from topraklar where t_kayit_no='$urunid'"));
        $sondurum=$yaz['stok']-1;
        $urunad=$yaz['t_isim'];
        $fiyat=$yaz['t_ucret'];
        echo $sondurum;
        mysql_query("Update topraklar set stok='$sondurum' where t_kayit_no='$urunid'");
        //bu alana kadar stok sayısını düşürdük.
        mysql_query("Insert into siparisler (kullanici_adi,urun_adi,sip_ucret)values('$kullanici','$urunad','$fiyat')");
        header("Location:topraklar.php");
    }
    else{
            echo "Oturum açmadınız";
            header("Refresh: 3; url= topraklar.php");
            
    }
?>
</body>
</html>

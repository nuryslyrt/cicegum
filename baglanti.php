<?php

    $sunucu = "localhost"; //sunucu
    $kullanici = "root"; //veritabani kullanici adi
    $parola = ""; // veritabani sifresi
    $veritabani = "cicegum";// veritabani ismi 
    $baglanti = mysql_connect($sunucu, $kullanici, $parola); 

    if(!$baglanti) die("MySQL sunucusuna baglanti saglanamadi!"); 

    mysql_select_db($veritabani, $baglanti) or die ("Veritabanina baglanti saglanamadi!");
?>
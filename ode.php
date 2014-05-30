<?php

    include("baglanti.php");

    $al=$_GET['sepetid'];
    mysql_query("Update siparisler set durum='1' where sip_kayit_no='$al'");
    header("Location:sepet.php");
?>
<?php

    session_start();
    ob_start();

    include("baglanti.php");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

    $kullanici_adi = $_POST["kullanici_adi"];
    $parola = md5($_POST["parola"]);
    //var_dump($parola);
   
    $sorgula = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi' and sifre='$parola'") or die (mysql_error());
    //var_dump("SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi' and sifre='$parola'");
    //exit;
    //and sifre='{$parola}'
    //$verit_sifre = mysql_fetch_assoc($sorgula);
    $uye_varmi = mysql_num_rows($sorgula);
    if($uye_varmi > 0)
    {
        $_SESSION["giris"] = "true";
        $_SESSION["kullanici_adi"] = $kullanici_adi;
        $_SESSION["parola"] = $parola;
        //echo $_SESSION["sifre"];
        
       // $sorgu2 = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'") or die(mysql_error());
        $uyemiz = mysql_fetch_array($sorgula);
        setcookie("kullanici_adi",$kullanici_adi,time()+60*60*24);
        setcookie("parola",$parola,time()+60*60*24);
        //if($parola == $verit_sifre['sifre'] ) {
            if($uyemiz['yetki'] == "1"){
                $_SESSION["yetki"] = "true";
                echo str_repeat("<br>", 8)."<center><img src=images/yukleniyor.gif border=0 /> Admin Paneline yöndiriliyorsunuz, lütfen bekleyiniz..</center>";	
                header("Refresh: 2; url= admin.php");
                return;
            }else{
                echo str_repeat("<br>", 8)."<center><img src=images/yukleniyor.gif border=0 /> Giriş başarılı, lütfen bekleyiniz..</center>";
                header("Refresh: 2; url=index.php");
           }

      //}
        
    }else{

        echo str_repeat("<br>", 8)."<center><img src=images/hata.gif border=0 /> Kullanıcı adı veya parola hatalı!</center>";
        header("Refresh: 2; url=login.php");

    }
    
    mysql_close();
    ob_end_flush();
    
?>
</body>
</html>
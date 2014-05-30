<?php
    ob_start();
    session_start();
    include("baglanti.php");
?>
<?php
// sayfaya erişim yapan kişinin admin yetkisini kontrol ediyoruz
    if(!isset($_SESSION["yetki"]))
    {
        echo str_repeat("<br>", 8)."<center><img src=images/hata.gif border=0 /> Yönetim Paneli Sadece yetkili kullanıcılara açıktır!</center>";
        header("Refresh: 2; url= index.php");
        return;
    }



    $sql = "select * from uyeler Order By uye_no";

    $sorgula = mysql_query($sql, $baglanti) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name = "" method = "post" action = "admin_islem.php?id = <?php echo $uyeler['uye_no']; ?> ">
<table align="center" width="800" border="0" cellspacing="2" cellpadding="2">
  <tr>
      <td height="62" colspan="2"><img src="images/uye.png" width="32" height="32" /><b> Yönetici:</b> <a href="logout.php">Çıkış</a></td>
    </tr>
 <tr>
    <td><b><u>Üye No</u></b></td>
    <td><b><u>Kullanıcı Adı</u></b></td>
    <td><b><u>Parola</u></b></td>
    <td><b><u>E-Posta</u></b></td>
    <td><b><u>Yetki</u></b></td>
  </tr>
<?php while ($uyeler = mysql_fetch_array($sorgula)){ ?>
 <tr>
    <td><?php echo $uyeler['uye_no']; ?></td>
    <td><?php echo $uyeler['kullanici_adi']; ?></td>
    <td><?php echo $uyeler['sifre']; ?></td>
    <td><?php echo $uyeler['email']; ?></td>
    <td><?php if($uyeler['yetki'] =="0")
	echo "Üye";
	elseif($uyeler['yetki'] =="1")
	echo "Admin";
	?></td>
    <td><a href="admin_islem.php?islem=duzenle&id=<?php echo $uyeler['uye_no']; ?>">Düzenle</a></td>
    <td><a href="admin_islem.php?islem=sil&id=<?php echo $uyeler['uye_no']; ?>">Sil</a></td>
  </tr>
<?php } ?>

</table>
</form>
</body>
</html>

<?php 
mysql_close();
ob_end_flush();	
?>
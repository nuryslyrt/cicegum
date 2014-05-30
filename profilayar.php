<?php
        session_start();
        ob_start();
        include("baglanti.php");
        include("inc/header.php");
?>
<?php
    if(!($_SESSION['giris']))
    { //Kullanıcının session ı yoksa bu sayfaya giremesin. Ve index.php sayfasına yönlendirilsin.
            header("Location:index.php");
    }
    $adcek=$_SESSION['kullanici_adi']; //Sessiondaki adı değişkene atadık.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profil ayarları</title>
</head>
<?php 
    $sorgucuk=mysql_query("Select * from uyeler where kullanici_adi='$adcek'"); //textboxların valuesına eski profil bilgilerini çekmek için sorgu oluşturduk.
    while($yaz=mysql_fetch_array($sorgucuk)){ 
?>
<body>
<table border="1" width="80%" style="margin-left:auto; margin-right:auto;">
<tr>
<?php 
$tarih=date("d.m.Y");
if(@$_SESSION['giris']){
	//eğer üye girişi yapılmışsa bu linkler gözükecek
	$kad=$_SESSION['kullanici_adi'];
	$verial=mysql_query("Select Count(*) AS DF from siparisler where durum='0' and kullanici_adi='$kad'");
	$adet =mysql_result( $verial , 0, 'DF') ;
	echo "<td><a href='sepet.php'>Sepetinizde ".$adet." adet ürün bulunmaktadır.</a></td>";
}
else{
	//eğer kullanıcı girişi yapmadıysa bu linkler gözükecek.
	echo "<td><a href='login.php'>Üye Giriş</a></td><td>".$tarih."</td>";
}
?>
</tr>
<tr>
    <td colspan="4">
    <form method="post" action="profilayar.php">
    <center><table border="1">
        <tr>
            <td>Ad</td>
            <td><input type="text" readonly  value="<?php echo $yaz['isim'] ?>" name="txt1" /></td>
        </tr>
            
        <tr>
            <td>Soyad</td>
            <td><input type="text" readonly   value="<?php echo $yaz['soyisim'] ?>" name="txt2" /></td>
        </tr>
            
        <tr>
            <td>Kullanıcı Adı</td>
            <td><input type="text" readonly   value="<?php echo $yaz['kullanici_adi'] ?>" name="txt3" /></td>
        </tr>
            
        <tr>
            <td>Mail</td>
            <td><input type="email" required value="<?php echo $yaz['email'] ?>" name="txt4" /></td>
        </tr>
            
        <tr>
            <td>Parola</td>
            <td><input type="password" name="txt5" /></td>
        </tr>
            
        <tr>
            <td>Parola Tekrar</td>
            <td><input type="password" required  name="txt6" /></td>
        </tr>
            
        <tr>
            <td>Telefon</td>
            <td><input type="text" required value="<?php echo $yaz['telf'] ?>" name="txt7" /></td>
        </tr>
            
        <tr>
            <td>Adres</td>
            <td><textarea type="text" name="txt8"><?php echo $yaz['adres'] ?></textarea></td>
        </tr>
            
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" value="Güncelle" /></td>
        </tr>
      </table>
    </td>
    </tr>
<tr>
    <td colspan="4" align="center"><b>Tüm Hakları Saklıdır 2013</b></td>
</tr>
</table>
</center>
</form>
        
<?php 

    }
    @$btn=$_POST['btn'];
    if($btn){
            //Formdan verileri al ve php de değişkenlere tanımla
            $ad=$_POST['txt1'];
            $soyad=$_POST['txt2'];
            $kad = $_POST['txt3'];
            $mail=$_POST['txt4'];
            $parola=$_POST['txt5'];
            $parola2=$_POST['txt6'];
            $tel=$_POST['txt7'];
            $adres = $_POST['txt8'];



            $sorgu2=mysql_query("select uye_no from uyeler where kullanici_adi='$adcek'");// $adcek deki ad ile eşit olan kayıtın idsini aldık.
            $id =mysql_result( $sorgu2 , 0, 'uye_no');// O id yi mysql_result ile çektik ve $id ye atadık.

            if($parola == $parola2){
                    //Parola ile parola kontroldeki parolalar uyuşuyorsa işleme devam et
                    mysql_query("Update uyeler SET isim='$ad', soyisim='$soyad', kullanici_adi='$kad', email='$mail', sifre='$parola', telf='$tel', adres='$adres' where uye_no='$id'") or die("Veriler güncellenemedi".mysql_error());
                    //Veritabanındaki üyenin verileri güncellendi. Verileri ID ye göre güncelledik çünkü aynı ada sahip başka kullanıcı olabilir. Eğer güncellenemezse hata oluşturacak ve işlem devam etmeyecek.
                    //session_destroy();
                    $_SESSION['kullanici_adi']= $kad;
                    header("Location:profilayar.php");

            }
            else{
                    echo "Parolalar uyuşmuyor";
            }
    }
?>
</body>
</html>
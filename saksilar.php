<?php
    ob_start();
    session_start();
    include('baglanti.php');
    include('inc/header.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Saksılar</title>
</head>
<body>
<table border="1" width="80%" style="margin-left:auto; margin-right:auto;">
<tr>
<?php 
if(@$_SESSION['giris']){
	//eğer üye girişi yapılmışsa bu linkler gözükecek
	$kullanici_adi=$_SESSION['kullanici_adi'];
	$verial=mysql_query("Select Count(*) AS DF from siparisler where durum='0' and kullanici_adi='$kullanici_adi'");
	$adet =mysql_result( $verial , 0, 'DF') ;
	echo "<td><a href='profilayar.php'>Profil</a></td><td><a href='sepet.php'>Sepetinizde ".$adet." adet ürün bulunmaktadır.</a></td>";
}
else{
	//eğer kullanıcı girişi yapmadıysa bu linkler gözükecek.
	echo "<td><a href='signup.php'>Üye Ol</a></td>";
}
?>
</tr>
<tr><td colspan="2">
<?php
    $sorgu = mysql_query("select * from saksilar");
    while($yaz = mysql_fetch_array($sorgu)){
 ?>
 <table border="1" height="60" width="500">
<tr>
    <td rowspan="2" width="50"><img src="<?php echo $yaz['foto'] ?>" width="50" height="50" /></td>
    <td><?php echo $yaz['sak_isim'] ?></td>
    <td>Fiyat:<?php echo $yaz['sak_ucret'] ?></td>
    <td>Stok Adedi:<?php echo $yaz['stok'] ?></td>
</tr>

<tr>
    <td>Saksının Eni:<?php echo $yaz['en'] ?></td>
    <td>Saksının Boyu:<?php echo $yaz['boy'] ?></td>
    <td colspan="3"></td>
</tr>

<tr>
    <td><?php echo $yaz['hakkinda'] ?></td>
    <td colspan="3"><a href="sepeteekle_s.php?id=<?php echo $yaz['sak_kayit_no'] ?>">Sepete ekle</a></td>
</tr>

</table>
<?php 
    } 
?>
    </td>
</tr>
<tr>
    <td colspan="4" align="center"><b>Tüm Hakları Saklıdır.</b></td></tr>
</table>
</body>
</html>
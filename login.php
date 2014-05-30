
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Giriş Sayfası</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><a href="index.php">Anasayfa</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<form name="giris_form" method="post" action="denetim.php">
<table width="300" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td>&nbsp;</td>
    <td class="giris_td"><img src="images/keys.gif" width="81" height="89" /></td>
  </tr>
  <tr>
    <td>Kullanıcı adı:</td>
    <td><input type="text" name="kullanici_adi" /></td>
  </tr>
  <tr>
    <td>Şifre:</td>
    <td><input type="password" name="parola" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="gonder" value="Giriş Yap" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="signup.php">Üye Ol</a></td>
  </tr>
  </table>
</form>
</body>
</html>
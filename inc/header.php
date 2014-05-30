
 <?php
     ob_start();
     //session_start();
  ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="container">
        <div id="header">
            <center><li><b><a href="hakkinda.php">Biz Kimiz ?</a></b></li>                  
                <li><b><a href="iletisim.php">İletişim</a></b></li></center>
        </div>
        <div id="left">
            <ul>
                   
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="cicekler.php">Çiçekler</a></li>
                <li><a href="topraklar.php">Topraklar</a></li>
                <li><a href="saksilar.php">Saksılar</a></li>
                <?php
                    if(!isset($_SESSION["giris"])){
                        ?>
                        <li><a href="login.php">Giriş Yap</a></li>
                        <li><a href="signup.php">Üye Ol</a></li>
                        
                    <?php
                    }  else {
                       ?>
                        <li><a href="logout.php">Çıkış Yap</a></li> 
                        <?php
                        $_SESSION['giris']="true";
                        ?>
                        <li><a href="profilayar.php">Profil</a></li>
                    <?php
                        }
                    
                    ?>
            </ul>
            
        </div>
        <div id="body">
        
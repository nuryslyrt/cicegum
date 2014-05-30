<?php

    ob_start();
    session_start();
    session_destroy();
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

    setcookie ("kullanici_adi", "", time() - 3600);
    setcookie ("parola", "", time() - 3600);

    echo str_repeat("<br>", 8)."<center><img src=images/yukleniyor.gif border=0 /> Çıkış işlemi tamamlandı, lütfen bekleyiniz..</center>";
    header("Refresh: 2; url=index.php");
    
    ob_end_flush();
    
?>

</body>
</html>
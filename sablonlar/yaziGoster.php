<center><p><a class="linkRengi" href=".">Anasayfa</a><a class="linkRengi" href="./index.php?aksiyon=arsiv">Yazi Arsivi</a><a class="linkRengi" href="admin.php">Admin</a></p>
</center>
<?php include "sablonlar/cek/ust.php" ?>

<h1 style="width: 75%;"><?php echo htmlspecialchars($sonuclar['yazi']->baslik) ?></h1>
<div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars($sonuclar['yazi']->ozet) ?></div><hr size=1 width="100%">
<div style="width: 75%;"><br><?php echo $sonuclar['yazi']->icerik ?></div>
<p class="pubDate">Yayinlanma Tarihi <?php echo date('j F Y', $sonuclar['yazi']->yayinTarihi) ?></p>

<div style="width: 75%; font-style: bold;">Kategori: <?php echo $sonuclar['yazi']->kategori ?></div>




<?php include "sablonlar/cek/alt.php" ?>


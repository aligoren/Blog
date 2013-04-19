<?php include "sablonlar/cek/ust.php" ?>

<div id="adminHeader">
    <h2>Ali GOREN | Yazi Duzenle</h2>
    <p>Merhaba <b><?php echo htmlspecialchars($_SESSION['kulladi']) ?></b>. <a class="altBolum" href="admin.php?aksiyon=cik"?>Cikis yap</a></p>
</div>

<h1><?php echo $sonuclar['sayfaBasligi'] ?></h1>

<form action="admin.php?aksiyon=<?php echo $sonuclar['formAksiyon'] ?>" method="post">
    <input type="hidden" name="yaziId" value="<?php echo $sonuclar['yazi']->id ?>"/>

    <?php if (isset($sonuclar['hataMesaji'])) { ?>
        <div class="hataMesaji"><?php echo $sonuclar['hataMesaji'] ?></div>
    <?php } ?>

    <ul>

        <li>
            <label for="baslik">Yazi Basligi</label>
            <input type="text" name="baslik" id="baslik" placeholder="Yazi adi" required autofocus maxlength="255" value="<?php echo htmlspecialchars($sonuclar['yazi']->baslik) ?>" />
        </li>

        <li>
            <label for="ozet">Yazi Ozeti</label>
            <textarea name="ozet" id="ozet" placeholder="Yaziniz hakkinda on tanitim" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars($sonuclar['yazi']->ozet) ?></textarea>
        </li>

        <li>
            <label for="icerik">Yazi Metni</label>
            <textarea name="icerik" id="icerik" placeholder="HTML Kodlarini yaziniz icerisinde kullanabilirsiniz" required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars($sonuclar['yazi']->icerik) ?></textarea>
        </li>
		<li>
            <label for="Kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" placeholder="Kategori" required maxlength="1000" value="<?php echo htmlspecialchars($sonuclar['yazi']->kategori) ?>" />
        </li>
        <li>
            <label for="yayinTarihi">Yayin Tarihi</label>
            <input type="date" name="yayinTarihi" id="yayinTarihi" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $sonuclar['yazi']->yayinTarihi ? date("Y-m-d", $sonuclar['yazi']->yayinTarihi) : "" ?>" />
        </li>


    </ul>

    <div class="buttons">
        <input type="submit" name="degisKaydet" value="Degisiklikleri Kaydet" />
        <input type="submit" formnovalidate name="iptal" value="Iptal et" />
    <?php if ($sonuclar['yazi']->id) { ?>
		<p><a class="linkRengi" href="admin.php?aksiyon=yaziSil&amp;yaziId=<?php echo $sonuclar['yazi']->id ?>" onclick="return confirm('Yaziyi silmek istiyor musunuz?')">Yaziyi Sil</a></p>
	<?php } ?>
	
	</div>
</form>


<center><?php include "sablonlar/cek/alt.php" ?>
</center>

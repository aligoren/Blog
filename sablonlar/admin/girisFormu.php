<?php include "sablonlar/cek/ust.php" ?>

<form action="admin.php?aksiyon=gir" method="post" style="width: 50%;">
    <input type="hidden" name="gir" value="true" />

    <?php if (isset($sonuclar['hataMesaji'])) { ?>
        <div class="hataMesaji"><?php echo $sonuclar['hataMesaji'] ?></div>
    <?php } ?>

    <ul>

        <li>
            <label for="kulladi">Kullanici adi</label>
            <input type="text" name="kulladi" id="kulladi" placeholder="Admin kullanici adi" required autofocus maxlength="20" />
        </li>

        <li>
            <label for="sifre">Sifre</label>
            <input type="password" name="sifre" id="sifre" placeholder="Admin sifresi" required maxlength="20" />
        </li>

    </ul>

    <div class="buttons">
        <input type="submit" name="gir" value="Giris" />
    </div>

</form>

<?php include "sablonlar/cek/alt.php" ?>


<?php

ini_set("display_errors", true);
date_default_timezone_set("Europe/Istanbul");
define("DB_DSN", "mysql:host=localhost;dbname=ali"); // vt bilgileri
define("DB_ADI", "root"); // vt kullanici adi
define("DB_SIFRESI", ""); // vt sifre
define("SINIF_KLASOR", "siniflar"); // siniflarinizin oldugu klasor
define("TEMA_KLASOR", "sablonlar"); // sablonlar alt, ust gibi dosyalarin yazi eklenin bulundugu noktalar
define("ANASAYFA_YAZI_SAY", 5); // anasayfada kac yazi gosterilecek?
define("SITE_BASLIK", "Ali GOREN"); // site basliginiz burada
define("SITE_BASLIK_LINK", "<a class='altBolum' href='.'>Ali GOREN</a>"); // burada site linki var ama asagidaki fonksiyon daha iyi
define("ADMIN_ADI", "admin"); //admin kullanici adi
define("ADMIN_SIFRESI", "sifrem"); // admin sifre
require( SINIF_KLASOR . "/Yazi.php" );
function siteBaslik()
{

	echo'<center><h1><a class="altBolum" href=".">Ali GOREN</a></h1></center>';

}

?>

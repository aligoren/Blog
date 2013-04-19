<?php
require( 'ayar.php' );
session_start();
$aksiyon = isset($_GET['aksiyon']) ? $_GET['aksiyon'] : "";
$kulladi = isset($_SESSION['kulladi']) ? $_SESSION['kulladi'] : "";

if ($aksiyon != "gir" && $aksiyon != "cik" && !$kulladi) {
    gir();
    exit;
}

switch ($aksiyon) {
    case 'gir':
        gir();
        break;
    case 'cik':
        cik();
        break;
    case 'yeniYazi':
        yeniYazi();
        break;
    case 'yaziDuzenle':
        yaziDuzenle();
        break;
    case 'yaziSil':
        yaziSil();
        break;
    default:
        yazilariListele();
}

function gir() {

    $sonuclar = array();
    $sonuclar['sayfaBasligi'] = "Yonetim Sayfasi" ." | " . SITE_BASLIK;

    if (isset($_POST['gir'])) {



        if ($_POST['kulladi'] == ADMIN_ADI && $_POST['sifre'] == ADMIN_SIFRESI) {


            $_SESSION['kulladi'] = ADMIN_ADI;
            header("Location: admin.php");
        } else {


            $sonuclar['hataMesaji'] = "Sifreniz ya da kullanici adiniz yanlis. Lutfen tekrar deneyiniz..";
            require( TEMA_KLASOR . "/admin/girisFormu.php" );
        }
    } else {


        require( TEMA_KLASOR . "/admin/girisFormu.php" );
    }
}

function cik() {
    unset($_SESSION['kulladi']);
    header("Location: admin.php");
}


function yeniYazi() {

    $sonuclar = array();
    $sonuclar['sayfaBasligi'] = "Yeni Yazi";
    $sonuclar['formAksiyon'] = "yeniYazi";

    if (isset($_POST['degisKaydet'])) {


        $yazi = new Yazi;
        $yazi->formDegerleri($_POST);
        $yazi->ekle();
        header("Location: admin.php?durum=degisKaydet");
    } elseif (isset($_POST['iptal'])) {


        header("Location: admin.php");
    } else {


        $sonuclar['yazi'] = new Yazi;
        require( TEMA_KLASOR . "/admin/yaziDuzenle.php" );
    }
}

function yaziDuzenle() {

    $sonuclar = array();
    $sonuclar['sayfaBasligi'] = "Yazi Duzenle";
    $sonuclar['formAksiyon'] = "yaziDuzenle";

    if (isset($_POST['degisKaydet'])) {



        if (!$yazi = Yazi::idGetir((int) $_POST['yaziId'])) {
            header("Location: admin.php?hata=yaziBulunamadi");
            return;
        }

        $yazi->formDegerleri($_POST);
        $yazi->guncelle();
        header("Location: admin.php?durum=degisKaydet");
    } elseif (isset($_POST['iptal'])) {


        header("Location: admin.php");
    } else {


        $sonuclar['yazi'] = Yazi::idGetir((int) $_GET['yaziId']);
        require( TEMA_KLASOR . "/admin/yaziDuzenle.php" );
    }
}

function yaziSil() {

    if (!$yazi = Yazi::idGetir((int) $_GET['yaziId'])) {
        header("Location: admin.php?hata=yaziBulunamadi");
        return;
    }

    $yazi->sil();
    header("Location: admin.php?durum=yaziSilindi");
}

function yazilariListele() {
    $sonuclar = array();
    $veri = Yazi::listeGetir();
    $sonuclar['yazilar'] = $veri['sonuclar'];
    $sonuclar['toplamSatir'] = $veri['toplamSatir'];
    $sonuclar['sayfaBasligi'] = "Tum Yazilar";

    if (isset($_GET['hata'])) {
        if ($_GET['hata'] == "yaziBulunamadi")
            $sonuclar['hataMesaji'] = "HATA: Yazi Bulunamadi.";
    }

    if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "degisKaydet")
            $sonuclar['durumMesaji'] = "Yaptiginiz degisiklikler kaydedildi.";
        if ($_GET['durum'] == "yaziSilindi")
            $sonuclar['durumMesaji'] = "Yazi Silindi.";
    }

    require( TEMA_KLASOR . "/admin/yazilariListele.php" );
}

?>

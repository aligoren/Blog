<?php

class Yazi {

    public $id = null;
    public $yayinTarihi = null;
    public $baslik = null;
    public $ozet = null;
    public $icerik = null;
	public $kategori = null;

    public function __construct($veri = array()) {
        if (isset($veri['id']))
            $this->id = (int) $veri['id'];
        if (isset($veri['yayinTarihi']))
            $this->yayinTarihi = (int) $veri['yayinTarihi'];
        if (isset($veri['baslik']))
            $this->baslik = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $veri['baslik']);
        if (isset($veri['ozet']))
            $this->ozet = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $veri['ozet']);
        if (isset($veri['icerik']))
            $this->icerik = $veri['icerik'];
		if (isset($veri['kategori']))
            $this->kategori = $veri['kategori'];
    }

    public function formDegerleri($params) {

        $this->__construct($params);

        if (isset($params['yayinTarihi'])) {
            $yayinTarihi = explode('-', $params['yayinTarihi']);

            if (count($yayinTarihi) == 3) {
                list ( $y, $m, $d ) = $yayinTarihi;
                $this->yayinTarihi = mktime(0, 0, 0, $m, $d, $y);
            }
        }
    }

    public static function idGetir($id) {
        $conn = new PDO(DB_DSN, DB_ADI, DB_SIFRESI);
        $sql = "SELECT *, UNIX_TIMESTAMP(yayinTarihi) AS yayinTarihi FROM yazilar WHERE id = :id";
        $st = $conn->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row)
            return new Yazi($row);
    }

    public static function listeGetir($numRows = 1000000, $order = "yayinTarihi DESC") {
        $conn = new PDO(DB_DSN, DB_ADI, DB_SIFRESI);
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(yayinTarihi) AS yayinTarihi FROM yazilar
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

        $st = $conn->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->execute();
        $list = array();

        while ($row = $st->fetch()) {
            $yazi = new Yazi($row);
            $list[] = $yazi;
        }

        $sql = "SELECT FOUND_ROWS() AS toplamSatir";
        $totalRows = $conn->query($sql)->fetch();
        $conn = null;
        return ( array("sonuclar" => $list, "toplamSatir" => @$toplamSatir[0]) );
    }

    public function ekle() {

        if (!is_null($this->id))
            trigger_error("HATA NO: 12 (to $this->id).", E_USER_ERROR); //Yazi::ekle()

        $conn = new PDO(DB_DSN, DB_ADI, DB_SIFRESI);
        $sql = "INSERT INTO yazilar ( yayinTarihi, baslik, ozet, icerik, kategori ) VALUES ( FROM_UNIXTIME(:yayinTarihi), :baslik, :ozet, :icerik, :kategori )";
        $st = $conn->prepare($sql);
        $st->bindValue(":yayinTarihi", $this->yayinTarihi, PDO::PARAM_INT);
        $st->bindValue(":baslik", $this->baslik, PDO::PARAM_STR);
        $st->bindValue(":ozet", $this->ozet, PDO::PARAM_STR);
        $st->bindValue(":icerik", $this->icerik, PDO::PARAM_STR);
		$st->bindValue(":kategori", $this->kategori, PDO::PARAM_STR);
        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;
    }

    public function guncelle() {


        if (is_null($this->id))
            trigger_error("HATA NO: 981.", E_USER_ERROR); //Yazi::guncelle()


        $conn = new PDO(DB_DSN, DB_ADI, DB_SIFRESI);
        $sql = "UPDATE yazilar SET yayinTarihi=FROM_UNIXTIME(:yayinTarihi), baslik=:baslik, ozet=:ozet, icerik=:icerik, kategori=:kategori WHERE id = :id";
        $st = $conn->prepare($sql);
        $st->bindValue(":yayinTarihi", $this->yayinTarihi, PDO::PARAM_INT);
        $st->bindValue(":baslik", $this->baslik, PDO::PARAM_STR);
        $st->bindValue(":ozet", $this->ozet, PDO::PARAM_STR);
        $st->bindValue(":icerik", $this->icerik, PDO::PARAM_STR);
		$st->bindValue(":kategori", $this->kategori, PDO::PARAM_STR);
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->execute();
        $conn = null;
    }

    public function sil() {


        if (is_null($this->id))
            trigger_error("HATA NO: 124.", E_USER_ERROR); //Yazi::sil()


        $conn = new PDO(DB_DSN, DB_ADI, DB_SIFRESI);
        $st = $conn->prepare("DELETE FROM yazilar WHERE id = :id LIMIT 1");
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->execute();
        $conn = null;
    }

}

?>

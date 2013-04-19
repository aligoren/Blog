<?php

class suresayac
{
    function baslat()
    {
        global $baslangic;
        $msure = microtime ();
        $msure = explode (' ', $msure );
        $msure = $msure[1] + $msure[0];
        $baslangic = $msure;
    }
    function bitir()
    {
        global $baslangic;
        $msure = microtime ();
        $msure = explode (' ', $msure);
        $msure = $msure[1] + $msure[0];
        $bitis = $msure;
        $toplam = round (($bitis - $baslangic), 5);
        return $toplam;
    }
}


?>
<?php
function yazDosya($detay)
{
	$dosya = fopen('log.txt','a+');
	fwrite($dosya, $detay);
	fclose($dosya);
}

?>
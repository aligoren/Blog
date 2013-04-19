<?php 
require "siniflar/SyfYuklenme.php"; 
$sure = new suresayac;
$sure->baslat(); 
?>
<?php
require( "ayar.php" );
siteBaslik();
$aksiyon = isset($_GET['aksiyon']) ? $_GET['aksiyon'] : "";

switch ($aksiyon) {
    case 'arsiv':
        arsiv();
        break;
    case 'yaziGoster':
        yaziGoster();
        break;
    default:
        anasayfa();
}

function arsiv() {
    $sonuclar = array();
    $veri = Yazi::listeGetir();
    $sonuclar['yazilar'] = $veri['sonuclar'];
    $sonuclar['toplamSatir'] = $veri['toplamSatir'];
    $sonuclar['sayfaBasligi'] = "Arsivler" ." | ". SITE_BASLIK;
    require( TEMA_KLASOR . "/arsiv.php" );
}

function yaziGoster() {
    if (!isset($_GET["yaziId"]) || !$_GET["yaziId"]) {
        anasayfa();
        return;
    }
	if(!is_numeric($_GET['yaziId']))
	{
		header('Location: hata.php?kod=Koruma?SQL');
	}
	
	$hataDeger = array('absolute_path', 'ad_click', 'alert(', 'alert%20', ' and ', 'basepath', 'bash_history', '.bash_history', 'cgi-', 'chmod(', 'chmod%20', '%20chmod', 'chmod=', 'chown%20', 'chgrp%20', 'chown(', '/chown', 'chgrp(', 'chr(', 'chr=', 'chr%20', '%20chr', 'chunked', 'cookie=', 'cmd', 'cmd=', '%20cmd', 'cmd%20', '.conf', 'configdir', 'config.php', 'cp%20', '%20cp', 'cp(', 'diff%20', 'dat?', 'db_mysql.inc', 'document.location', 'document.cookie', 'drop%20', 'echr(', '%20echr', 'echr%20', 'echr=', '}else{', '.eml', 'esystem(', 'esystem%20', '.exe',  'exploit', 'file\://', 'fopen', 'fwrite', '~ftp', 'ftp:', 'ftp.exe', 'getenv', '%20getenv', 'getenv%20', 'getenv(', 'grep%20', '_global', 'global_', 'global[', 'http:', '_globals', 'globals_', 'globals[', 'grep(', 'g\+\+', 'halt%20', '.history', '?hl=', '.htpasswd', 'http_', 'http-equiv', 'http/1.', 'http_php', 'http_user_agent', 'http_host', '&icq', 'if{', 'if%20{', 'img src', 'img%20src', '.inc.php', '.inc', 'insert%20into', 'ISO-8859-1', 'ISO-', 'javascript\://', '.jsp', '.js', 'kill%20', 'kill(', 'killall', '%20like', 'like%20', 'locate%20', 'locate(', 'lsof%20', 'mdir%20', '%20mdir', 'mdir(', 'mcd%20', 'motd%20', 'mrd%20', 'rm%20', '%20mcd', '%20mrd', 'mcd(', 'mrd(', 'mcd=', 'mod_gzip_status', 'modules/', 'mrd=', 'mv%20', 'nc.exe', 'new_password', 'nigga(', '%20nigga', 'nigga%20', '~nobody', 'org.apache', '+outfile+', '%20outfile%20', '*/outfile/*',' outfile ','outfile', 'password=', 'passwd%20', '%20passwd', 'passwd(', 'phpadmin', 'perl%20', '/perl', 'phpbb_root_path','*/phpbb_root_path/*','p0hh', 'ping%20', '.pl', 'powerdown%20', 'rm(', '%20rm', 'rmdir%20', 'mv(', 'rmdir(', 'phpinfo()', '<?php', 'reboot%20', '/robot.txt' , '~root', 'root_path', 'rush=', '%20and%20', '%20xorg%20', '%20rush', 'rush%20', 'secure_site, ok', 'select%20', 'select from', 'select%20from', '_server', 'server_', 'server[', 'server-info', 'server-status', 'servlet', 'sql=', '<script', '<script>', '</script','script>','/script', 'switch{','switch%20{', '.system', 'system(', 'telnet%20', 'traceroute%20', '.txt', 'union%20', '%20union', 'union(', 'union=', 'vi(', 'vi%20', 'wget', 'wget%20', '%20wget', 'wget(', 'window.open', 'wwwacl', ' xor ', 'xp_enumdsn', 'xp_availablemedia', 'xp_filelist', 'xp_cmdshell', '$_request', '$_get', '$request', '$get',  '&aim', '/etc/password','/etc/shadow', '/etc/groups', '/etc/gshadow', '/bin/ps', 'uname\x20-a', '/usr/bin/id', '/bin/echo', '/bin/kill', '/bin/', '/chgrp', '/usr/bin', 'bin/python', 'bin/tclsh', 'bin/nasm', '/usr/x11r6/bin/xterm', '/bin/mail', '/etc/passwd', '/home/ftp', '/home/www', '/servlet/con', '?>', '.txt');
	foreach($hataDeger as $hataTip)
	if($_GET['yaziId'] == $hataTip)
	{
		header('Location: hata.php?kod=Koruma?UstGuvenlik');
	}
	
	$hataInj = array('*/from/*', '*/insert/*', '+into+', '%20into%20', '*/into/*', ' into ', 'into', '*/limit/*', 'not123exists*', '*/radminsuper/*', '*/select/*', '+select+', '%20select%20', ' select ',  '+union+', '%20union%20', '*/union/*', ' union ', '*/update/*', '*/where/*');
	foreach($hataInj as $hataTipInj)
	if($_GET['yaziId'] == $hataTipInj)
	{
		header('Location: hata.php?kod=Koruma?UnionSql');
	}
	
	$atak = array('>','<','http\:\/\/', 'https\:\/\/', 'cmd=', '&cmd', 'exec', 'concat', './', '../',  'http:', 'h%20ttp:', 'ht%20tp:', 'htt%20p:', 'http%20:', 'https:', 'h%20ttps:', 'ht%20tps:', 'htt%20ps:', 'http%20s:', 'https%20:', 'ftp:', 'f%20tp:', 'ft%20p:', 'ftp%20:', 'ftps:', 'f%20tps:', 'ft%20ps:', 'ftp%20s:', 'ftps%20:', '.php?url=','/*', 'c2nyaxb0', '/*','rush','highlight=%','perl','chr(','pillar','visualcoder','sess_','applet', 'base', 'bgsound', 'blink', 'embed', 'expression', 'frame', 'javascript', 'layer', 'link', 'meta', 'object', 'onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload', 'script', 'style', 'title', 'vbscript', 'xml');
	foreach($atak as $atakTip)
	if($_GET['yaziId'] == $atakTip)
	{
		header('Location: hata.php?kod=Koruma?Atak');
	}
	
    $sonuclar = array();
    $sonuclar['yazi'] = Yazi::idGetir((int) $_GET["yaziId"]);
    $sonuclar['sayfaBasligi'] = $sonuclar['yazi']->baslik . " | ". SITE_BASLIK;
    require( TEMA_KLASOR . "/yaziGoster.php" );
}

function anasayfa() {
    $sonuclar = array();
    $veri = Yazi::listeGetir(ANASAYFA_YAZI_SAY);
    $sonuclar['yazilar'] = $veri['sonuclar'];
    $sonuclar['toplamSatir'] = $veri['toplamSatir'];
    $sonuclar['sayfaBasligi'] = SITE_BASLIK;
    require( TEMA_KLASOR . "/anasayfa.php" );
	
}

echo '<center><a class="altBolum">Sayfa yüklenme süresi: '. $sure->bitir()
.' saniye</a></center>';
?>

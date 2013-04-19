<link rel="stylesheet" type="text/css" href="hata.css" media="screen" />	
<?php
require 'siniflar/yazDosya.php';
require 'siniflar/ipAl.php';

@$hata = $_GET['kod'];

if ($hata == 401)
{
echo '
	<title>401 Hatasý</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>401 Hatasý !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Bu sayfaya girisiniz yasaklandi.</p>
	</div>    
	<div class="links">
		<p>Eger bunun bir hata oldugunu dusunuyorsaniz iletisime gecebilirsiniz.</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
}
elseif ($hata == 403)
{
echo '
	<title>403 Hatasý - ERISIM ENGELLENDI</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>Erisim Engellendi !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Bu sayfayi gorme yetkiniz yoktur.</p>
	</div>    
	<div class="links">
		<p>Eger bunun bir hata oldugunu dusunuyorsaniz iletisime gecebilirsiniz.</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
}
elseif($hata == 404)
{
echo '
	<title>404 Hatasý</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>404 Hatasý !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Aradiginiz sayfa ya da dizin bulunamadi.</p>
	</div>    
	<div class="links">
		<p>Eger bunun bir hata oldugunu dusunuyorsaniz iletisime gecebilirsiniz.</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
}
elseif ($hata == 500)
{
echo '
	<title>500 Hatasý</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>500 Hatasý !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Sunucuda bir problem algilandi.</p>
	</div>    
	<div class="links">
		<p>Eger bu sayfayi uzun suredir goruyorsaniz iletisime gecebilirsiniz.</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
}
elseif ($hata == 'Koruma?SQL')
{
echo '
	<title>SQL Injection Saldirisi Engellendi</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>SQL Injection Engellendi !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>SQL Injection Girisimi Engellendi.</p>
	</div>    
	<div class="links">
		<p>Eger bu hatayi yanlislikla aldiginizi dusunuyorsaniz bize bildirebilirsiniz..</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
	//yazDosya('[ '. ipAl(). ' ' . ' IP\'sinden '.  date('d.m.y') . ' tarihinde SQL Injection Saldirisi Yapildi ' . ']' . ' -- ');
}
elseif ($hata == 'Koruma?UstGuvenlik')
{
echo '
	<title>Sunucu saldirisi engellendi</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>Sunucu tabanli saldiri engellendi !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Sunucu uzerinde yetki almak icin gerceklestirilen saldiri engellendi.</p>
	</div>    
	<div class="links">
		<p>Eger bu hatayi yanlislikla aldiginizi dusunuyorsaniz bize bildirebilirsiniz..</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
	//yazDosya('[ '. ipAl(). ' ' . ' IP\'sinden '.  date('d.m.y') . ' tarihinde Ust Bilgiye Sahip Sunucu Saldirisi Yapildi ' . ']' . ' -- ');
}
elseif ($hata == 'Koruma?UnionSql')
{
echo '
	<title>Union SQL Injection Saldirisi Engellendi</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>Union SQL Injection Engellendi !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Union SQL Injection Girisimi Engellendi.</p>
	</div>    
	<div class="links">
		<p>Eger bu hatayi yanlislikla aldiginizi dusunuyorsaniz bize bildirebilirsiniz..</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
	//yazDosya('[ '. ipAl(). ' ' . ' IP\'sinden '.  date('d.m.y') . ' tarihinde Union SQL Injection Saldirisi Yapildi ' . ']' . ' -- ');
}
elseif ($hata == 'Koruma?Atak')
{
echo '
	<title>Sunucuya ya da script\'e yapilan saldiri engellendi</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>Sunucu ya da script tarafli saldiri engellendi !!!</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Sunucu ya da script uzerinden gerceklestirmeye calistiginiz saldiri engellendi.</p>
	</div>    
	<div class="links">
		<p>Eger bu hatayi yanlislikla aldiginizi dusunuyorsaniz bize bildirebilirsiniz..</p>
		<span>iletisim@adres.com</span>

	</div>
	

	</div></div>
	
	
	';
	//yazDosya('[ '. ipAl(). ' ' . ' IP\'sinden '.  date('d.m.y') . ' tarihinde Diger Kategorilere Uymayan Turde Saldiri Yapildi ' . ']' . ' -- ');
}

else
{
echo '
	<title>Tanimlanmamis hata tipi</title>
	<div id="content"><div class="content">
	<h1 class="hata_kodu">
		<span>Tanimlanmamis hata tipi</span>
				<br />
			  
		
	</h1>            
	<div class="aciklama">               
                <p>Kayitli olmayan bir hata aldiniz. Sayfayi yenileyebilirsiniz ya da <a href=".">anasayfa\'ya gidebilirsiniz...</a></p>
	</div>    
	<div class="links">



	</div>
	

	</div></div>
	
	
	';
}

?>
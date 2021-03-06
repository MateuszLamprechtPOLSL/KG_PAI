<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->query("SET CHARSET UTF8");
if ($polaczenie->connect_errno!=0)
{
	echo "ERROR: ".$polaczenie->connect_errno;
}
else
{
	$sql = "
	SELECT COUNT('id') AS ilosc FROM tab_przyszli_mag";
	$rezultat= @$polaczenie->query($sql);
	$ilosc= mysqli_fetch_array($rezultat);
	
	$sql2 = "
	SELECT * FROM tab_przyszli_mag LIMIT 1";
	$rezultat2= @$polaczenie->query($sql2);
	$wiersz = mysqli_fetch_array($rezultat2);
	$jezyk=$wiersz['jezyk'];

	if($ilosc['ilosc']>=1)
	{	
		if($jezyk==0)
		{
			header('Location: dane_goscia_zap_mag.php');
			exit();
		}
		if($jezyk==1)
		{
			header('Location: ENdane_goscia_zap.php');
			exit();
		}
	}  
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Goscie</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">	
</head>

<body  style="background-color:#212529; color:#fff;">
	<main>
		<section class="cel_wizyty">
			<div class="container">
				<div class="row" style="padding:10px;border:10px;margin;margin-bottom:10px;">
					<div class="page-header col-xl-4 d-inline-block" style="text-align:center; background-color:#212529; padding-top:20px; width:100%; height:auto; padding-bottom:10px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
					<div class="page-header col-xl-4 col-bg-12" style="text-align:center; background-color:#212529; padding-top:5px; padding-bottom:0px;">
						<h1>Witamy w <br/>JS Developers</h1>
					</div>
					<div class="page-header col-xl-4 d-xl-block d-none" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:10px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
				</div>				
				<small><hr class="hr-text" style="border-color:#fff;">
				<h2>Wybierz cel wizyty:</small></h2>
				<div class="row" style="padding:10px;border:10px;margin-left:40px;margin-right:40px;margin-top:10px;margin-bottom:0px;">
					<div class="col-xl-6 offset-xl-3" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
							Prace zlecone <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
							<li><a href="dane_goscia_mag.php?cel=4&cel2=1">Zlecenie jednorazowe</a></li>
							<li><a href="dane_goscia_mag.php?cel=4&cel2=2">Zlecenie sta??e</a></li>
						  </ul>
						</div>		
					</div>					
				</div>
				<small><hr class="hr-text" style="border-color:#fff;">
				<div class="row" style="padding:10px;border:10px;margin;margin-bottom:10px;text-align: justify;">
					<div class="col-xl-12" style="padding:10px;border:10px;">
						<strong style="font-size:20px;">POLITYKA ZINTEGROWANEGO SYSTEMU ZARZ??DZANIA JAKO??CI?? I ??RODOWISKIEM</strong></br></br>
						Zapewniamy naszym Klientom rzetelno???? i profesjonalizm w zakresie dostarczanych us??ug
						poprzez ci??g??e doskonalenie skuteczno??ci i efektywno??ci zintegrowanego systemu
						zarz??dzania. Mamy ??wiadomo???? odpowiedzialno??ci za nasze dzia??ania wzgl??dem ??rodowiska
						naturalnego, zobowi??zanie do ochrony i zapobieganie zanieczyszczeniom jest integraln??
						cz????ci?? filozofii zr??wnowa??onego rozwoju JS Developers. Monitorujemy nasze
						oddzia??ywanie na ??rodowisko, a wyd??u??enie cyklu ??ycia poprzez ??wiadczone us??ugi
						regeneracji w znacz??cym stopniu wp??ywa na zu??ycie zasob??w naturalnych.</br></br>
						Maj??c na uwadze zakres naszej dzia??alno??ci, realizujemy poni??sze cele:</br>
						-Poznanie, kreowanie i zaspakajanie potrzeb i oczekiwa?? naszych Klient??w na wszystkich etapach wsp????pracy.	</br>
						-Uzyskanie ca??kowitej zgodno??ci jako??ci dostarczanego wyrobu z przyj??tymi wzorcami.</br>
						-Podnoszenie jako??ci dostarczanych us??ug.</br>
						-Realizowanie skutecznej i efektywnej polityki rozwoju firmy w p??aszczy??nie organizacyjnej i technologii.</br>
						-Rozw??j i utrzymanie statusu centrum produkcji i dostaw na poziomie globalnym w grupie oraz u wy????cznych dystrybutor??w JS Developers poprzez optymalizacj?? koszt??w produkcji, wdra??anie nowych produkt??w, wzrost udzia??u w rynku.</br>
						-Doskonalenie potencja??u ludzkiego.</br>
						-Optymalizacja zu??ycia zasob??w.</br>
						-Wt??rne wykorzystanie odpad??w z proces??w technologicznych.</br>
						-Minimalizacja odpad??w z tworzyw sztucznych.</br></br>
						Zobowi??zujemy si?? do spe??niania maj??cych zastosowanie wymaga?? prawnych,
						korporacyjnych, norm i regulacji, a tak??e do doskonalenia systemu zarz??dzania dla poprawy
						jego efekt??w. Budujemy ??wiadomo???? personelu i w????czamy w realizacj?? polityki naszych
						dostawc??w i partner??w biznesowych r??wnie?? poprzez zakomunikowanie niniejszej polityki.</br>
					</div>
				</div>	
				<hr class="hr-text" style="border-color:#fff;"></small>
				<div class="row" style="padding-left:10px;padding-right:10px;padding-top:10px;border:10px; display:inline-block;">
					<div class="col-xl-auto " style="padding:10px;border:10px;">
							<form action="logowanie.php" method="request" style="text-align:center; padding-top:5px; padding-bottom:5px;">
								Login:<br /><input type="text" name="login" autocomplete="off" /></br>
								Has??o:<br /><input type="password" name="haslo" style="margin-bottom:10px;"/></br>
								<input type="submit" value="Zaloguj si??" /></br>
								<?php
								//blad uaktywniajacy sie w przypadku nieprawidlowego loginu lub hasla
								if(isset($_SESSION['blad']))
								{
								echo $_SESSION['blad'];
								}
								?>
							</form>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="page-footer absolute-bottom" style="background-color:#212529; padding-bottom:20px; display:block;">
		<div class="footer-copyright text-center pt-1" style=""><hr class="hr-text" style="border-color:#fff;"></div>
		<div class="footer-copyright text-center pt-1" style="">JS Developers &copy; 2022 <br /> Wszelkie prawa zastrze??one</div>
	</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
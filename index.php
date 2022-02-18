<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->query("SET CHARSET UTF8");
if ($polaczenie->connect_errno != 0) {
	echo "ERROR: " . $polaczenie->connect_errno;
} else {
	$sql = "
	SELECT COUNT('id') AS ilosc FROM tab_przyszli";
	$rezultat = @$polaczenie->query($sql);
	$ilosc = mysqli_fetch_array($rezultat);

	$sql2 = "
	SELECT * FROM tab_przyszli LIMIT 1";
	$rezultat2 = @$polaczenie->query($sql2);
	$wiersz = mysqli_fetch_array($rezultat2);
	if (isset($wiersz['jezyk'])) {
		$jezyk = $wiersz['jezyk'];

		if ($ilosc['ilosc'] >= 1) {
			if ($jezyk == 0) {
				header('Location: dane_goscia_zap.php');
				exit();
			}
			if ($jezyk == 1) {
				header('Location: ENdane_goscia_zap.php');
				exit();
			}
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
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">
</head>

<body style="background-color:#212529; color:#fff;">
	<main>
		<section class="cel_wizyty">
			<div class="container">
				<div class="row" style="padding:10px;border:10px;margin-bottom:10px;">
					<div class="page-header col-xl-4 d-inline-block" style="text-align:center; background-color:#212529; padding-top:20px; width:100%; height:auto; padding-bottom:10px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
					<div class="page-header col-xl-4 col-bg-12" style="text-align:center; background-color:#212529; padding-top:5px; padding-bottom:0px;">
						<h1>Witamy w <br />JS Developers</h1>
					</div>
					<div class="page-header col-xl-4 d-xl-block d-none" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:10px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
				</div>
				<small>
					<hr class="hr-text" style="border-color:#fff;">
					<div class="footer-copyright text-center pt-3" style="padding-bottom:15px;"><a href="ENindex.php"><img src="obrazy/EN.png" class="img-fluid" style="display:inline-block; width:40px; height:auto;margin-right:20px;"></a><a href="index.php"><img src="obrazy/PL.png" class="img-fluid" style="display:inline-block; width:40px; height:auto;"></a></div>
					<h2>Wybierz cel wizyty:
				</small></h2>
				<div class="row" style="padding:10px;border:10px;margin-left:40px;margin-right:40px;margin-top:10px;margin-bottom:0px;">
					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block ">
							<button type="button" class="btn dropdown-toggle" style=" background-color:#fff;" data-toggle="dropdown">
								Wizyta handlowa/pokaz<span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
								<li><a href="dane_goscia.php?cel=1&cel2=1">Wizyta handlowa</a></li>
								<li><a href="dane_goscia.php?cel=1&cel2=2">Pokaz</a></li>
								<li><a href="dane_goscia.php?cel=1&cel2=3">Sympozjum</a></li>
								<li><a href="dane_goscia.php?cel=1&cel2=4">Seminarium</a></li>
							</ul>
						</div>
					</div>

					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
								Szkolenia/kursy <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
								<li><a href="dane_goscia.php?cel=2&cel2=1">Szkolenie zakończone egzaminem</a></li>
								<li><a href="dane_goscia.php?cel=2&cel2=2">Szkolenie zakończone certyfikatem JS Developers</a></li>
							</ul>
						</div>
					</div>

					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
								Audyt/kontrola <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
								<li><a href="dane_goscia.php?cel=3&cel2=1">Audyt</a></li>
								<li><a href="dane_goscia.php?cel=3&cel2=2">Kontrola urzędowa</a></li>
							</ul>
						</div>
					</div>

					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
								Prace zlecone <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
								<li><a href="dane_goscia.php?cel=4&cel2=1">Zlecenie jednorazowe</a></li>
								<li><a href="dane_goscia.php?cel=4&cel2=2">Zlecenie stałe</a></li>
							</ul>
						</div>
					</div>
				</div>
				<small>
					<hr class="hr-text" style="border-color:#fff;">
					<div class="row" style="padding:10px;border:10px;margin-bottom:10px;text-align: justify;">
						<div class="col-xl-12" style="padding:10px;border:10px;">
							<strong style="font-size:20px;">POLITYKA ZINTEGROWANEGO SYSTEMU ZARZĄDZANIA JAKOŚCIĄ I ŚRODOWISKIEM</strong></br></br>
							Zapewniamy naszym Klientom rzetelność i profesjonalizm w zakresie dostarczanych usług
							poprzez ciągłe doskonalenie skuteczności i efektywności zintegrowanego systemu
							zarządzania. Mamy świadomość odpowiedzialności za nasze działania względem środowiska
							naturalnego, zobowiązanie do ochrony i zapobieganie zanieczyszczeniom jest integralną
							częścią filozofii zrównoważonego rozwoju JS Developers. Monitorujemy nasze
							oddziaływanie na środowisko, a wydłużenie cyklu życia poprzez świadczone usługi
							regeneracji w znaczącym stopniu wpływa na zużycie zasobów naturalnych.</br></br>
							Mając na uwadze zakres naszej działalności, realizujemy poniższe cele:</br>
							-Poznanie, kreowanie i zaspakajanie potrzeb i oczekiwań naszych Klientów na wszystkich etapach współpracy. </br>
							-Uzyskanie całkowitej zgodności jakości dostarczanego wyrobu z przyjętymi wzorcami.</br>
							-Podnoszenie jakości dostarczanych usług.</br>
							-Realizowanie skutecznej i efektywnej polityki rozwoju firmy w płaszczyźnie organizacyjnej i technologii.</br>
							-Rozwój i utrzymanie statusu centrum produkcji i dostaw na poziomie globalnym w grupie oraz u wyłącznych dystrybutorów JS Developers poprzez optymalizację kosztów produkcji, wdrażanie nowych produktów, wzrost udziału w rynku.</br>
							-Doskonalenie potencjału ludzkiego.</br>
							-Optymalizacja zużycia zasobów.</br>
							-Wtórne wykorzystanie odpadów z procesów technologicznych.</br>
							-Minimalizacja odpadów z tworzyw sztucznych.</br></br>
							Zobowiązujemy się do spełniania mających zastosowanie wymagań prawnych,
							korporacyjnych, norm i regulacji, a także do doskonalenia systemu zarządzania dla poprawy
							jego efektów. Budujemy świadomość personelu i włączamy w realizację polityki naszych
							dostawców i partnerów biznesowych również poprzez zakomunikowanie niniejszej polityki.</br>
						</div>
					</div>
					<hr class="hr-text" style="border-color:#fff;">
				</small>
				<div class="row" style="padding-left:10px;padding-right:10px;padding-top:10px;border:10px; display:inline-block;">
					<div class="col-xl-auto " style="padding:10px;border:10px;">
						<form action="logowanie.php" method="request" style="text-align:center; padding-top:5px; padding-bottom:5px;">
							Login:<br /><input type="text" name="login" autocomplete="off" /></br>
							Hasło:<br /><input type="password" name="haslo" style="margin-bottom:10px;" /></br>
							<input type="submit" value="Zaloguj się" /></br>
							<?php
							//blad uaktywniajacy sie w przypadku nieprawidlowego loginu lub hasla
							if (isset($_SESSION['blad'])) {
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
		<div class="footer-copyright text-center pt-1" style="">
			<hr class="hr-text" style="border-color:#fff;">
		</div>
		<div class="footer-copyright text-center pt-1" style="">JS Developers &copy; 2022 <br /> Wszelkie prawa zastrzeżone</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
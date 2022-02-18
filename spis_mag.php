<?php
session_start();
//kontrola stanu logowania
//if(isset($_SESSION['zalogowany'])==NULL || @S_SESSION['zalogowany']==false){	echo '1';	header('Location:index.php');	exit();}
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

<body style="background-color:#212529; padding-top:52px;">


<div class="menutop" >
	<a href='panel_admina_mag.php'>Przejdź do panelu admina</a>
	<a href="drukuj_obecnych_mag.php" style="padding-left:70px;">Drukuj obecnych</a>
	<a href='wyloguj_mag.php' style="padding-left:70px;">Wyloguj się</a>
</div>


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
	SELECT * FROM tab_mag WHERE obecny=1
	ORDER BY czas";
	$sql2 = "
	SELECT * FROM tab_st_prac_mag
	ORDER BY czas";
	$sql3 = "
	SELECT * FROM tab_mag WHERE zapowiedziany=1";	
	$rezultat= @$polaczenie->query($sql);
	$rezultat2= @$polaczenie->query($sql2);
	$rezultat3= @$polaczenie->query($sql3);
?>
			<table class="table col-xl-12 table-striped table-dark table-hover" style="border-bottom:10px;" id="dataTables-example">
				<thead style="text-align: center; border-style: ridge;">
					<tr>
						<th>ID</th>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Nazwa firmy</th>
						<th>Cel</th>
						<th>Czas wejścia</th>
						<th>Obecni</th>
						<th>Dodawanie do stałych</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					<?php 
					while ($wiersz = mysqli_fetch_array($rezultat)) { 
						$i=@$i+1;
						$imie = $wiersz['imie'];
						$nazwisko = $wiersz['nazwisko'];
						$nazwa_firmy = $wiersz['nazwa_firmy'];
						$cel = $wiersz['cel'];
						$cel2 = $wiersz['cel2'];			
						$czas = $wiersz['czas'];
						$obecny = $wiersz['obecny'];
						echo "<tr>
							<td>" . $i . "</td>
							<td>" . $imie . "</td>
							<td>" . $nazwisko . "</td>
							<td>" . $nazwa_firmy . "</td>";
							if($cel==1) echo "<td>Wizyta handlowa/pokaz</td>";
							if($cel==2) echo "<td>Szkolenia/kursy </td>";
							if($cel==3) echo "<td>Audyt/kontrola</td>";
							if($cel==4) echo "<td>Prace zlecone</td>";
							if($cel==5) echo "<td>Magazyn</td>";
							echo "<td>" . $czas . "</td>";
							if($obecny==1){echo '<td><a href="wypisz_goscia_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&czas='.$czas.'">Usuń</a></td>';}
							else{echo '<td></td>';}
							echo '<td><a href="obecny_do_st_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&nazwa_firmy='.$nazwa_firmy.'">Do stałych</a></td>';
							echo "<tr/>";}
					?>
				</tbody>
			</table>

			<table class="table col-xl-12 table-striped table-dark table-hover" style="border-bottom:10px;" id="dataTables-example">
				<thead style="text-align: center; border-style: ridge;">
					<tr>
						<th>ID</th>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Nazwa firmy</th>
						<th>Termin</th>
						<th>Cel</th>
						<th>Czas dodania</th>
						<th>Osoby zapowiedziane</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					<?php 
					while ($wiersz = mysqli_fetch_array($rezultat3)) { 
						$i=@$i+1;
						$imie = $wiersz['imie'];
						$nazwisko = $wiersz['nazwisko'];
						$nazwa_firmy = $wiersz['nazwa_firmy'];
						$cel = $wiersz['cel'];
						$cel2 = $wiersz['cel2'];			
						$czas = $wiersz['czas'];
						$zapowiedziany = $wiersz['zapowiedziany'];
						$przew_data = $wiersz['przew_data'];
						echo "<tr>
							<td>" . $i . "</td>
							<td>" . $imie . "</td>
							<td>" . $nazwisko . "</td>
							<td>" . $nazwa_firmy . "</td>
							<td>" . $przew_data . "</td>";
							if($cel==1) echo "<td>Wizyta handlowa/pokaz</td>";
							if($cel==2) echo "<td>Szkolenia/kursy </td>";
							if($cel==3) echo "<td>Audyt/kontrola</td>";
							if($cel==4) echo "<td>Prace zlecone</td>";
							echo "<td>" . $czas . "</td>";
							if($zapowiedziany==1) {echo '<td><a href="gosc_przybyl_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&cel='.$cel.'&nazwa_firmy='.$nazwa_firmy.'&cel2='.$cel2.'"><img src="obrazy/PL.png" class="img-fluid" style="display:inline-block; width:40px; height:auto;"></a></td>';}
							else {echo '<td></td>';}
							echo '<td><a href="usuwanie_zapowiedzianego_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&cel='.$cel.'&nazwa_firmy='.$nazwa_firmy.'&cel2='.$cel2.'&przew_data='.$przew_data.'">Usuń</a></td>';
							echo "<tr/>";}
					?>
				</tbody>
			</table>	

			<table class="table col-xl-12 table-striped table-dark table-hover" style="border-bottom:10px;" id="dataTables-example">
				<thead style="text-align: center; border-style: ridge;">
					<tr>
						<th>ID</th>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Nazwa firmy</th>
						<th>Czas dodania</th>
						<th>Przyszedł</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">
					<?php 
					while ($wiersz = mysqli_fetch_array($rezultat2)) { 
						$i=@$i+1;
						$imie = $wiersz['imie'];
						$nazwisko = $wiersz['nazwisko'];
						$nazwa_firmy = $wiersz['nazwa_firmy'];
						$czas = $wiersz['czas'];
						echo "<tr>
							<td>" . $i . "</td>
							<td>" . $imie . "</td>
							<td>" . $nazwisko . "</td>
							<td>" . $nazwa_firmy . "</td>";
							echo "<td>" . $czas . "</td>";
							echo '<td><a href="dodanie_st_prac_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&nazwa_firmy='.$nazwa_firmy.'">Przyszedł</a></td>';
							echo '<td><a href="usuwanie_st_prac_mag.php?nazwisko='.$nazwisko.'&imie='.$imie.'&nazwa_firmy='.$nazwa_firmy.'">Usuń</a></td>';
							echo "<tr/>";}
					?>
				</tbody>
			</table>			
<?php			
}	
$polaczenie->close();
?>
</body>


			

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
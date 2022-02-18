<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visitors</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="html5.js"></script>

</head>

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
	$sql2 = "
	SELECT * FROM tab_przyszli
	LIMIT 1";
	$sql3 = "
	DELETE FROM tab_przyszli
	LIMIT 1";	
	$rezultat= @$polaczenie->query($sql2);
	$wiersz = mysqli_fetch_array($rezultat);
	$PPcel=$wiersz['cel'];
	$PPcel2=$wiersz['cel2'];	
	$PPimie=$wiersz['imie'];
	$PPnazwisko=$wiersz['nazwisko'];
	$PPnazwa_firmy=$wiersz['nazwa_firmy'];


	$imie = $_REQUEST['imie'];
	$nazwisko = $_REQUEST['nazwisko'];
	$nazwa_firmy = $_REQUEST['nazwa_firmy'];
	$cel = $_REQUEST['cel'];
	$cel2 = $_REQUEST['cel2'];
	$data = date("Y-m-d");

	if($cel==1) {$sql = "UPDATE tab_wizyt SET imie='".$imie."', nazwisko='".$nazwisko."', nazwa_firmy='".$nazwa_firmy."' WHERE nazwisko='".$PPnazwisko."' AND obecny=1 AND imie='".$PPimie."'";}
	if($cel==2) {$sql = "UPDATE tab_szkolen SET imie='".$imie."', nazwisko='".$nazwisko."', nazwa_firmy='".$nazwa_firmy."' WHERE nazwisko='".$PPnazwisko."' AND obecny=1 AND imie='".$PPimie."'";}
	if($cel==3) {$sql = "UPDATE tab_kontroli SET imie='".$imie."', nazwisko='".$nazwisko."', nazwa_firmy='".$nazwa_firmy."' WHERE nazwisko='".$PPnazwisko."' AND obecny=1 AND imie='".$PPimie."'";}
	if($cel==4 AND $cel2==2) 
	{
		$sql4 = "INSERT INTO `tab_st_prac` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy'";
		$sql="UPDATE tab_prac SET imie='".$imie."', nazwisko='".$nazwisko."', nazwa_firmy='".$nazwa_firmy."' WHERE nazwisko='".$PPnazwisko."' AND obecny=1 AND imie='".$PPimie."'";
		$polaczenie->query($sql4);
	}
	if($cel==4 AND $cel2==1) $sql = "UPDATE tab_prac SET imie='".$imie."', nazwisko='".$nazwisko."', nazwa_firmy='".$nazwa_firmy."' WHERE nazwisko='".$PPnazwisko."' AND obecny=1 AND imie='".$PPimie."'";
	@$polaczenie->query($sql3);	
	
}
?>


<body style="background-color:#212529;font-size:18px; color:#fff;font-family: 'Abhaya Libre', serif;">	
<section align=center>

	<div class="container" style="text-align:center;">
	
				<div class="row" style="padding:10px;border:10px;margin:40px;margin-bottom:0px;">
					<div class="page col-xl-3 d-inline-block" style="text-align:center; background-color:#212529; padding-top:20px; width:100%; height:auto; padding-bottom:10px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="width:100%;" >
					</div>
					<div class="page-header col-xl-6 col-bg-12" style="text-align:center;margin-top:0px; background-color:#212529; padding-top:0px; padding-bottom:0px;">
						<h1>Witamy w <br/>JS Developers</h1>
					</div>
					<div class="page col-xl-3 d-xl-block d-none" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:0px;">
						<img src="obrazy/logo.gif" class="img-fluid" >
					</div>
				</div>
	
	  <h2 style="margin-bottom:50px;margin-top:0px;"><?php 	if ($rezultat= @$polaczenie->query($sql)){echo "Registration was successful";}else{echo "Error. Please contact administrator";}$polaczenie->close(); ?></h2>
	  <div class="panel-group" id="accordion" style="margin-left:10%; margin-right:10%; font-size:18px;">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h3 class="panel-title">
			<?php echo '<a href="drukuj.php?nazwisko='.$nazwisko.'&imie='.$imie.'&data='.$data.'&nazwa_firmy='.$nazwa_firmy.'&cel='.$cel.'&cel2='.$cel2.'">Return to main page</a>';?>
			</h3>
		  </div>
		</div>
		
	  </div> 
	</div>
</section>
<footer class="page-footer fixed-bottom" style="background-color:#212529; padding-bottom:20px; display:block;">
		<div class="footer-copyright text-center pt-3" style=""><hr class="hr-text" style="border-color:#fff;">JS Developers &copy; 2022 <br /> All rights reserved</div>
</footer>


</body>
</html>

























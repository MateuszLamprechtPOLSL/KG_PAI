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

	$imie = $_REQUEST['imie'];
	$nazwisko = $_REQUEST['nazwisko'];
	$nazwa_firmy = $_REQUEST['nazwa_firmy'];
	$cel2 = 2;
	$sql = "INSERT INTO `tab_mag` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=1, zapowiedziany=0, cel2='$cel2'";
	
	
	if ($rezultat= @$polaczenie->query($sql))
	{
		echo "Rejestracja sie powiodla";
		header('Location: spis_mag.php');
	}
	else{
		echo "Mamy problem"	;
	}
	$polaczenie->close();
}
?>
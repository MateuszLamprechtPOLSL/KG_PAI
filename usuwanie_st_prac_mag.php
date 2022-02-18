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
	$sql = "DELETE FROM `tab_st_prac_mag` WHERE imie= '$imie' AND nazwisko= '$nazwisko' AND nazwa_firmy= '$nazwa_firmy'";	
	
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
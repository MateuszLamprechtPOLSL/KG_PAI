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
	$cel = $_REQUEST['cel'];
	$cel2 = $_REQUEST['cel2'];
	$przew_data = $_REQUEST['przew_data'];
	if($cel==1) $sql = "INSERT INTO `tab_wizyt` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=0, zapowiedziany=1, cel2='$cel2', przew_data='$przew_data'";
	if($cel==2) $sql = "INSERT INTO `tab_szkolen` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=0, zapowiedziany=1, cel2='$cel2', przew_data='$przew_data'";
	if($cel==3) $sql = "INSERT INTO `tab_kontroli` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=0, zapowiedziany=1, cel2='$cel2', przew_data='$przew_data'";
	if($cel==4) {$sql = "INSERT INTO `tab_prac` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=0, zapowiedziany=1, cel2='$cel2', przew_data='$przew_data'";};
	if($cel==5) {$sql = "INSERT INTO `tab_mag` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', obecny=0, zapowiedziany=1, cel2='$cel2', przew_data='$przew_data'";};
	
	if ($rezultat= @$polaczenie->query($sql))
	{
		echo "Rejestracja sie powiodla";
		if($cel==5)
		{
			header('Location: spis_mag.php');
		}
		else
		{
			header('Location: spis.php');
		}	
	}
	else{
		echo "Mamy problem"	;
	}
	$polaczenie->close();
}
?>
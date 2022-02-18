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
	$nazwisko = $_GET['nazwisko'];
	$imie = $_GET['imie'];
	$cel = $_GET['cel'];
	$cel2 = $_GET['cel2'];
	$nazwa_firmy = $_GET['nazwa_firmy'];
	$przew_data = $_GET['przew_data'];

if($cel==1)
{
$sql = "DELETE FROM tab_mag WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND przew_data='".$przew_data."' AND imie='".$imie."'";
	$polaczenie->query($sql);
}		
}
$polaczenie->close();
	header('Location: spis_mag.php');
?>
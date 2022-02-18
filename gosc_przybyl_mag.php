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
	echo '1';
	$nazwisko = $_GET['nazwisko'];
	$imie = $_GET['imie'];
	$cel = $_GET['cel'];
	$cel2 = $_GET['cel2'];
	$nazwa_firmy = $_GET['nazwa_firmy'];
	$jezyk = 0;


$sql = "UPDATE tab_mag SET obecny=1 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_mag SET zapowiedziany=0 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "INSERT INTO `tab_przyszli_mag` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel='$cel' ,cel2='$cel2', jezyk='$jezyk'";
	$polaczenie->query($sql);




}
$polaczenie->close();
	header('Location: spis_mag.php');
?>
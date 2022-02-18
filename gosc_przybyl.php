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

if($cel==1)
{
$sql = "UPDATE tab_wizyt SET obecny=1 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_wizyt SET zapowiedziany=0 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "INSERT INTO `tab_przyszli` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel='$cel' ,cel2='$cel2', jezyk='$jezyk'";
	$polaczenie->query($sql);
}	
if($cel==2)
{
$sql = "UPDATE tab_szkolen SET obecny=1 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_szkolen SET zapowiedziany=0 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "INSERT INTO `tab_przyszli` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel='$cel' ,cel2='$cel2', jezyk='$jezyk'";
	$polaczenie->query($sql);
}	
if($cel==3)
{
$sql = "UPDATE tab_kontroli SET obecny=1 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_kontroli SET zapowiedziany=0 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "INSERT INTO `tab_przyszli` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel='$cel' ,cel2='$cel2', jezyk='$jezyk'";
	$polaczenie->query($sql);
}
if($cel==4)
{
$sql = "UPDATE tab_prac SET obecny=1 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_prac SET zapowiedziany=0 WHERE nazwisko='".$nazwisko."' AND zapowiedziany=1 AND imie='".$imie."'";
	$polaczenie->query($sql);
$sql = "INSERT INTO `tab_przyszli` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel='$cel' ,cel2='$cel2', jezyk='$jezyk'";
	$polaczenie->query($sql);
}	



}
$polaczenie->close();
if($cel2==5)
{
	header('Location: spis_mag.php');
}
else
{
	header('Location: spis.php');
}

?>
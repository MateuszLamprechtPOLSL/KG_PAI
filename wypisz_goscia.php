<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Spis Gosci</title>
</head>

<body>

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
	$czas = $_GET['czas'];

$sql = "UPDATE tab_wizyt SET obecny=0 WHERE nazwisko='".$nazwisko."' AND imie='".$imie."' AND czas='".$czas."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_szkolen SET obecny=0 WHERE nazwisko='".$nazwisko."' AND imie='".$imie."' AND czas='".$czas."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_kontroli SET obecny=0 WHERE nazwisko='".$nazwisko."' AND imie='".$imie."' AND czas='".$czas."'";
	$polaczenie->query($sql);
$sql = "UPDATE tab_prac SET obecny=0 WHERE nazwisko='".$nazwisko."' AND imie='".$imie."' AND czas='".$czas."'";
	$polaczenie->query($sql);
	
	header('Location: spis.php');

}
$polaczenie->close();
?>
</body>
</html>
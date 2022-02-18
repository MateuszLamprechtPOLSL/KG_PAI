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
	
	$sql = "INSERT INTO `tab_st_prac` SET imie= '$imie', nazwisko= '$nazwisko', nazwa_firmy= '$nazwa_firmy', cel= '$cel', cel2= '$cel2'";
	$polaczenie->query($sql);
	$polaczenie->close();
	header('Location: spis.php');
}

?>























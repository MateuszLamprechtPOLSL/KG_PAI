<?php

session_start();

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
	echo "ERROR: ".$polaczenie->connect_errno;
}
else
{
	$login = $_REQUEST['login'];
	$haslo = $_REQUEST['haslo'];
	
	$login = htmlentities($login,ENT_QUOTES, "UTF-8");
	$haslo = htmlentities($haslo,ENT_QUOTES, "UTF-8");
	
	$sql = "SELECT * FROM administratorzy WHERE login='$login' and haslo='$haslo'";
	
	if ($rezultat= @$polaczenie->query(
	sprintf("SELECT * FROM administratorzy WHERE login='%s' and haslo='%s'", 
	mysqli_real_escape_string($polaczenie,$login),
	mysqli_real_escape_string($polaczenie,$haslo))))
	{
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{
			$wiersz = $rezultat->fetch_assoc();
			$user = $wiersz['login'];
			$_SESSION['zalogowany']= true;		
			unset($_SESSION['blad']);
			$rezultat->free();
			if($login=='agnieszka')
			{
			header('Location: panel_admina.php');
			}
			if($login=='magazyn')
			{
			header('Location: panel_admina_mag.php');
			}			
		}
		else 
		{
			$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			header('Location: index.php');
		}
	}
	$polaczenie->close();
}
?>
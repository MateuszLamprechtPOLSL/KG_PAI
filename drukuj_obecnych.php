<?php 
require('html2pdf.php');
$pdf = new FPDF('P','mm', 'A4', 'en', true, 'UTF-8');
$pdf->AddPage();
$pdf->SetFont('times','',16);
$pdf->Multicell(0,10,'JS Developers',1,'C');
$pdf->Multicell(0,10,'Data: '.date("Y-m-d"),1,'C');
$pdf->Multicell(0,10,'');
$pdf->Multicell(0,10,'Lista obecnych:');
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->query("SET CHARSET UTF8");
if ($polaczenie->connect_errno!=0)
{
	echo "ERROR: ".$polaczenie->connect_errno;
}
else
{
	$sql = "
	SELECT * FROM tab_szkolen WHERE obecny=1 UNION 
	SELECT * FROM tab_kontroli WHERE obecny=1 UNION 
    SELECT * FROM tab_prac WHERE obecny=1 UNION 
	SELECT * FROM tab_mag WHERE obecny=1 UNION    
	SELECT * FROM tab_wizyt WHERE obecny=1 
	ORDER BY czas";
	$rezultat= @$polaczenie->query($sql);
}
while ($wiersz = mysqli_fetch_array($rezultat)) 
{ 
    $i=@$i+1;
    $imie = $wiersz['imie'];
    $nazwisko = $wiersz['nazwisko'];
    $nazwa_firmy = $wiersz['nazwa_firmy'];
    $imie = iconv('utf-8','iso-8859-2',$imie);
    $nazwisko = iconv('utf-8','iso-8859-2',$nazwisko);
    $nazwa_firmy = iconv('utf-8','iso-8859-2',$nazwa_firmy);
    $osoba =' '.$i.'. '.$imie.' '.$nazwisko.' '.$nazwa_firmy.'';

    $pdf->Multicell(0,10,$osoba);
}

$data=date("Y-m-d");
$filename="$data.pdf";
$pdf->Output($filename,'D');
header("Location: spis.php");

?>
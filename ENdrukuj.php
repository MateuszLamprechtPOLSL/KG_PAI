<?php 
require('html2pdf.php');
$imie = $_REQUEST['imie'];
$nazwisko = $_REQUEST['nazwisko'];
$nazwa_firmy = $_REQUEST['nazwa_firmy'];
$cel = $_REQUEST['cel'];
$cel2 = $_REQUEST['cel2'];
$pdf = new FPDF('P','mm', 'A4', 'en', true, 'UTF-8');
$pdf->AddPage();
$pdf->SetFont('times','',16);
$pdf->Multicell(0,10,'JS Developers',1,'C');
$pdf->Multicell(0,10,'Data: '.date("Y-m-d"),1,'C');
$pdf->Multicell(0,10,'');
$pdf->Multicell(0,10,'Dane:');
$imie = iconv('utf-8','iso-8859-2',$imie);
$nazwisko = iconv('utf-8','iso-8859-2',$nazwisko);
$nazwa_firmy = iconv('utf-8','iso-8859-2',$nazwa_firmy);
$osoba =''.$imie.' '.$nazwisko.' '.$nazwa_firmy.'';
if($cel==1)
{
    $nazwa_celu="Wizyta";
}
if($cel==2)
{
    $nazwa_celu="Szkolenie";
}
if($cel==3)
{
    $nazwa_celu="Audyt";
}
if($cel==4)
{
    $nazwa_celu="Zlecenie";
}
$pdf->Multicell(0,10,$nazwa_celu);
$pdf->Multicell(0,10,$osoba);
$pdf->Multicell(0,10,'');
$tekst = 'Gość oświadczył,że zapoznał się z zasadami BHP oraz wyraził zgodę na:';
$tekst = iconv('utf-8','iso-8859-2',$tekst);
$pdf->Multicell(0,10,$tekst);
$pdf->SetFont('times','',10);
$fp = fopen('ENzgoda'.$cel.$cel2.'.txt',"r");
$strContent = fread($fp, filesize('ENzgoda'.$cel.$cel2.'.txt'));
fclose($fp);
$strContent = iconv('utf-8//IGNORE','iso-8859-2//IGNORE',$strContent);
$pdf->Multicell(0,10,$strContent);
$data=date("Y-m-d");
$filename="/xampp/htdocs/strona/pdf/$data$imie$nazwisko.pdf";
$pdf->Output($filename,'F');





header("Location: index.php");

?>
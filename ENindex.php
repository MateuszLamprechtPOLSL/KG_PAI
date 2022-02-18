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
	$sql = "
	SELECT COUNT('id') AS ilosc FROM tab_przyszli";
}
$rezultat= @$polaczenie->query($sql);
$ilosc= mysqli_fetch_array($rezultat);
if($ilosc['ilosc']>=1){
	header('Location: dane_goscia_zap.php');
	exit();
}  
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Goscie</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">	
</head>

<body  style="background-color:#212529; color:#fff;">
	<main>
		<section class="cel_wizyty">
			<div class="container">
				<div class="row" style="padding:10px;border:10px;margin;margin-bottom:10px;">
					<div class="page-header col-xl-4 d-inline-block" style="text-align:center; background-color:#212529; padding-top:20px; width:100%; height:auto; padding-bottom:10px; margin:0px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
					<div class="page-header col-xl-4 col-bg-12" style="text-align:center; background-color:#212529; padding-top:5px; padding-bottom:0px;">
						<h1>Welcome to<br/>JS Developers</h1>
						</div>
					<div class="page-header col-xl-4 d-xl-block d-none" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:10px;margin:0px;">
						<img src="obrazy/logo.gif" class="img-fluid" style="max-width:360px;">
					</div>
				</div>				
				<small><hr class="hr-text" style="border-color:#fff;">
				<div class="footer-copyright text-center pt-3" style="padding-bottom:15px;"><a href="ENindex.php"><img src="obrazy/EN.png" class="img-fluid" style="display:inline-block; width:40px; height:auto;margin-right:20px;"></a><a href="index.php"><img src="obrazy/PL.png" class="img-fluid" style="display:inline-block; width:40px; height:auto;" ></a></div>
				<h2>Select the purpose of the visit:</small></h2>		
				<div class="row" style="padding:10px;border:10px;margin-left:40px;margin-right:40px;margin-top:10px;margin-bottom:0px;">
					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block ">
							<button type="button" class="btn dropdown-toggle" style=" background-color:#fff;" data-toggle="dropdown">
							Business visit/Demonstration<span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
							<li><a href="ENdane_goscia.php?cel=1&cel2=1">Business visit</a></li>
							<li><a href="ENdane_goscia.php?cel=1&cel2=2">Demonstration</a></li>
							<li><a href="ENdane_goscia.php?cel=1&cel2=3">Symposium</a></li>
							<li><a href="ENdane_goscia.php?cel=1&cel2=4">Seminar</a></li>
						  </ul>
						</div>
					</div>	
					
					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
							Training<span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
							<li><a href="ENdane_goscia.php?cel=2&cel2=1">Training completed with an exam</a></li>
							<li><a href="ENdane_goscia.php?cel=2&cel2=2">Training completed with the JS certificate</a></li>
							</ul>
						  </div>		
					</div>	
					
					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
							Audit/inspection <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
							<li><a href="ENdane_goscia.php?cel=3&cel2=1">Audit</a></li>
							<li><a href="ENdane_goscia.php?cel=3&cel2=2">Official control</a></li>
						  </ul>
						</div>				
					</div>	
					
					<div class="col-xl-6" style="padding:10px;border:10px;">
						<div class="btn-group btn-group-lg btn-block">
							<button type="button" class="btn dropdown-toggle" style="background-color:#fff;" data-toggle="dropdown">
							Sub-contracting <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" style="text-align:center; background-color:#fff;">
							<li><a href="ENdane_goscia.php?cel=4&cel2=1">Sub-contracting</a></li>
							<li><a href="ENdane_goscia.php?cel=4&cel2=2">Permament work</a></li>
						  </ul>
						</div>		
					</div>
				</div>
				<small><hr class="hr-text" style="border-color:#fff;">
				<div class="row" style="padding:10px;border:10px;margin;margin-bottom:10px;text-align: justify;">
					<div class="col-xl-12" style="padding:10px;border:10px;">
						<strong style="font-size:20px;">THE POLICY OF INTEGRATED QUALITY AND ENVIRONMENT MANAGEMENT SYSTEM</strong></br></br>
						We provide our Clients with reliability and professionalism in the field of services supplied through continuous improvement 
						of the efficiency and effectiveness of the integrated management system. We are aware of the responsibility for our actions 
						in relation to the natural environment. The obligation to protect and prevent pollution is an integral part of JS Developers's sustainable development philosophy. We monitor our impact on the environment, and we are extending the life 
						cycle by providing regeneration services which has a significant impact on the consumption of natural resources.</br></br>
						Bearing in mind the scope of our activity, we implement the following goals:</br>
						-Understanding, creating and satisfying the needs and expectations of our clients at all stages of cooperation.</br>
						-Obtaining the total compliance of the delivered product with the accepted patterns.</br>
						-Improving the quality of provided services.</br>
						-Realizing effective and efficient company development policy in the organizational and technological sphere.</br>
						-Developing and maintaining the status of a production and supply center at the global level in the group and 
						at exclusive JS Developers distributors by optimizing production costs, implementing new products, increasing market share.</br>
						-Improving human potential.</br>
						-Optimization of resource consumption.</br>
						-Second use of waste from technological processes.</br>
						-Minimization of plastic waste.</br></br>
						We are committed to complying with applicable legal and corporate requirements, standards and regulations, as well as to improve 
						the management system to improve its effects. We build awareness of the staff and involve our suppliers and business partners in 
						the policy implementation also by communicating this policy.</br>
					</div>
				</div>	
				<hr class="hr-text" style="border-color:#fff;"></small>
				<div class="row" style="padding-left:10px;padding-right:10px;padding-top:10px;border:10px; display:inline-block;">
					<div class="col-xl-auto " style="padding:10px;border:10px;">
							<form action="logowanie.php" method="request" style="text-align:center; padding-top:5px; padding-bottom:5px;">
								Login:<br /><input type="text" name="login" autocomplete="off" /></br>
								Password:<br /><input type="password" name="haslo" style="margin-bottom:10px;"/></br>
								<input type="submit" value="Log in"/></br>
								<?php
								//blad uaktywniajacy sie w przypadku nieprawidlowego loginu lub hasla
								if(isset($_SESSION['blad']))
								{
								echo $_SESSION['blad'];
								}
								?>
							</form>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="page-footer absolute-bottom" style="background-color:#212529; padding-bottom:20px; display:block;">
		<div class="footer-copyright text-center pt-1"><hr class="hr-text" style="border-color:#fff;"></div>
		<div class="footer-copyright text-center pt-1">JS Developers &copy; 2022 <br /> All rights reserved</div>
	</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
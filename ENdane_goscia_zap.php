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
	SELECT * FROM tab_przyszli LIMIT 1";

	$rezultat= @$polaczenie->query($sql);

	$wiersz = mysqli_fetch_array($rezultat);
	$PPcel=$wiersz['cel'];
	$PPcel2=$wiersz['cel2'];	
	$PPimie=$wiersz['imie'];
	$PPnazwisko=$wiersz['nazwisko'];
	$PPnazwa_firmy=$wiersz['nazwa_firmy'];
}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visitors</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">
	<script>
	
	  function resizeIframe(obj) {
		obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px' + 20;
	  }

	</script>
	<script src="html5.js"></script>

</head>

<body style="background-color:#212529; color:#fff;">

	<div class="row" style="padding:10px;border:10px;margin:40px;">
		<div class="page-header col-xl-3 d-inline-block" style="text-align:center; background-color:#212529; padding-top:20px; width:100%; height:auto; padding-bottom:10px;">
			<img src="obrazy/logo.gif" class="img-fluid" style="width:100%;" >
		</div>
		<div class="page-header col-xl-6 col-bg-12" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:10px;">
			<h1>Welcome to <br/>JS Developers<small><br/><hr class="hr-text" style="border-color:#fff;">Enter your personal data:</small></h1>
		</div>
		<div class="page-header col-xl-3 d-xl-block d-none" style="text-align:center; background-color:#212529; padding-top:20px; padding-bottom:10px;">
			<img src="obrazy/logo.gif" class="img-fluid" >
		</div>
	</div>

	<section class="cel_wizyty">
		<div class="container">
			<form class="needs-validation" action="ENpoprawa_rejestracji_goscia.php" novalidate>
				<input type="hidden" name="cel" value=<?php echo $PPcel ?> />
				<input type="hidden" name="cel2" value=<?php echo $PPcel2 ?> />
				  <div class="form-row justify-content-center">
					<div class="col-xl-3 mb-3">
					  <label for="validationCustom01"></label>
					  <input type="text" name="imie" class="form-control" id="validationCustom01" value="<?php echo $PPimie?>" placeholder="Name" autocomplete="off" required>
					  <div class="valid-feedback">
						Data valid!
					  </div>
						<div class="invalid-feedback">
							No data!
						</div>
					</div>
					
					<div class="col-xl-3 mb-3">
					  <label for="validationCustom02"></label>
					  <input type="text" name="nazwisko" class="form-control" id="validationCustom02" value="<?php echo $PPnazwisko?>" placeholder="Surname" autocomplete="off" required>
					  <div class="valid-feedback">
						Data valid!
					  </div>
						<div class="invalid-feedback">
							No data!
						</div>
					</div>
					
					<div class="col-xl-3 mb-3">
					  <label for="validationCustom02"></label>
					  <input type="text" name="nazwa_firmy" class="form-control" id="validationCustom02" value="<?php echo $PPnazwa_firmy?>" placeholder="Company Name" autocomplete="off" required>
					  <div class="valid-feedback">
						Data valid!
					  </div>
						<div class="invalid-feedback">
							No data!
						</div>				  
					</div>
				  </div>
				  
				  <div class='form-check' style="padding-left:0px;"></br>
						<input class='form-check-input' type='checkbox' value='' id='invalidCheck' required>
							<label class='form-check-label' for='invalidCheck'>
							I declare that I have read the health and safety rules.
							</label>
							<div class='invalid-feedback'>
							Before you submit, you must confirm your awareness of rules.
							</div></br></br>
							<img src="obrazy/ENbhp.jpg" class="img-fluid">
						</div>

				  <hr class='hr-text' style='border-color:#fff;'>
							<?php 
						   $paragraphs = 0;
							if ($fh = fopen('ENzgoda'.$PPcel.$PPcel2.'.txt','r')) {
							  while (! feof($fh)) {
								$s = fgets($fh,1048576);
								if (("\n" == $s) || ("\r\n" == $s)) 
								{						
								  $paragraphs++;
								}}}	  
								
							$filename = 'ENzgoda'.$PPcel.$PPcel2.'.txt';
							$handle = fopen($filename, "r");
							$data = array();
							if ($handle) {
								while (!feof($handle)) {
									$buffer = fgets($handle, 4096);
									$data[]=explode("\n", $buffer);
								}
								fclose($handle);
							} else {
							  die("Error opening a file $filename");
							}

						   for($i = 0; $i <= $paragraphs; $i++){
								$array= $data[2*$i];
								$string = join('', $array);						 
								echo"
								<div class='form-check'>
								  <input class='form-check-input' type='checkbox' value='' id='invalidCheck' required>
								  <label class='form-check-label' for='invalidCheck'>
									I agree.
								  </label>
								  <div class='invalid-feedback'>
									Before you submit, you must agree.
								  </div>
								</div></br>	
								<div class='col-xl-auto mb-3'> 	
								   <div><p class='text-justify'>"
									.$string.
								   "</p></div>
								</div>		
								<hr class='hr-text' style='border-color:#fff;'>";}; 
						   ?>
					  <hr class="hr-text" >
				  <input type="submit" value="Submit" />
				</form>
			</div>	
		</div>
	</section>

<script>

(function() { //walidacja niesystemowa
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
﻿<?php
session_start();

//if(isset($_SESSION['zalogowany'])==NULL || @S_SESSION['zalogowany']==false){	echo '1';	header('Location:index.php');	exit();}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="style.css" type="text/css"/>
	  <link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	  <link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Panel Admina</title>
</head>

<body style="background-color:#212529;font-size:18px; color:#fff;">
<section align=center>

	<div class="container" style="text-align:center; ">
	  <h2 style="margin-bottom:30px;">Panel Admina</h2>
	  <div class="panel-group" id="accordion" style="margin-left:25%; margin-right:25%">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
				<h4 class="panel-title">
					<a href="spis_mag.php">Spis</a>
				</h4>
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">
				<h4 class="panel-title">
					<a href="drukuj_obecnych_mag.php">Drukuj obecnych</a>
				</h4>
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">
				<h4 class="panel-title">
					<a href="wyloguj_mag.php">Wyloguj</a>
				</h4>
		  </div>
		</div>
		
	  </div> 
	</div>
</section>

<section align=center>

	<div class="container" style="text-align:center; ">
	  <h2 style="margin-bottom:30px; margin-top:30px;">Dodaj gościa</h2>
	  <div class="panel-group" id="accordion" style="margin-left:25%; margin-right:25%">
		
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h4 class="panel-title">
			  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Dodaj do zapowiedzianych</a>
			</h4>
		  </div>
		  <div id="collapse1" class="panel-collapse collapse">
			<div class="panel-body">
				<form class="needs-validation" action="rejestracja_zapowiedzianego_goscia_mag.php" method="request" novalidate>
					<input type="hidden" name="cel" value="5"/>

					<input type="text" name="imie" class="form-control" id="imie" placeholder="Imię" autocomplete="off" required></br>

					<input type="text" name="nazwisko" class="form-control" id="nazwisko" placeholder="Nazwisko" autocomplete="off" required></br>

					<input type="text" name="nazwa_firmy" class="form-control" id="nazwa_firmy" placeholder="Nazwa firmy" autocomplete="off" required></br>
					
					<input type="date" name="przew_data" placeholder="Przewidywana data" style="color:#ccc;" required></br></br>

					<select class="form-control" id="cel2" name="cel2">
					  	<option value="1">Zlecenia jednorazowe</option>
						<option value="2">Zlecenia stałe</option>
					</select>
					<button class="btn" type="submit" style="margin-top:20px; background-color:#6c757d">Zatwierdź</button>
				</form>
			</div>
		  </div>
		</div>

	  </div> 
	</div>
</section>



<script>
//skrypt wylaczajacy domyslna walidacje dla <form>
(function() {
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
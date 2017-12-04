<!DOCTYPE HTML>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">
	<title>Prosjek ocjena</title>
	<style>
	
	body{
		font-family: 'Open Sans Condensed', arial, sans;
		font-size: 110%;
		color: #232323;
		width: 50%;
		margin: 0 auto;
		margin-top: 2em;
	}
		
	input[type="number"]{
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		outline: none;
		display: block;
		width: 100%;
		padding: 7px;
		border: none;
		border-bottom: 1px solid #ddd;
		background: transparent;
		margin-bottom: 10px;
		font: 16px Arial, Helvetica, sans-serif;
		height: 45px;
		font-family: 'Open Sans Condensed', arial, sans;
	}	
	label {
		width: 140px;
		display:inline-block;
	}
	.block {
		margin: 4px 0;
	}
	input[type="submit"] {
		-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
		-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
		box-shadow: inset 0px 1px 0px 0px #45D6D6;
		background-color: #2CBBBB;
		border: 1px solid #27A0A0;
		display: inline-block;
		cursor: pointer;
		color: #FFFFFF;
		font-family: 'Open Sans Condensed', arial, sans;
		font-size: 14px;
		padding: 8px 18px;
		text-decoration: none;
		text-transform: uppercase;
	}
	</style>
	</head>

	<body>
		<h1>Izračun ocjene iz kolokvija</h1>
		<p>Potrebno je napraviti formu za izračun ocjene iz kolokvija. Imamo uvjet da moramo izračunati srednju ocjenu iz prvog i drugog kolokvija. Ukoliko je jedan od kolokvija negativan, krajnja ocjena je negativna. Drugi uvjet je da ocjena ne smije biti manja od 1 i veća od 5</p>
		<?php
		
		if(!isset($_POST['_action_']))   {$_POST['_action_'] = FALSE;}
		if ($_POST['_action_']  == FALSE){
		print '
				<form action="" method="post" >
				<input type="hidden" id="_action_" name="_action_" value="TRUE"><br>
				<div class="block">
					<label for="a">Ocijena I kolokvija: </label>
					<input type="number" id="a" name="a" min="1" max="5" required><br>
				</div>
				<div class="block">	
					<label for="b">Ocjena II. kolokvija: </label>
					<input type="number" id="b" name="b" min="1" max="5" required><br>
				</div>
				<div class="block">
					<input type="submit" value="Pošalji"> 
				</div>
			</form>';
		}
		else if ($_POST['_action_']  == TRUE){
			$ocjene = array($_POST['a'], $_POST['b']);
		
			if(($ocjene[0]<1 || $ocjene[1]<1) || ($ocjene[0]>5 || $ocjene[1]>5)){
				echo "Krivi unos!!!"; echo "<br>";
				echo "Vrijednosti kolokvija mora biti u rasponu od 1 do 5. Vas unos je: I. kolokvij: $ocjene[0], II. kolokvij: $ocjene[1]";
			}
			elseif($ocjene[0]==1 || $ocjene[1]==1){
				if($ocjene[0]==1 && $ocjene[1]>1){
					echo "Ocjena I. kolokvija je $ocjene[0]. Student mora ponavljati I. kolokvij";
				}
				elseif($ocjene[1]==1 && $ocjene[0]>1){
					echo "Ocjena II. kolokvija je $ocjene[1]. Student mora ponavljati II. kolokvij";
				}	
				else{
					echo "Student mora ponavljati oba kolokvija."; echo "<br>";
					echo "Ocjena I. kolokvija je $ocjene[0]."; echo "<br>";
					echo "Ocjena II. kolokvija je $ocjene[1].";
				}
			}
			else{
				$kon_ocjena = ($ocjene[0] + $ocjene[1]) /2;
				echo "Ocjena I. kolokvija: $ocjene[0]"; echo "<br>";
				echo "Ocjena II. kolokvija: $ocjene[1]"; echo "<br>";
				echo '<hr align="left" width="15%">';
				echo "Srednja ocjena iz predmeta: $kon_ocjena"; echo "<br>";
				echo "Konačna ocjena iz predmeta: " .round($kon_ocjena);
			}
			print '<p><a href="prosjekocjena.php?_action_=FALSE">Povratak</a></p>';
		}
		?>
	</body>
</html>
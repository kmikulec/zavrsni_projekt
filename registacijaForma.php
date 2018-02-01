<?php
echo "
		<!DOCTYPE html>
		<html>
		<head>
			<title>Registracija</title>
			<meta charset='UTF-8'/>
			<link rel=stylesheet' href='css/foundation.css'>
			<link rel='stylesheet' href='http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css'>
			<style>
			.okvir{
				margin-left:25%;
				margin-top:10%;
				margin-right:25%;
				width:50%;
			}

			</style>

		</head>
		<body>
			<div class='okvir' style='margin-top: 2%'>
			<form action='registracija.php' method='POST'>
				<div class='row'>
					<h1>Registracija</h1>
				<label>Ime:</label>
				<input class='large-3 medium-3 columns' type='text' name='ime' required/>
				</br>
				<label>Prezime:</label>
				<input class='large-3 medium-3 columns' type='text' name='prezime' required/>
				</br>
				<label>Email:</label>
				<input class='large-3 medium-3 columns' type='email' name='mail' required/>
				</br>
				<label>Lozinka:</label>
				<input class='large-3 medium-3 columns' type='password' name='lozinka' required/>
				</br>
				<input style='margin-left: 25%;' class='button large-2 medium-2' type='submit' name='submit' value='Pošalji'/>
				</div>
			</form>

			</div>
		</body>
		</html>
	";
?>
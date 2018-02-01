<?php
	echo "
		<!DOCTYPE html>
		<html>
		<head>
			<title>Prijava</title>
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
			<form action='login.php' method='POST'>
				<div class='row'>
					<h1>Prijava</h1>
				<label>Email:</label>
				<input class='large-3 medium-3 columns' type='email' name='mail' required/>
				</br>
				<label>Lozinka:</label>
				<input class='large-3 medium-3 columns' type='password' name='lozinka' required/>
				</br>
				<input style='margin-left: 25%;' class='button large-2 medium-2' type='submit' value='Prijavi se' name='submit'/>
				</div>
			</form>
			</br>
			</br>
			<a href='index.php?reg'><i class='fi-arrow-left'> Registriraj se</i></a>
			</div>
		</body>
		</html>
	";
?>
<?php
session_start();
include("baza.php");

if (isset($_POST["submit"])) {
	$ime=$_POST["ime"];
	$prezime=$_POST["prezime"];
	$email=$_POST["mail"];
	$lozinka=$_POST["lozinka"];

		$upit="INSERT INTO korisnik (ime,prezime,email,lozinka) VALUES ('$ime','$prezime','$email','$lozinka')";

		if ($conn->query($upit) === TRUE) {
		    include('header.php');
		    echo "Uspješno ste se registrirali";
            $_SESSION['mail']=$email;
            $_SESSION['lozinka']=$lozinka;
            header("Location:dashboard.php");
		    include ('footer.php');
		}
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else {
			echo "ne valja";
		}

?>
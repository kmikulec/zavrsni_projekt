<?php
session_start();
include ('baza.php');

$email=$_SESSION["mail"];

$upit2="select * from korisnik where email='$email'";
$result = mysqli_query($conn,$upit2);
$row = mysqli_fetch_assoc($result);
$idrod=$row['idkorisnik'];

if (isset($_POST["submit"])) {
    $tezina = $_POST["tezina"];
    $visina = $_POST["visina"];
    $datumMj=$_POST["datum"];
    $obrokDan=$_POST["obrdan"];
    $obrokNoc=$_POST["obrnoc"];
    $djeteIme=$_POST['ime'];
    $sqlDat=date("Y-m-d",strtotime($datumMj));

    $rezultat=mysqli_query($conn,"SELECT iddjete FROM djete WHERE roditeljID='$idrod' and ime='$djeteIme'");

    $djeteID=mysqli_fetch_row($rezultat);
    $djete=$djeteID[0];

    if($conn->query("INSERT INTO djetepodaci (tezina,visina,djeteID,datumMjerenja,obrokDan,obrokNoc) VALUES ('$tezina','$visina','$djete','$sqlDat','$obrokDan','$obrokNoc')")===TRUE){
        include ('header.php');
        echo'<h1>Uspješno ste unjeli podatke</h1>';
        echo'<a href="dashboard.php">Povratak na profil</a>';
        include ('footer.php');
    }
    else{
        echo "Error: <br>" . $conn->error;
    }




}
else {
    echo "Podaci nisu uneseni";
}
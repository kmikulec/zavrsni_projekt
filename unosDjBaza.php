<?php
session_start();
include("baza.php");

$email=$_SESSION["mail"];

$upit2="select * from korisnik where email='$email'";
$result = mysqli_query($conn,$upit2);
$row = mysqli_fetch_assoc($result);
$idrod=$row['idkorisnik'];


if (isset($_POST["posalji"])) {
    $ime = $_POST["ime"];
    $datum = $_POST["datumrod"];
    $tezina = $_POST["tezina"];
    $visina = $_POST["visina"];
    $spol=$_POST["spol"];
    $sqlDat=date("Y-m-d",strtotime($datum));


    $provjera= $conn->query("INSERT INTO djete (ime,datumRodenja,roditeljID,tezina,visina,spol) VALUES ('$ime','$sqlDat','$idrod','$tezina','$visina','$spol')");

    if($provjera==1){
        $zadnji_id = $conn->insert_id;
        $pro2= $conn->query("INSERT INTO djetepodaci (tezina,visina,djeteID, datumMjerenja) SELECT tezina, visina, iddjete, datumRodenja FROM djete WHERE roditeljID='$idrod' AND iddjete='$zadnji_id'");

        if ($pro2==1){
            echo'Uspjeh';

        }

        else{

            echo 'Provjera 2 ne valja  ';
            echo mysqli_error($conn);
        }
    }


    else {

        echo'Ne valja';
    }


    echo'<h1>Uspješno ste unjeli podatke</h1>';
    header("Location:dashboard.php");

 }
 else {
     echo "ne valja";
}
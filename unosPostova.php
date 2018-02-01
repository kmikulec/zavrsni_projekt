<?php
error_reporting(0);
include('baza.php');

/*povjera i unos postova u bazu podataka*/
if (isset($_POST["objavi"])) {
    $naslov=$_POST["naslov"];
    $slika=$_POST["slika"];
    $tekst=$_POST["tekst"];
    $izv_ime=$_POST["izvor_ime"];
    $izv_link=$_POST["izvor_link"];
    $tip=$_POST["kat"];

    $upit="INSERT INTO postovi (naslov, slika,tekst,izvor_ime, izvor_link, kategorija) VALUES ('$naslov','$slika','$tekst','$izv_ime','$izv_link','$tip ');";


    if ($conn->query($upit) === TRUE) {
        echo "</br>Članak je uspješno objavljen
                </br><a href='index.php'>Naslovnica</a>
                 </br><a href='postoviForma.php'>Novi post</a> ";}
    else {
        echo "Error: " . $upit . "<br>" . $conn->error;
    }
}
else {
    echo "Neuspjelo objavljivanje članaka";
}
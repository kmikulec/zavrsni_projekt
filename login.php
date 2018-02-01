<?php
include("baza.php");
include("funkcija.php");
session_start();

if (isset($_POST["submit"])) {
    $mail = $_POST["mail"];
    $lozinka = $_POST["lozinka"];


    $upit = "SELECT idkorisnik FROM korisnik WHERE email='$mail' AND lozinka='$lozinka'";

    $result = mysqli_query($conn, $upit);

    $red = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $zbroj = mysqli_num_rows($result);
}

else {
        echo "ne valja";
    }

if ($zbroj==1 and $mail=="admin@admin.hr"){
    header("Location:postoviForma.php");
}

elseif ($zbroj==1) {
    $_SESSION["mail"]=$mail;
    $_SESSION["lozinka"]=$lozinka;
    $_SESSION['loggedin_time'] = time();


    if(!isteklaSesija()) {
        header("Location:dashboard.php");
    } else {
        header("Location:odjava.php?session_expired=1");
    }
    if(isset($_GET["session_expired=1"])) {
        $message = "Vaša sesija je istekla. Molim prijavite se ponovo";
    }
}
else {
    include("header.php");
    echo "<h2>Unjeli ste neispravnu lozinku ili email</h2>";
    include("footer.php");
}


?>
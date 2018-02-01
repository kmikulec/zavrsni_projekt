<?php

session_start();
include("header.php");
include("sidebar.php");
include("baza.php");

$email=$_SESSION["mail"];

$upit2="select * from korisnik where email='$email'";
$result = mysqli_query($conn,$upit2);
$row = mysqli_fetch_assoc($result);
$idrod=$row['idkorisnik'];

$polje_djete = array();

$upit= "SELECT * FROM djete WHERE roditeljID='$idrod'";

$rezultat = $conn->query( $upit );

while ( $row = $rezultat->fetch_assoc() ) {
    array_push( $polje_djete, $row );
}

$dan=date("d.m.Y.");

echo '
		<div class="row" id="content">
				      <div class="large-8 medium-6">
		<form action="unosPodDjeBaza.php" method="post">

        Odaberite djete:    <select name="ime">';

        foreach ( $polje_djete as $key => $val ) {

            $ime= $val['ime'];

            echo'
                                <option value="'.$ime.'">'.$ime.'</option>';}
           echo'                 </select>
		</br>
        Unesite težinu u gramima: <input style="width:5em" type="text" name="tezina" />
        Unesite visinu u centimetrima: <input style="width:5em" type="text" name="visina" value="" />
        Datum mjerenja: <input id="datum" style="width:10em" type="text" name="datum" value="'.$dan.'" />
        Prosječan broj obroka po danu: <input style="width:5em" type="text" name="obrdan" value="" />
        Prosječan broj obroka po noći: <input style="width:5em" type="text" name="obrnoc" value="" />
        <input style="margin-left:90%" type="submit" name="submit" value="Spremi" />


    </form>
    </div>
    </div>
';


include("footer.php");

?>
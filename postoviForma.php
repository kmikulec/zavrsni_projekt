<?php

include('header.php');

echo '
    <link rel=\'stylesheet\' href=\'http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css\'>
    <form action="unosPostova.php" method="post">
        <div class="row">
            <label>Kategorija:</label>
            <input type="radio" name="kat"  value="0"> Zanimljivosti 
            <input type="radio" name="kat"  value="1"> Bolesti 
            <input type="radio" name="kat"  value="2"> Dojenje 
            <input type="radio" name="kat"  value="3"> Lijekovi </br>
            <label>Naslov članka:</label>
            <input class=\'large-3 medium-3 columns\' type="text" name="naslov" maxlength="25" />
            <label>Link na sliku članka:</label>
            <input class=\'large-3 medium-3 columns\' type="text" name="slika" maxlength="250" />
            <label>Tekst članka:</label>
            <textarea class=\'large-3 medium-3 columns\' type="" name="tekst" maxlength="50000"></textarea>
            <label>Naziv izvora:</label>
            <input class=\'large-3 medium-3 columns\' type="text" name="izvor_ime" maxlength="45" />
            <label>Link izvora:</label>
            <input class=\'large-3 medium-3 columns\' type="text" name="izvor_link" maxlength="250" />
            <input type="submit" name="objavi" value="Objavi" />
        </div>

        
    </form>
';
echo'<a href="brisanjeClanka.php">Brisanje članaka</a><br>';
echo'<a href="odjava.php">Odjavi se</a>';
include ('footer.php');



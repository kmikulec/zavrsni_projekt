<?php
include ('baza.php');

$upit="SELECT ime,datumRodenja,djetepodaci.visina, djetepodaci.tezina FROM djete INNER JOIN djetepodaci ON iddjete=djeteID";

echo'

<pre>';
$rows=[];
$result = $conn->query($upit);

while ( $row = $result->fetch_assoc() ) {
    array_push( $rows, $row );
}

print_r($rows);





echo'
</pre>';
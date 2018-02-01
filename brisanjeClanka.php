<?php
include ('baza.php');
include ('header.php');

if (isset($_POST["obrisi"])){
    $postid=$_POST["cla"];
    $brisi="DELETE  FROM postovi WHERE idpostovi=$postid";
    if ($conn->query($brisi)==TRUE){
        echo'<h2>Članak je uspješno obrisan.</h2>';
        echo'<a href="postoviForma.php"><i class="fi-pencil"> Dodaj novi članak</i></a>';
        echo'<a href="index.php"><i  class="fi-home"> Povratak na naslovnicu</i></a>';

    }

    else{
       echo mysqli_error($conn);
    }


}

else{

    $upit="SELECT * FROM postovi ORDER BY naslov ASC";
    $rezultat = $conn->query( $upit );

    $polje_post = array();

    while ( $red = $rezultat->fetch_assoc() ) {
        array_push( $polje_post, $red );
    }

    echo'

    <div class="row" id="content">
				      <div class="large-8 medium-6">
		<form action="?" method="post">

        Odaberite post:    <select name="cla">';

    foreach ( $polje_post as $key => $val ) {

        $naslov= $val["naslov"];
        $id=$val["idpostovi"];

        echo"
               <option value=$id>$naslov</option>";}
        echo'</select>
        <input style="margin-left:90%" type="submit" name="obrisi" value="Obriši" />
    </form>
    </div>
    </div>';

}
include ('footer.php');

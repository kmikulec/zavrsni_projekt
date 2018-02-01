<?php

include("baza.php");

if (isset($_GET['k'])){
    $tip=$_GET['k'];

    if ($tip==1){

        $sql = "SELECT * FROM postovi WHERE kategorija=1";
        $result = $conn->query($sql);
    }

    elseif ($tip==2){

        $sql = "SELECT * FROM postovi WHERE kategorija=2";
        $result = $conn->query($sql);

    }
    elseif ($tip==3){

        $sql = "SELECT * FROM postovi WHERE kategorija=3";
        $result = $conn->query($sql);
    }

    else{
        $sql = "SELECT * FROM postovi WHERE kategorija=0";
        $result = $conn->query($sql);
    }

}

else{

    /*Upit sa postovima iz baze podataka*/

    $sql = "SELECT * FROM postovi WHERE kategorija=0";
    $result = $conn->query($sql);

}



        /*Ispis postova u zeljenom obliku */


	echo "

            <div class='row' id='content'>
                 <div  class='large-12 medium-12 small-12 columns'>
                                  
                        <div  class='row'>
                                <div>";

                                    if ($result->num_rows > 0) {

                                        while($row = $result->fetch_assoc()) {

                                            $sazetak=substr($row['tekst'], 0, 300);

                                            echo "
                                                        <div  class='large-4 medium-6 small-12  column'>
                                                        <div class='blog-post'>
                                                        <a href='clanak.php?id=".$row['idpostovi']."'>
                                                        <img class='thumbnail' src='".$row['slika']."'>
                                                        </a>
                                                          <h3>".$row['naslov']."</h3> 
                                                          <div class='kratki'>".$sazetak." <a href='clanak.php?id=".$row['idpostovi']."'>Više...</a></div>
                                                          <div class='callout'>
                                                            <ul class='menu simple'>
                                                              <li><a href='".$row['Izvor_link']."'>Izvor: ".$row['izvor_ime']."</a></li>
                                                            </ul>
                                                          </div>
                                                          </div>
                                                          </div>";


                                        }
                                    } else {
                                        echo "Nema postova";
                                        }
                                        $conn->close();


	
    echo"  
		                        </div>
                        </div>
                   </div>";

?>
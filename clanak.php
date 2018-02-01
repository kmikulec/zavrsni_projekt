<?php
include ('baza.php');
include ('header.php');

$id=$_GET['id'];
$sql = "SELECT * FROM postovi WHERE idpostovi=$id";
$result = $conn->query($sql);


echo "

            <div class='row' id='content'>
                                  <div  class='large-12 medium-12 small-12 columns'>
            <div  class='row'>
          <div>";

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {


                        echo "
                                                    <div  class='large-12 medium-12  column'>
                                                    <div class='blog-post'>
                                                    <img class='thumbnail' src='".$row['slika']."'>
                                                      <h3>".$row['naslov']."</h3> 
                                                      <p >".$row['tekst']."</p>
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


include('footer.php');
<?php
session_start();
include("header.php");
include("sidebar.php");
include("baza.php");
$email=$_SESSION["mail"];

$upit="select * from korisnik where email='$email'";
                    $result = mysqli_query($conn,$upit);
                    $row = mysqli_fetch_assoc($result);
                    $ime=$row['ime'];
                    $prezime=$row['prezime'];

    if(isset($_POST['submit']))
    {
    	$imeNovo=$_POST['ime'];
    	$prezNovo=$_POST['prezime'];

    	$update="update korisnik
    				set ime='$imeNovo', prezime='$prezNovo'
    				where email='$email'";

    				$conn->query($update);
    				header("Location:profil.php");

    }

echo"
                                                        <div  class='large-8 medium-8 small-12  column'>
                                                        <div class='blog-post'>
                                                        <img class='thumbnail' src='http://www.cijepljenje.info/wp-content/uploads/2014/12/Kalendar-cijepljenja-2016..png'>
                                                          <h3>Kalendar kontinuiranog cijepljenja u Hrvatskoj u 2016. godini</h3> 
                                                          <p>Novorođenčad: BCG vakcinacija 
                                                                    a) Ako su rođena u rodilištima cijepit će se BCG cjepivom odmah u rodilištu. 
                                                                    b) Ukoliko nisu rođena u rodilištu cijepit će se BCG cjepivom do navršena dva mjeseca starosti 
                                                                    c) Sva djeca koja nisu cijepljena u rodilištu odnosno do dva mjeseca starosti moraju se cijepiti BCG cjepivom do navršene prve godine života.   
                                                                    Novorođenčad HBsAg-pozitivnih majki (sve trudnice se obvezno testiraju):hepatitis B  imunizacija uz primjenu imunoglobulina, u rodilištu odmah po rođenju (NN 103/13), prema postekspozicijskoj shemi. 
                                                                      
                                                                    S navršena dva mjeseca života: Kombinirano cjepivo DTaP-IPV-Hib-hepB 
                                                                    Nakon 2 mjeseca (8 tjedana): Kombinirano cjepivo DTaP-IPV-Hib-hepB 
                                                                    Nakon 2 mjeseca (8 tjedana): Kombinirano cjepivo DTaP-IPV-Hib-hepB 
                                                                     2. godina života: 
                                                                    – po navršenih 12 mjeseci života OSPICE-ZAUŠNJACI-RUBEOLA (MO-PA-RU)   
                                                                    –  Kombinirano cjepivo DTaP-IPV-Hib  ili kombinirano cjepivo DTaP-IPV-Hib-hepB (6-12 mjeseci nakon treće doze DTaP-IPV-Hib-hepB) 
                                                                      
                                                                    6. godina života: DI-TE-PER acelularno (DTaP) ili dTap 
                                                                      I.  razred osnovne škole : 
                                                                    OSPICE-ZAUŠNJACI-RUBEOLA (MO-PA-RU) (ili prilikom upisa) 
                                                                    + POLIO (IPV) 
                                                                      VI. razred osnovne škole: HEPATITIS B: 2 puta s razmakom od mjesec dana i treći puta pet mjeseci nakon druge doze 
                                                                      VIII razred osnovne škole: DI-TE pro adultis (Td) ili dTap + POLIO (IPV) 
                                                                      
                                                                    Završni razred srednjih škola: Provjera cjepnog statusa i nadoknada propuštenih cijepljenja prema potrebi 
                                                                      24 godine starosti: Provjera cjepnog statusa i nadoknada propuštenog Td cijepljenja prema potrebi 
                                                                                                                                                              
                                                                    Nakon navršenih 60 godina života: ANA-TE</p>
                                                          <div class='callout'>
                                                            <ul class='menu simple'>
                                                              <li><a href='http://hzjz.hr/sluzbe/sluzba-za-epidemiologiju/odjel-za-prevenciju-zaraznih-bolesti-i-cijepljenje/'>Izvor: Hrvatski zavod za javno zdravstvo</a></li>
                                                            </ul>
                                                          </div>
                                                          </div>
                                                          </div>
";

include("footer.php");
?>
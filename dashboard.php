<?php
    session_start();
	include("header.php");
    include('baza.php');
    include("sidebar.php");
    include("funkcija.php");


if(isset($_SESSION["mail"])) {
    if(isteklaSesija()) {
        header("Location:odjava.php?session_expired=1");
    }
}


        $email=$_SESSION["mail"];
        $upit="select * from korisnik where email='$email'";
        $result = mysqli_query($conn,$upit);
        $row = mysqli_fetch_assoc($result);
        $ime=$row['ime'];
        $rodID=$row['idkorisnik'];
        $upit2="SELECT ime, datumRodenja, iddjete FROM djete WHERE roditeljID=$rodID";
        $rezultat= mysqli_query($conn,$upit2);
        //$red=mysqli_fetch_assoc($rezultat);
        $polje_djete = array();
        while ( $red = $rezultat->fetch_assoc() ) {


            array_push( $polje_djete, $red );
        }
        $broj_redova = mysqli_num_rows($rezultat);

 echo "<div class='large-9 medium-9 column'>
        <div>
          <h1>";

                $sat = date("H");
                if ($sat <11){
                    echo'Dobro jutro, '.$ime.'!';
                }
                elseif ($sat > 19){
                    echo'Dobro veče, '.$ime.'!';
                }
                else
                {
                    echo'Dobar dan, '.$ime.'!';
                }


        echo'</h1></div>';

                if($broj_redova>=1){

                    foreach ( $polje_djete as $key => $val ) {

                        $imed = $val['ime'];
                        $datum = $val['datumRodenja'];
                        $djid=$val['iddjete'];
                        $date = new DateTime($datum);
                        $now = new DateTime();
                        $interval = $now->diff($date);
                        $god= $interval->y;
                        $mj= $interval->m;
                        $dan=$interval->d;

                        if($broj_redova <=1)
                        {
                            echo'<div class="large-12 medium-12 small-12 column">';
                        }
                        else{
                            echo'<div class="large-6 medium-12 small-12 column">';
                        }

                        echo"<strong>$imed</strong> ima $god god. $mj  mj. i $dan  dana.";
                        echo"</br>";

                        $upit_visina="SELECT DISTINCT  djetepodaci.visina, timestampdiff(MONTH, djete.datumRodenja, djetepodaci.datumMjerenja) as datum FROM djetepodaci INNER JOIN  djete ON iddjete=djeteID WHERE djeteID='$djid' ORDER BY datumMjerenja ASC";
                        $upit_prepvi="SELECT DISTINCT vrjMax, vrjMin FROM preporucenov ORDER BY mjesec ASC";
                        $upit_tezina="SELECT DISTINCT  djetepodaci.tezina, timestampdiff(MONTH, djete.datumRodenja, djetepodaci.datumMjerenja) as datum FROM djetepodaci INNER JOIN  djete ON iddjete=djeteID WHERE djeteID='$djid' ORDER BY datumMjerenja ASC";
                        $upit_prepte="SELECT DISTINCT vrjMax, vrjMin FROM preporucenot ORDER BY mjesec ASC";
                        $json_visina=[];
                        $json_prepv=[];
                        $json_tezina=[];
                        $json_prept=[];


                        $redovi_visina=[];
                        $rezultat_visina = $conn->query($upit_visina);
                        $redovi_prepv=[];
                        $rezultat_prepv=$conn->query($upit_prepvi);

                        $redovi_tezina=[];
                        $rezultat_tezina=$conn->query($upit_tezina);
                        $redovi_prept=[];
                        $rezultat_prept=$conn->query($upit_prepte);

                        // punjenje polja visinom i mjesecom

                        while ( $red_visina = $rezultat_visina->fetch_assoc() ) {
                            array_push( $redovi_visina, $red_visina );
                        }

                        // punjenje polja preporucenom visinom i mjesecom

                        while ( $red_prepv = $rezultat_prepv->fetch_assoc() ) {
                            array_push( $redovi_prepv, $red_prepv );
                        }


                        // unjenje polja tezinom i mjesecom
                        while ( $red_tezina = $rezultat_tezina->fetch_assoc() ) {
                            array_push( $redovi_tezina, $red_tezina );
                        }

                        // punjenje polja preporucenom tezinom i mjesecom

                        while ( $red_prept = $rezultat_prept->fetch_assoc() ) {
                            array_push( $redovi_prept, $red_prept );
                        }


                       
                        foreach ($redovi_visina as $key_v => $vrjednost_visina){

                            $visina=$vrjednost_visina['visina'];
                            $datum=$vrjednost_visina['datum'];
                            $max=$redovi_prepv[$datum]['vrjMax'];
                            $min=$redovi_prepv[$datum]['vrjMin'];


                            $json_visina[]='['.$datum.','.$visina.','.$max.','.$min.']';
                            

                        }


                        
                        foreach ($redovi_tezina as $key_t => $vrjednost_tezina){

                            $tezina=$vrjednost_tezina['tezina'];
                            $datum=$vrjednost_tezina['datum'];
                            $max=$redovi_prept[$datum]['vrjMax'];
                            $min=$redovi_prept[$datum]['vrjMin'];


                            $json_tezina[]='['.$datum.','.$tezina.','.$max.','.$min.']';
                            

                        }


                        $niz_visina=implode(", ",$json_visina);
                        $niz_tezina=implode(", ",$json_tezina);


                        $izlaz_visina='[["Datum","Visina","Max","Min"],'.$niz_visina.']';
                        $izlaz_tezina='[["Datum","Težina","Max","Min"],'.$niz_tezina.']';



                        echo'
                               <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                               <script type="text/javascript">
                                  google.charts.load(\'current\', {\'packages\':[\'corechart\']});
                                  google.charts.setOnLoadCallback(drawChart'.$djid.');
                            
                                  function drawChart'.$djid.'() {
                                    var data = google.visualization.arrayToDataTable('.$izlaz_visina.');
                            
                                    var options = {
                                      title: \'Djetetov porast visine\',
                                      hAxis: {title: \'Mjesec mjerenja\', minValue:0, titleTextStyle: {color: \'#333\'}},
                                      vAxis: {minValue: 0}
                                      
                                    };
                            
                                    var chart = new google.visualization.LineChart(document.getElementById(\'chart_div'.$djid.'\'));
                                    chart.draw(data, options);
                                  }
                                </script>
                                <div id="chart_div'.$djid.'" class="large-12" style="max-width: 600px;" ></div>';
								// style="width: 100%; height: 25em;"
                        echo'
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                               <script type="text/javascript">
                                  google.charts.load(\'current\', {\'packages\':[\'corechart\']});
                                  google.charts.setOnLoadCallback(drawChart'.$djid.'2);
                            
                                  function drawChart'.$djid.'2() {
                                    var data = google.visualization.arrayToDataTable('.$izlaz_tezina.');
                            
                                    var options = {
                                      title: \'Djetetov porast težine\',
                                      hAxis: {title: \'Mjesec mjerenja\', minValue:0, titleTextStyle: {color: \'#0000\'}},
                                      vAxis: {minValue: 0}
                                    };
                            
                                    var chart = new google.visualization.LineChart(document.getElementById(\'chart_div'.$djid.'2\'));
                                    chart.draw(data, options);
                                  }
                                </script>
                                <div id="chart_div'.$djid.'2" class="large-12" style="max-width: 600px;"></div>';

//style="width: 100%; height: 25em;" 







                        echo'</div>';
                    }

                }

                else{

                    echo'<h3>Molim unesite djete</h3>';

                }




 // echo'</div>';


include("footer.php");
	

?>
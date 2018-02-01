<?php 

	include("header.php");

        if(isset($_GET["k"]))
        {
            $parametar=$_GET["k"];
        }

        else
        {
            $parametar="";
        }

        switch($parametar)
        {
            case'naslovnica':
                include("postovi.php");
                break;
            case 'reg':
                include("registacijaForma.php");
                break;
            case 'profpro':
                include("provjera.php");
                break;
            case 'prolog':
                include ("prijavaFoma.php");
                break;
            default:
                include("postovi.php");
        }


    include("footer.php");

 ?>
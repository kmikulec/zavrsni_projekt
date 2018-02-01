<?php
	/*session_start();
   session_unset();
   session_destroy();
   header('Location: index.php');*/

    session_start();
    unset($_SESSION["mail"]);
    unset($_SESSION["lozinka"]);
    $url = "index.php";
    if(isset($_GET["session_expired"])) {
        $url .= "?session_expired=" . $_GET["session_expired"];
    }
    header("Location:$url");


?>
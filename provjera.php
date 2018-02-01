<?php
include('baza.php');
   session_start();
   
   $user_check = $_SESSION['mail'];
   
   $ses_sql = mysqli_query($conn,"select email from korisnik where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];


   if ($_SESSION['mail']=="admin@admin.hr")
   {
       header("Location:postoviForma.php");

   }
   elseif(isset($_SESSION['mail'])){
       header("location:dashboard.php");
   }
   else{
   	header("location:index.php?k=prolog");
   }

?>
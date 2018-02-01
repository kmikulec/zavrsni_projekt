<?php
echo '<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KristijanMikulec-Portal za roditelje</title>
    <link rel="stylesheet" href="css/foundation-icons.css">
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/responzivniSadrzaj.css">
    <link rel="stylesheet" href="css/mojStil.css">
    <link rel="stylesheet" href="js/jquery-ui.min.css">
    <script src="js/vendor/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/fastclick.js"></script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:\'textarea\' });</script>
  </head>
  <body>
    
	
	<div class="banner">
			 <!-- pocetak gornjeg izbornika -->
    <div class="top-bar hide-for-small-only">
      <div class="top-bar-right">
       <ul class="menu">
          <li class="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=naslovnica">Naslovnica</a></li>
          <li class="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=1">Najčešće bolesti</a></li>
          <li class="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=2">Problemi s dojenjem</a></li>
          <li class="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=3">Lijekovi</a></li>
          <li CLASS="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=reg">Registracija</a></li>
          <li class="borderlist"><a style="background-color: rgba(100, 100, 100, 0.16)" href="index.php?k=profpro">Profil</a></li>
        </ul>
      </div>
    </div>
    <!-- kraj gornjeg izbornika -->
 
    <!-- izbornik za male ekrane -->
    <nav class="tab-bar show-for-small-only">

      <section class="left-small hambi">
        <div class="crni"><a class="left-off-canvas-toggle menu-icon" ><span></span></a> MENU</div>
        <div class="crni">
            <ul>
              <li><a href="index.php?k=naslovnica">Naslovnica</a></li>
              <li><a href="index.php?k=1">Najčešće bolesti</a></li>
              <li><a href="index.php?k=2">Problemi s dojenjem</a></li>
              <li><a href="index.php?k=3">Ljekovi</a></li>
              <li><a href="index.php?k=reg">Registracija</a></li>
              <li><a href="index.php?k=profpro">Profil</a></li>
            </ul>
        </div>
      </section>
 
    </nav>
	
	</div>
	
    <div class="callout small primary">
      <div class="row column text-center">
        <h1>Portal za roditelje</h1>
      </div>
    </div>';

?>
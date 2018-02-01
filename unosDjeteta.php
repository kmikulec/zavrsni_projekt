<?php

include("header.php");
include("sidebar.php");
include("baza.php");

echo'
        <div class="row" id="content">
		    <div class="large-9 medium-6">
                <form action="unosDjBaza.php" method="post" id="djete">
                    <label for="ime">Ime:</label>
                    <input type="text" id="ime" name="ime" value="" />
                    <label for="datum">Datum rođenja:</label>
                    <input type="text" id="datum" name="datumrod" value="DD.MM.GGGG." />
                    <label for="spol">Spol:</label>
                    <select id="spol" name="spol" form="djete">
                         <option value="M">M</option>
                         <option value="Z">Ž</option>
                    </select>
                    <label for="tezina">Težina u gramima:</label>
                    <input type="text" id="tezina" name="tezina" value="" />
                    <label for="visina">Visina u centimetrima:</label>
                    <input type="text" id="visina" name="visina" value="" />
                    <input type="submit" name="posalji" value="Spremi" />
                 </form>
             </div>
        </div>

';

include('footer.php');
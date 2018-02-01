<?php
function isteklaSesija() {
	$login_trajanje_sesije = 25*60;
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["mail"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_trajanje_sesije)){
			return true; 
		} 
	}
	return false;
}
?>
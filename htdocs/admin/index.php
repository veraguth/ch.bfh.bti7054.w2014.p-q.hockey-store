<?php
	if(isset($_SESSION['username'])){
		include 'admin/stdlib.php';
		include 'admin/functions.php';
	    $site = new asite();

	    initialise_site($site);
	 
		loadPageAdmin($site);
	}

	else {
		header('Location: home');
	}
    
?>
<?php
	session_start();
    include 'functions.php';
    
 	if(getPath() == 'administrator') {
 		include 'admin/index.php';
 	}
 	else {
 		include 'stdlib.php';
	    $site = new csite();
	    initialise_site($site);
	    $page = new cpage(2);
		$site->setPage($page);   
    	loadPage($site);    
    }    
?>
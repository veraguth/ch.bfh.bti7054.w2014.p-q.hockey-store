<?php
	include 'admin/stdlib.php';
	include 'admin/functions.php';
    $site = new asite();

    initialise_site($site);
 
	loadPageAdmin($site);
    
?>
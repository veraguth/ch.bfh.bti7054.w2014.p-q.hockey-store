<?php
	include 'admin/stdlib.php';
	include 'admin/functions.php';
    $site = new asite();

    initialise_site($site);
    $page = new apage(2);
	$site->setPage($page);
	loadPageAdmin($site);
    
?>
<?php
function loadPageAdmin(asite $site) {
	include 'dbconnect.php';
	$site->render();
}

?>
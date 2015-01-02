<?php
function loadPage(csite $site) {
	include 'dbconnect.php';
	$path = getPath();
	$request = "SELECT pageID FROM pages WHERE path = '$path'";
	$return = mysqli_query($db, $request);
	while($row = mysqli_fetch_object($return)) {
		  $site->render($row->pageID);
	}
}

function loadAdmin(csite $site) {
	include 'dbconnect.php';
	$site->renderAdmin();
}

function getPath(){
	return basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

?>
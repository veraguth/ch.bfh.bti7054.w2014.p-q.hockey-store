<?php
function getMenu($pageID){
	include 'dbconnect.php';
	$request = "SELECT naviText, path FROM pages WHERE parent_pageID = 1";
	$return = mysqli_query($db, $request);
	$menu = '<ul class="nav nav-pills">';
	while($row = mysqli_fetch_object($return)) {
		  $menu = $menu.'<li><a href="http://localhost/'.$row->path.'">'.$row->naviText.'</a></li>';
	}
	$menu = $menu.'</ul>';
	return $menu;
}

?>